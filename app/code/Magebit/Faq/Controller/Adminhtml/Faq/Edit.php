<?php
/**
 * This file is part of the Magebit_Faq package.
 * DISCLAIMER
 * Do not edit or add to this file if you wish to upgrade Magebit_Faq
 * to newer versions in the future.
 *
 * @copyright Copyright (c) 2022 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Magebit\Faq\Controller\Adminhtml\Faq;

use Magebit\Faq\Model\FaqFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Page;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\Controller\Result\Redirect as ControllerRedirect;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

class Edit extends Action
{
    /**
     * Core registry
     *
     * @var ?Registry
     */
    protected ?Registry $_coreRegistry = null;

    /**
     * @var PageFactory
     */
    protected PageFactory $resultPageFactory;

    /** @var faqFactory $objectFactory */
    protected FaqFactory $objectFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param Registry $registry
     * @param FaqFactory $objectFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        Registry $registry,
        FaqFactory $objectFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        $this->objectFactory = $objectFactory;
        parent::__construct($context);
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed(): bool
    {
        return $this->_authorization->isAllowed('Magebit_Faq::faq');
    }

    /**
     * Edit
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('entity_id');
        $objectInstance = $this->objectFactory->create();

        if ($id) {
            $objectInstance->load($id);
            if (!$objectInstance->getId()) {
                $this->messageManager->addErrorMessage(__('This record no longer exists.'));
                /** \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();

                return $resultRedirect->setPath('*/*/');
            }
        }

        $data = $this->_session->getFormData(true);
        if (!empty($data)) {
            $objectInstance->addData($data);
        }

        $this->_coreRegistry->register('entity_id', $id);

        /** @var Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magebit_Faq::faq');
        $resultPage->getConfig()->getTitle()->prepend(__('Faq Edit'));

        return $resultPage;
    }
}

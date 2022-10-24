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
use Magento\Framework\Controller\ResultInterface;

class Delete extends Action
{
    /** @var faqFactory $objectFactory */
    protected FaqFactory $objectFactory;

    /**
     * @param Context $context
     * @param FaqFactory $objectFactory
     */
    public function __construct(
        Context $context,
        FaqFactory $objectFactory
    ) {
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
     * Delete action
     *
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('entity_id', null);

        try {
            $objectInstance = $this->objectFactory->create()->load($id);
            if ($objectInstance->getId()) {
                $objectInstance->delete();
                $this->messageManager->addSuccessMessage(__('You deleted the record.'));
            } else {
                $this->messageManager->addErrorMessage(__('Record does not exist.'));
            }
        } catch (\Exception $exception) {
            $this->messageManager->addErrorMessage($exception->getMessage());
        }

        return $resultRedirect->setPath('*/*');
    }
}

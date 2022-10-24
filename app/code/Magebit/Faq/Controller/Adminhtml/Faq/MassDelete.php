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

use Exception;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\Exception\LocalizedException;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Framework\Controller\ResultFactory;
use Magebit\Faq\Model\ResourceModel\Faq\Collection;

/**
 * Class MassDelete
 */
class MassDelete extends Action
{
    /**
     * @var Filter
     */
    protected Filter $filter;

    /** @var Collection $objectCollection */
    protected Collection $objectCollection;

    /**
     * @param Context $context
     * @param Filter $filter
     * @param Collection $objectCollection
     */
    public function __construct(Context $context, Filter $filter, Collection $objectCollection)
    {
        $this->filter = $filter;
        $this->objectCollection = $objectCollection;
        parent::__construct($context);
    }

    /**
     * Execute action
     *
     * @return Redirect
     * @throws LocalizedException|Exception
     */
    public function execute(): Redirect
    {
        $collection = $this->filter->getCollection($this->objectCollection);
        $collectionSize = $collection->getSize();
        $collection->walk('delete');

        $this->messageManager->addSuccessMessage(__('A total of %1 record(s) have been deleted.', $collectionSize));

        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }
}

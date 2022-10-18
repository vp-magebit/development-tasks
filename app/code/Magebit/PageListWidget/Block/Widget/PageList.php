<?php
/**
 * This file is part of the Magebit_PageListWidget package.
 * DISCLAIMER
 * Do not edit or add to this file if you wish to upgrade Magebit_PageListWidget
 * to newer versions in the future.
 *
 * @copyright Copyright (c) 2022 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Magebit\PageListWidget\Block\Widget;

use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Widget\Block\BlockInterface;

/**
 * Handles CMS page data extraction logic
 */
class PageList extends Template implements BlockInterface
{
    /**
     *
     */
    const MODE_ALL = "all";
    /**
     *
     */
    const MODE_SPECIFIC = "specific";

    /**
     * @var string
     */
    protected $_template = "widget/page-list.phtml";

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * @var PageRepositoryInterface
     */
    private PageRepositoryInterface $pageRepositoryInterface;

    /**
     * @param Context $context
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param PageRepositoryInterface $pageRepositoryInterface
     * @param array $data
     */
    public function __construct(
        Context                 $context,
        SearchCriteriaBuilder   $searchCriteriaBuilder,
        PageRepositoryInterface $pageRepositoryInterface,
        array                   $data = []
    ) {
        parent::__construct($context, $data);
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->pageRepositoryInterface = $pageRepositoryInterface;
    }

    /**
     * Returns CMS page data
     *
     * @return array
     */
    public function getPages()
    {
        $mode = $this->getDisplayMode();

        if ($mode === self::MODE_ALL) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
            return $this->searchPages($searchCriteria);
        }

        if ($mode === self::MODE_SPECIFIC) {
            $searchCriteria = $this->searchCriteriaBuilder->addFilter("page_id", explode(",", $this->getSelectedPages()), "in")->create();
            return $this->searchPages($searchCriteria);
        }

        return [];
    }

    /**
     * Searches CMS pages based on search criteria
     *
     * @param $searchCriteria
     * @return array
     */
    private function searchPages($searchCriteria): array
    {
        try {
            return $this->pageRepositoryInterface->getList($searchCriteria)->getItems();
        } catch (LocalizedException $e) {
            return [];
        }
    }
}

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

namespace Magebit\PageListWidget\Model\Config\Source;

use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Cms\Model\Page;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Option\ArrayInterface;

/**
 * Handles cms page data gathering and transforming to options array
 */
class CmsPageOptions implements ArrayInterface
{
    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * @var PageRepositoryInterface
     */
    private PageRepositoryInterface $pageRepositoryInterface;

    /**
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param PageRepositoryInterface $pageRepositoryInterface
     */
    public function __construct(
        SearchCriteriaBuilder   $searchCriteriaBuilder,
        PageRepositoryInterface $pageRepositoryInterface
    ) {
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->pageRepositoryInterface = $pageRepositoryInterface;
    }

    /**
     * Finds all cms pages and returns options array
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        $searchCriteria = $this->searchCriteriaBuilder->create();
        $options = [];

        try {
            $pages = $this->pageRepositoryInterface->getList($searchCriteria)->getItems();

            foreach ($pages as $page) {
                if ($page instanceof Page) {
                    $options[] = [
                        'value' => $page->getPageId(),
                        'label' => $page->getTitle()
                    ];
                }
            }
        } catch (LocalizedException $e) {
            return [];
        }

        return $options;
    }
}

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

namespace Magebit\Faq\Api;

use Magebit\Faq\Api\Data\FaqSearchResultInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magebit\Faq\Api\Data\FaqInterface;

interface FaqRepositoryInterface
{
    /**
     * @param int $id
     * @return FaqInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $id): FaqInterface;

    /**
     * @param FaqInterface $faq
     * @return FaqInterface
     */
    public function save(FaqInterface $faq): FaqInterface;

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return FaqSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): FaqSearchResultInterface;

    /**
     * @param FaqInterface $faq
     * @return void
     */
    public function delete(FaqInterface $faq): void;

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id): void;
}


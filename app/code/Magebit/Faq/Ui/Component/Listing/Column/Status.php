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

namespace Magebit\Faq\Ui\Component\Listing\Column;

use Magento\Framework\Option\ArrayInterface;

class Status implements ArrayInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return [['value' => 1, 'label' => __('Enable')], ['value' => 0, 'label' => __('Disable')]];
    }
}

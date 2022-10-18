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

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'Magebit_PageListWidget',
    __DIR__
);

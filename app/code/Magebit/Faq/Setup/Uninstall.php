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

namespace Magebit\Faq\Setup;

use Magento\Framework\Setup\UninstallInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class Uninstall implements UninstallInterface
{
    /**
     * {@inheritdoc}
     */
    public function uninstall(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if ($setup->tableExists('magebit_faq_faq')) {
            $setup->getConnection()->dropTable($setup->getTable('magebit_faq_faq'));
        }

        $setup->endSetup();
    }
}

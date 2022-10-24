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

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Zend_Db_Exception;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     *
     * @throws Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        /**
         * Create table 'magebit_faq_faq'
         */
        $table = $setup->getConnection()->newTable(
            $setup->getTable('magebit_faq_faq')
        )->addColumn(
            'entity_id',
            Table::TYPE_SMALLINT,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Faq ID'
        )->addColumn(
            'question',
            Table::TYPE_TEXT,
            255,
            ['nullable => false'],
            'Question'
        )->addColumn(
            'answer',
            Table::TYPE_TEXT,
            255,
            ['nullable => false'],
            'Answer'
        )->addColumn(
            'status',
            Table::TYPE_SMALLINT,
            null,
            ['nullable => false', 'default' => 0],
            'Status'
        )->addColumn(
            'position',
            Table::TYPE_INTEGER,
            1,
            [
                'nullable => false',
                'default' => 0
            ],
            'Post Status'
        )->addColumn(
            'position',
            Table::TYPE_INTEGER,
            null,
            ['nullable => false', 'default' => 0],
            'Position'
        )->addColumn(
            'updated_at',
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
            'Updated At'
        )->setComment(
            'Faq Table'
        );

        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}

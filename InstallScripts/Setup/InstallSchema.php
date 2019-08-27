<?php
declare(strict_types=1);

namespace Epam\InstallScripts\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    const TABLE_NAME = 'magento2_first_table';

    /**
     * @inheritDoc
     * @throws \Zend_Db_Exception
     */
    public function install(
      SchemaSetupInterface $setup,
      ModuleContextInterface $context
    ) {
        $setup->startSetup();
        $this->createFirstTable($setup);
        $setup->endSetup();
    }

    /**
     * @param   \Magento\Framework\Setup\SchemaSetupInterface  $setup
     *
     * @return void
     * @throws \Zend_Db_Exception
     */
    private function createFirstTable(SchemaSetupInterface $setup)
    {

        if ($setup->tableExists(self::TABLE_NAME)) {
            return;
        }

        $table = $setup->getConnection()
          ->newTable($setup->getTable(self::TABLE_NAME))
          ->addColumn(
            'user_id',
            Table::TYPE_SMALLINT,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'User ID'
          )
          ->addColumn(
            'first_name',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'First name'
          )
          ->addColumn(
            'last_name',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Last name'
          )
          ->addColumn(
            'created_at',
            Table::TYPE_TIMESTAMP,
            null,
            [],
            'Creation Time'
          )
          ->addColumn(
            'updated_at',
            Table::TYPE_TIMESTAMP,
            null,
            [],
            'Modification Time'
          )
          ->setComment('First Table for Task 2');

        $setup->getConnection()->createTable($table);
    }

}
<?php

namespace Epam\CRUD\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

/**
 * Add some data to table.
 */
class TableData implements DataPatchInterface
{

    const TABLE_NAME = "magento2_table_task_2_5";

    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * @inheritDoc
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->startSetup();
        $this->moduleDataSetup->getConnection()
            ->insertArray(
                $this->moduleDataSetup->getTable(self::TABLE_NAME),
                $this->getColumns(),
                $this->getData()
            );
        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * @return array
     */
    private function getData()
    {
        $date = gmdate('Y-m-d H:i:s');
        return [
            ['Petr', 'Ivanov', $date, $date],
            ['Ivan', 'Petrov', $date, $date],
            ['John', 'Paper', $date, $date],
            ['Nick', 'Brown', $date, $date],
            ['Chris', 'Black', $date, $date],
        ];
    }

    /**
     * @return array
     */
    private function getColumns()
    {
        return [
            'first_name',
            'last_name',
            'created_at',
            'updated_at',
        ];
    }

}
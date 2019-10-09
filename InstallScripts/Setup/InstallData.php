<?php
declare(strict_types=1);

namespace Epam\InstallScripts\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{

    const TABLE_NAME = 'magento2_first_table';

    /**
     * @inheritDoc
     */
    public function install(
      ModuleDataSetupInterface $setup,
      ModuleContextInterface $context
    ) {
        $setup->startSetup();

        $setup->getConnection()
          ->insertArray(
            $setup->getTable(self::TABLE_NAME),
            $this->getColumns(),
            $this->getData()
          );

        $setup->endSetup();
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



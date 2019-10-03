<?php

namespace Epam\CRUD\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class User extends AbstractDb
{
    const TABLE_NAME = 'magento2_table_task_2_5';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, 'user_id');
    }
}
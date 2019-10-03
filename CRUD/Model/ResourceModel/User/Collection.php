<?php

namespace Epam\CRUD\Model\ResourceModel\User;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Epam\CRUD\Model\User;
use Epam\CRUD\Model\ResourceModel\User as UserResource;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(User::class, UserResource::class);
    }
}
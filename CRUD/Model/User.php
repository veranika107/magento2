<?php

namespace Epam\CRUD\Model;

use Epam\CRUD\Api\Data\UserInterface;
use Magento\Framework\Model\AbstractModel;
use Epam\CRUD\Model\ResourceModel\User as UserResource;

class User extends AbstractModel implements UserInterface
{
    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(UserResource::class);
    }

    /**
     * @return int|null
     */
    public function getUserId()
    {
        return $this->getData(self::USER_ID);
    }

    /**
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->getData(self::FIRST_NAME);
    }

    /**
     * @param string $firstName
     * @return UserInterface
     */
    public function setFirstName(string $firstName)
    {
        return $this->setData(self::FIRST_NAME, $firstName);
    }

    /**
     * @return string|null
     */
    public function getLastName()
    {
        return $this->getData(self::LAST_NAME);
    }

    /**
     * @param string $lastName
     * @return UserInterface
     */
    public function setLastName(string $lastName)
    {
        return $this->setData(self::LAST_NAME, $lastName);
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @param string $date
     * @return string|null
     */
    public function setCreatedAt(string $date)
    {
        return $this->setData(self::CREATED_AT, $date);
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @param string $date
     * @return string|null
     */
    public function setUpdatedAt(string $date)
    {
        return $this->setData(self::UPDATED_AT, $date);
    }
}
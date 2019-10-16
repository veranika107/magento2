<?php

namespace Epam\CRUD\Api\Data;

interface UserInterface
{
    const USER_ID = 'user_id';
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * @return int|null
     */
    public function getUserId();

    /**
     * @return string
     */
    public function getFirstName();

    /**
     * @param string $firstName
     * @return UserInterface
     */
    public function setFirstName(string $firstName);

    /**
     * @return string
     */
    public function getLastName();

    /**
     * @param string $lastName
     * @return UserInterface
     */
    public function setLastName(string $lastName);

    /**
     * @return string
     */
    public function getCreatedAt();

    /**
     * @param string $date
     * @return string|null
     */
    public function setCreatedAt(string $date);

    /**
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * @param string $date
     * @return string|null
     */
    public function setUpdatedAt(string $date);
}
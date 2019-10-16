<?php

namespace Epam\CRUD\Api;

use Epam\CRUD\Api\Data\UserInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;

interface UserRepositoryInterface
{
    /**
     * @param UserInterface $user
     * @return mixed
     */
    public function save(UserInterface $user);

    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id);

    /**
     * @param SearchCriteriaInterface $criteria
     * @return SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria);

    /**
     * @param UserInterface $user
     * @return bool
     */
    public function delete(UserInterface $user);

    /**
     * @param int $id
     * @return bool
     */
    public function deleteById(int $id);
}
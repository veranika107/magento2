<?php

namespace Epam\CRUD\Model;

use Epam\CRUD\Api\Data\UserInterface;
use Epam\CRUD\Api\UserRepositoryInterface;
use Epam\CRUD\Model\UserFactory;
use Epam\CRUD\Model\ResourceModel\User as UserResource;
use Epam\CRUD\Model\ResourceModel\User\CollectionFactory;
use Exception;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var UserFactory
     */
    private $objectFactory;

    /**
     * @var UserResource
     */
    private $objectResourceModel;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var SearchResultsInterfaceFactory
     */
    private $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    public function __construct(
        UserFactory $objectFactory,
        UserResource $objectResourceModel,
        CollectionFactory $collectionFactory,
        SearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->objectFactory = $objectFactory;
        $this->objectResourceModel = $objectResourceModel;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @param int $id
     * @return User
     * @throws NoSuchEntityException
     */
    public function getById(int $id)
    {
        $user = $this->objectFactory->create();
        $this->objectResourceModel->load($user, $id);
        if (!$user->getId()) {
            throw new NoSuchEntityException(__('Object with id "%id" does not exist.', $id));
        }
        return $user;
    }

    /**
     * @param SearchCriteriaInterface $criteria
     * @return SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria)
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($criteria, $collection);

        $searchResult = $this->searchResultsFactory->create();
        $searchResult->setSearchCriteria($criteria);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());
        return $searchResult;
    }

    /**
     * @param UserInterface $user
     * @return UserInterface
     * @throws CouldNotSaveException
     */
    public function save(UserInterface $user)
    {
        try {
            $this->objectResourceModel->save($user);
        } catch (Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $user;
    }

    /**
     * @param UserInterface $user
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(UserInterface $user)
    {
        try {
            $this->objectResourceModel->delete($user);
        } catch (Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    /**
     * @param int $id
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById(int $id)
    {
        return $this->delete($this->getById($id));
    }
}
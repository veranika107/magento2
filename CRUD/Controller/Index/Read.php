<?php

namespace Epam\CRUD\Controller\Index;

use Epam\CRUD\Api\UserRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Read extends Action
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private $criteriaBuilder;

    /**
     * @param Context $context
     * @param UserRepositoryInterface $userRepository
     * @param SearchCriteriaBuilder $criteriaBuilder
     */
    public function __construct(
        Context $context,
        UserRepositoryInterface $userRepository,
        SearchCriteriaBuilder $criteriaBuilder
    ) {
        parent::__construct($context);
        $this->userRepository = $userRepository;
        $this->criteriaBuilder = $criteriaBuilder;
    }

    /**
     * @return void
     */
    public function execute()
    {
        //$this->criteriaBuilder->addFilter('user_id', 2);
        $searchCriteria = $this->criteriaBuilder->create();

        $users = $this->userRepository->getList($searchCriteria)->getItems();

        $text = 'List of all users: <br>';
        foreach ($users as $user) {
            $text .= $user->getUserId() . ': ' . $user->getFirstName() . '<br>';
        }

        $this->getResponse()->appendBody($text);
    }
}
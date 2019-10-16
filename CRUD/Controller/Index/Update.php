<?php

namespace Epam\CRUD\Controller\Index;

use Epam\CRUD\Api\UserRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Update extends Action
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
        $user = $this->userRepository->getById(1);
        $user->setFirstName('new_first_name');
        $user->setData('last_name', 'new_last_name');

        $this->userRepository->save($user);

        $this->getResponse()->appendBody('Updated user: ' . $user->getId());
    }
}
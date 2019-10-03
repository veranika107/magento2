<?php

namespace Epam\CRUD\Controller\Index;

use Epam\CRUD\Api\UserRepositoryInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Epam\CRUD\Model\UserFactory;

class Create extends Action
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @var UserFactory
     */
    private $userFactory;

    /**
     * @param Context $context
     * @param UserRepositoryInterface $userRepository
     * @param UserFactory $userFactory
     */
    public function __construct(
        Context $context,
        UserRepositoryInterface $userRepository,
        UserFactory $userFactory
    ) {
        parent::__construct($context);
        $this->userRepository = $userRepository;
        $this->userFactory = $userFactory;
    }

    /**
     * @return void
     */
    public function execute()
    {
        $user = $this->userFactory->create();
        $date = gmdate('Y-m-d H:i:s');
        $user->setFirstName('Igor');
        $user->setLastName('Lastochka');
        $user->setCreatedAt($date);
        $user->setUpdatedAt($date);

        $this->userRepository->save($user);

        $this->getResponse()->appendBody('Created user: ' . $user->getFirstName() . ' ' . $user->getLastName());
    }
}
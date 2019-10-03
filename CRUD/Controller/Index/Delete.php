<?php

namespace Epam\CRUD\Controller\Index;

use Epam\CRUD\Api\UserRepositoryInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Delete extends Action
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @param Context $context
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(
        Context $context,
        UserRepositoryInterface $userRepository
    ) {
        parent::__construct($context);
        $this->userRepository = $userRepository;
    }

    /**
     * @return void
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $this->userRepository->deleteById($id);
        $this->getResponse()->appendBody('User with id ' . $id . 'was deleted');
    }
}
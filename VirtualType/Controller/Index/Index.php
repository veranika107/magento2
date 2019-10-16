<?php
declare(strict_types=1);

namespace Epam\VirtualType\Controller\Index;

use Epam\VirtualType\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Backend\App\Action\Context;

class Index extends Action
{
    /**
     * @var Session
     */
    private $session;

    /**
     * @param Context $context
     * @param Session $session
     */
    public function __construct(
        Context $context,
        Session $session
    ) {
        parent::__construct($context);
        $this->session = $session;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $this->session->setSomeInfo('some info');
        $result = $this->session->getSomeInfo();
        $result .= '<br>' . $this->session->getNamespace();
        $this->getResponse()->appendBody($result);
    }
}
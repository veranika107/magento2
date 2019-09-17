<?php

namespace Epam\DI\Controller\Index;

use Epam\DI\Api\CustomServiceInterface;
use Epam\DI\Api\FrontendServiceInterface;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\Action;

class Index extends Action
{

    /**
     * @var CustomServiceInterface
     */
    private $custom;

    /**
     * @var FrontendServiceInterface
     */
    private $frontend;

    /**
     * @param Context $context
     * @param CustomServiceInterface $custom
     * @param FrontendServiceInterface $frontend
     */
    public function __construct(
      Context $context,
      CustomServiceInterface $custom,
      FrontendServiceInterface $frontend
    ) {
        parent::__construct($context);
        $this->custom   = $custom;
        $this->frontend = $frontend;
    }

    /**
     * @return void
     */
    public function execute()
    {
        $text = 'Value from global di.xml: <br> Text: ' . $this->custom->getText() . '<br> Array: ' . print_r($this->custom->getItems(),
            true) . '<br><br>';
        $text .= 'Value from frontend di.xml: <br> Number: ' . $this->frontend->getNumber() . '<br> Array: ' . print_r($this->frontend->getData(),
            true);
        $this->getResponse()->appendBody($text);
    }

}
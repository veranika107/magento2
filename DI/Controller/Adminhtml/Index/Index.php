<?php

namespace Epam\DI\Controller\Adminhtml\Index;

use Epam\DI\Api\CustomServiceInterface;
use Epam\DI\Api\AdminhtmlServiceInterface;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\Action;

class Index extends Action
{

    /**
     * @var CustomServiceInterface
     */
    private $custom;

    /**
     * @var AdminhtmlServiceInterface
     */
    private $adminhtml;

    /**
     * @param Context $context
     * @param CustomServiceInterface $custom
     * @param AdminhtmlServiceInterface $adminhtml
     */
    public function __construct(
      Context $context,
      CustomServiceInterface $custom,
      AdminhtmlServiceInterface $adminhtml
    ) {
        parent::__construct($context);
        $this->custom   = $custom;
        $this->adminhtml = $adminhtml;
    }

    /**
     * @return void
     */
    public function execute()
    {
        $adminhtmlArray = $this->adminhtml->getData();
        $text = 'Value from global di.xml: <br> Text: ' . $this->custom->getText() . '<br> Array: ' . print_r($this->custom->getItems(),
            true) . '<br><br>';
        $text .= 'Value from adminhtml di.xml: <br> Number: ' . $this->adminhtml->getNumber() . '<br> Array: <br>';
        if (is_array($adminhtmlArray)) {
            foreach ($adminhtmlArray as $key => $item) {
                $text .= $key . ' => ' . $item . '<br>';
            }
        }
        $this->getResponse()->appendBody($text);
    }

}
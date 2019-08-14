<?php
declare(strict_types=1);

namespace Epam\FirstModule\Controller\Hello;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultInterface;

/**
 * Class Json
 */
class Json extends Action {

  /**
   * @var JsonFactory
   */
  private $jsonResultFactory;

  /**
   * @param Context $context
   * @param JsonFactory $jsonResultFactory
   */
  public function __construct(
    Context $context,
    JsonFactory $jsonResultFactory
  ) {
    parent::__construct($context);

    $this->jsonResultFactory = $jsonResultFactory;
  }

  /**
   * @return ResponseInterface|Json|ResultInterface
   */
  public function execute() {
    // Set default parameter.
    $mode = 'default';

    // Array with some values (is going to be used as 'params' in JSON).
    $params = [
      'orange',
      '1new',
      'town',
      '6cats',
    ];

    $result = $this->jsonResultFactory->create();
    $parameters = $this->getRequest()->getParams();

    // Array will be processed if parameter 'mode' is correctly defined in URL.
    if (isset($parameters['mode'])) {
      if ($parameters['mode'] === 'shuffle') {
        shuffle($params);
        $mode = $parameters['mode'];
      }
      elseif ($parameters['mode'] === 'sort') {
        sort($params);
        $mode = $parameters['mode'];
      }
    }

    $result->setData([
      'mode' => $mode,
      'params' => $params,
    ]);
    return $result;
  }
}
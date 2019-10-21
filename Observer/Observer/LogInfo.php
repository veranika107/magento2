<?php
declare(strict_types=1);

namespace Epam\Observer\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Psr\Log\LoggerInterface;

class LogInfo implements ObserverInterface
{

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param Observer $observer
     *
     * @return void
     */
    public function execute(Observer $observer)
    {
        $message = 'Requested URI: ' . $observer->getRequest()->getRequestUri();
        $this->logger->notice($message);
    }

}

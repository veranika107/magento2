<?php
declare(strict_types=1);

namespace Epam\ExtensionAttribute\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class Index extends Action
{

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /***
     * @param Context $context
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(
      Context $context,
      ProductRepositoryInterface $productRepository
    ) {
        parent::__construct($context);
        $this->productRepository = $productRepository;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $productId = 1;
        try {
            $product = $this->productRepository->getById($productId);
            $result = $product->getExtensionAttributes()
              ->getProductInformation();

        } catch (NoSuchEntityException $e) {
            $result = "The product doesn't exist";
        }
        $this->getResponse()->appendBody(print_r($result, true));
    }

}
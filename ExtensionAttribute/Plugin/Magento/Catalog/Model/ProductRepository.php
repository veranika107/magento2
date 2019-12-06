<?php
declare(strict_types=1);

namespace Epam\ExtensionAttribute\Plugin\Magento\Catalog\Model;

use Epam\ExtensionAttribute\Api\Data\ProductInformationInterface;
use Epam\ExtensionAttribute\Model\ProductInformationFactory;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\Data\ProductExtensionInterfaceFactory;
use Magento\Catalog\Api\ProductRepositoryInterface;

class ProductRepository
{

    const SHOPS = [
      '1 shop',
      '2 shop',
      '3 shop',
      '4 shop',
      '5 shop',
    ];

    /**
     * @var ProductInformationFactory
     */
    private $productInformationFactory;

    /**
     * @var ProductExtensionInterfaceFactory
     */
    private $extensionFactory;

    /**
     * @param ProductInformationFactory $productInformationFactory
     * @param ProductExtensionInterfaceFactory $extensionFactory
     */
    public function __construct(
      ProductInformationFactory $productInformationFactory,
      ProductExtensionInterfaceFactory $extensionFactory
    ) {
        $this->productInformationFactory = $productInformationFactory;
        $this->extensionFactory = $extensionFactory;
    }

    /**
     * @param ProductRepositoryInterface $subject
     * @param ProductInterface $entity
     *
     * @return ProductInterface
     */
    public function afterGetById(
      ProductRepositoryInterface $subject,
      ProductInterface $entity
    ) {
        if ($entity->getExtensionAttributes()) {
            $entity->setExtensionAttributes($this->extensionFactory->create());
        }

        if (!$entity->getExtensionAttributes()->getProductInformation()) {
            $entity->getExtensionAttributes()
              ->setProductInformation($this->getProductInformation());
        }
        return $entity;
    }

    /**
     * @return ProductInformationInterface
     */
    public function getProductInformation()
    {
        /** @var ProductInformationInterface $productInformation */
        $productInformation = $this->productInformationFactory->create();
        $productInformation->setShop(self::SHOPS[array_rand(self::SHOPS, 1)]);
        return $productInformation;
    }

}
<?php
declare(strict_types=1);

namespace Epam\ExtensionAttribute\Model;

use Epam\ExtensionAttribute\Api\Data\ProductInformationInterface;

class ProductInformation implements ProductInformationInterface
{

    /**
     * @var string
     */
    private $shop;

    /**
     * @inheritDoc
     */
    public function getShop()
    {
        return (string)$this->shop;
    }

    /**
     * @inheritDoc
     */
    public function setShop(string $shop)
    {
        $this->shop = $shop;
    }

}
<?php
declare(strict_types=1);

namespace Epam\ExtensionAttribute\Api\Data;

interface ProductInformationInterface
{

    /**
     * @return string
     */
    public function getShop();

    /**
     * @param string $shop
     *
     * @return ProductInformationInterface
     */
    public function setShop(string $shop);

}
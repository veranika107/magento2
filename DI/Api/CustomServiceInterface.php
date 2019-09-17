<?php

namespace Epam\DI\Api;

/**
 * @api
 */
interface CustomServiceInterface
{

    /**
     * @return string
     */
    public function getText();

    /**
     * @return array
     */
    public function getItems();
}
<?php

namespace Epam\DI\Api;

/**
 * @api
 */
interface FrontendServiceInterface
{

    /**
     * @return int
     */
    public function getNumber();

    /**
     * @return array
     */
    public function getData();
}
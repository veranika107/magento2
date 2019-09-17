<?php

namespace Epam\DI\Api;

/**
 * @api
 */
interface AdminhtmlServiceInterface
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
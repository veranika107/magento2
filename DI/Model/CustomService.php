<?php

namespace Epam\DI\Model;

use Epam\DI\Api\CustomServiceInterface;

class CustomService implements CustomServiceInterface
{

    /**
     * @var string
     */
    private $snippetString;

    /**
     * @var array
     */
    private $snippetArray;

    /**
     * @param string $snippetString
     * @param array $snippetArray
     */
    public function __construct($snippetString = '', array $snippetArray = [])
    {
        $this->snippetString = $snippetString;
        $this->snippetArray  = $snippetArray;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->snippetString;
    }

    /**
     * @return array
     */
    public function getItems()
    {
        return $this->snippetArray;
    }

}
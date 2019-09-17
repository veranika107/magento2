<?php

namespace Epam\DI\Model;

use Epam\DI\Api\FrontendServiceInterface;

class FrontendService implements FrontendServiceInterface
{

    /**
     * @var int
     */
    private $frontendNumber;

    /**
     * @var array
     */
    private $frontendArray;

    /**
     * @param int $frontendNumber
     * @param array $frontendArray
     */
    public function __construct($frontendNumber = 0, array $frontendArray = [])
    {
        $this->frontendNumber = $frontendNumber;
        $this->frontendArray  = $frontendArray;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->frontendNumber;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->frontendArray;
    }

}
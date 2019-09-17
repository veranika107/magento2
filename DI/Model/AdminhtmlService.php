<?php

namespace Epam\DI\Model;

use Epam\DI\Api\AdminhtmlServiceInterface;

class AdminhtmlService implements AdminhtmlServiceInterface
{

    /**
     * @var int
     */
    private $adminhtmlNumber;

    /**
     * @var array
     */
    private $adminhtmlArray;

    /**
     * @param int $adminhtmlNumber
     * @param array $adminhtmlArray
     */
    public function __construct(
      $adminhtmlNumber = 0,
      array $adminhtmlArray = []
    ) {
        $this->adminhtmlNumber = $adminhtmlNumber;
        $this->adminhtmlArray  = $adminhtmlArray;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->adminhtmlNumber;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->adminhtmlArray;
    }

}
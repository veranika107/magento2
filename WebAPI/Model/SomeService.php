<?php

namespace Epam\WebAPI\Model;

use Epam\WebAPI\Api\SomeServiceInterface;

class SomeService implements SomeServiceInterface
{

    /**
     * @inheritDoc
     */
    public function someFunction(string $test)
    {
        return $test;
    }

}
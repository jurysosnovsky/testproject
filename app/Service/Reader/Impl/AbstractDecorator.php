<?php

namespace App\Service\Reader\Impl;

use App\Service\Reader\Contracts\ReaderInterface;

abstract class AbstractDecorator implements ReaderInterface
{
    public function __construct(
        protected ReaderInterface $decorated,
    )
    {
    }
}

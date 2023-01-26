<?php

namespace App\Service\ETL\Impl;

use App\Service\ETL\Contracts\ETLInterface;

abstract class AbstractDecorator implements ETLInterface
{
    public function __construct(
        protected ETLInterface $decorated,
    )
    {
    }
}

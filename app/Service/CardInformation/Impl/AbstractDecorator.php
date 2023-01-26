<?php

namespace App\Service\CardInformation\Impl;

use App\Service\CardInformation\Contracts\ServiceInterface;

abstract class AbstractDecorator implements ServiceInterface
{
    public function __construct(
        protected ServiceInterface $decorated,
    )
    {
    }

}

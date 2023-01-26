<?php

namespace App\Service\CardInformation;

use App\Service\CardInformation\Contracts\ServiceInterface;

interface FactoryInterface
{
    public function getService(): ServiceInterface;
}

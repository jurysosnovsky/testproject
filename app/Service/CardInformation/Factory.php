<?php

namespace App\Service\CardInformation;

use App\Service\CardInformation\Contracts\ServiceInterface;
use App\Service\CardInformation\Impl\CacheDecorator;
use App\Service\CardInformation\Impl\FakeHttpService;
use App\Service\CardInformation\Impl\ValidationDecorator;

final class Factory implements FactoryInterface
{
    public function getService(): ServiceInterface
    {
        return new ValidationDecorator(
            new CacheDecorator(
                new FakeHttpService(),
            ),
        );
    }
}

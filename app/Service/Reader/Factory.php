<?php

namespace App\Service\Reader;

use App\Service\Reader\Contracts\ReaderInterface;
use App\Service\Reader\Impl\FakeExcelReader;
use App\Service\Reader\Impl\ValidationDecorator;

final class Factory implements FactoryInterface
{
    public function getExcelReader(): ReaderInterface
    {
        return new ValidationDecorator(
            new FakeExcelReader(),
        );
    }
}

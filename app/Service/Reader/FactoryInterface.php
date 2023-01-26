<?php

namespace App\Service\Reader;

use App\Service\Reader\Contracts\ReaderInterface;

interface FactoryInterface
{
    public function getExcelReader(): ReaderInterface;
}

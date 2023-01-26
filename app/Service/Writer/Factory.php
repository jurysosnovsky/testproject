<?php

namespace App\Service\Writer;

use App\Service\Writer\Contracts\WriterInterface;
use App\Service\Writer\Impl\FakeExcelWriter;

final class Factory implements FactoryInterface
{
    public function getExcelWriter(): WriterInterface
    {
        return new FakeExcelWriter();
    }

}

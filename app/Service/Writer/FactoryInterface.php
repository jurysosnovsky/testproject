<?php

namespace App\Service\Writer;

use App\Service\Writer\Contracts\WriterInterface;

interface FactoryInterface
{
    public function getExcelWriter(): WriterInterface;
}

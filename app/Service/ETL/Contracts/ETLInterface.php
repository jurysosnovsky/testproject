<?php

namespace App\Service\ETL\Contracts;

interface ETLInterface
{
    public function transform(FileValueInterface $file): FileValueInterface;
}

<?php

namespace App\Service\Reader\Contracts;

interface RowResultInterface
{
    public function getRow(): array;
}

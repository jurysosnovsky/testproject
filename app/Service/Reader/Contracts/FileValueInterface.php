<?php

namespace App\Service\Reader\Contracts;

interface FileValueInterface
{
    public function getFile(): string;

    public function isValid(): bool;
}

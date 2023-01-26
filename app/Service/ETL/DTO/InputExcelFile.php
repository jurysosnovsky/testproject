<?php

namespace App\Service\ETL\DTO;

use App\Service\Reader\Contracts\FileValueInterface;

final class InputExcelFile implements FileValueInterface
{

    public function __construct(
        private string $file,
    )
    {
    }

    public function getFile(): string
    {
        return $this->file;
    }

    public function isValid(): bool
    {
        return true;
    }

}

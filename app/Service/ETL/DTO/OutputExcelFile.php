<?php

namespace App\Service\ETL\DTO;

use App\Service\Writer\Contracts\FileValueInterface;

final class OutputExcelFile implements FileValueInterface
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

}

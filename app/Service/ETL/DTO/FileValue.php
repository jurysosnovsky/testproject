<?php

namespace App\Service\ETL\DTO;

use App\Service\ETL\Contracts\FileValueInterface;

final class FileValue implements FileValueInterface
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

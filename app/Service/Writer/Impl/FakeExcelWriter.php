<?php

namespace App\Service\Writer\Impl;

use App\Service\Writer\Contracts\FileValueInterface;
use App\Service\Writer\Contracts\WriterInterface;

final class FakeExcelWriter implements WriterInterface
{
    public function write(FileValueInterface $file, array $data): bool
    {
        var_dump($data);
        return true;
    }

    public function flush(): bool
    {
        return true;
    }

}

<?php

namespace App\Service\Writer\Contracts;

interface WriterInterface
{
    public function write(FileValueInterface $file, array $data): bool;

    public function flush(): bool;
}

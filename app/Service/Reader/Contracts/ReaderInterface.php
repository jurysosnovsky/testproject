<?php

namespace App\Service\Reader\Contracts;

use Generator;

interface ReaderInterface
{
    public function read(FileValueInterface $file): Generator;
}

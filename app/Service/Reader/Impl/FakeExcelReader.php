<?php

namespace App\Service\Reader\Impl;

use App\Service\Reader\Contracts\FileValueInterface;
use App\Service\Reader\Contracts\ReaderInterface;
use App\Service\Reader\DTO\RowResult;
use Generator;

final class FakeExcelReader implements ReaderInterface
{
    private array $cards;

    public function __construct()
    {
        $this->cards = [
            [1, 'test', '1234-5678-9012-3456'],
            [2, 'test', '2234-5678-9012-3456'],
            [3, 'test', '3234-5678-9012-3456'],
            [4, 'test', '4234-5678-9012-3456'],
            [5, 'test', '5234-5678-9012-3456'],
            [6, 'test', '6234-5678-9012-3456'],
            [7, 'test', '7234-5678-9012-3456'],
            [8, 'test', '8234-5678-9012-3456'],
            [9, 'test', '9234-5678-9012-3456'],
            [10, 'test', '1134-5678-9012-3456'],
        ];
    }

    public function read(FileValueInterface $file): Generator
    {
        foreach ($this->cards as $card) {
            yield new RowResult($card);
        }
    }

}

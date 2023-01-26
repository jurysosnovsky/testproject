<?php

namespace App\Service\Reader\DTO;

use App\Service\Reader\Contracts\RowResultInterface;

final class RowResult implements RowResultInterface
{
    public function __construct(
        private array $row,
    )
    {
    }

    public function getRow(): array
    {
        return $this->row;
    }

}

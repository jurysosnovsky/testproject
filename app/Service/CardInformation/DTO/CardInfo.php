<?php

namespace App\Service\CardInformation\DTO;

use App\Service\CardInformation\Contracts\CardInfoInterface;

final class CardInfo implements CardInfoInterface
{
    public function __construct(
        private string $type,
        private string $bank,
    )
    {
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getBank(): string
    {
        return $this->bank;
    }

}

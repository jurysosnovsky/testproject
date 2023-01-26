<?php

namespace App\Service\ETL\DTO;

use App\Service\CardInformation\Contracts\CardNumberInterface;

final class CardNumber implements CardNumberInterface
{
    public function __construct(
        private string $cardNumber,
    )
    {
    }

    public function getNumber(): string
    {
        return $this->cardNumber;
    }

    public function getBIN(): string
    {
        $clean = str_replace('-', '', $this->cardNumber);
        return substr($clean, 0, 6);
    }

    public function getIIN(): string
    {
        $clean = str_replace('-', '', $this->cardNumber);
        return substr($clean, 6);
    }

    public function isValid(): bool
    {
        return true;
    }

}

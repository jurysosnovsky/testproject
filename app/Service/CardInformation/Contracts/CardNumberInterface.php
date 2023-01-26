<?php

namespace App\Service\CardInformation\Contracts;

interface CardNumberInterface
{
    public function getNumber(): string;

    public function getBIN(): string;

    public function getIIN(): string;

    public function isValid(): bool;
}

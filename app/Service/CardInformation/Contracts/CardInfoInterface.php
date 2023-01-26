<?php

namespace App\Service\CardInformation\Contracts;

interface CardInfoInterface
{
    public function getType(): string;

    public function getBank(): string;
}

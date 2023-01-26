<?php

namespace App\Service\CardInformation\Contracts;

interface ServiceInterface
{
    public function getCardInfo(CardNumberInterface $cardNumber): CardInfoInterface;
}

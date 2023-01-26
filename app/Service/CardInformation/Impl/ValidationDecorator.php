<?php

namespace App\Service\CardInformation\Impl;

use App\Service\CardInformation\Contracts\CardInfoInterface;
use App\Service\CardInformation\Contracts\CardNumberInterface;

final class ValidationDecorator extends AbstractDecorator
{

    public function getCardInfo(CardNumberInterface $cardNumber): CardInfoInterface
    {
        if (!$cardNumber->isValid()) {
            throw new \RuntimeException(sprintf('Card number in wrong format: %s', $cardNumber->getNumber()));
        }
        return $this->decorated->getCardInfo($cardNumber);
    }

}

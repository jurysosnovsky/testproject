<?php

namespace App\Service\CardInformation\Impl;

use App\Service\CardInformation\Contracts\CardInfoInterface;
use App\Service\CardInformation\Contracts\CardNumberInterface;
use App\Service\CardInformation\Contracts\ServiceInterface;

final class CacheDecorator extends AbstractDecorator
{
    private array $cache;

    public function __construct(ServiceInterface $wrapped)
    {
        parent::__construct($wrapped);
        $this->cache = [];
    }

    public function getCardInfo(CardNumberInterface $cardNumber): CardInfoInterface
    {

        if (isset($this->cache[$cardNumber->getBIN()])) {
            return $this->cache[$cardNumber->getBIN()];
        }
        $this->cache[$cardNumber->getBIN()] = $this->decorated->getCardInfo($cardNumber);
        return $this->cache[$cardNumber->getBIN()];
    }

}

<?php

namespace App\Service\CardInformation\Impl;

use App\Service\CardInformation\Contracts\CardInfoInterface;
use App\Service\CardInformation\Contracts\CardNumberInterface;
use App\Service\CardInformation\Contracts\ServiceInterface;
use App\Service\CardInformation\DTO\CardInfo;

final class FakeHttpService implements ServiceInterface
{
    public function getCardInfo(CardNumberInterface $cardNumber): CardInfoInterface
    {
        $rand = rand(1, 100) % 4;
        $bank = match ($rand) {
            0 => 'Sberbank',
            1 => 'Alfa',
            2 => 'VTB24',
            3 => 'Gazprom',
            default => 'undefined',
        };
        $rand = rand(1, 100) % 4;
        $type = match ($rand) {
            0 => 'mastercard',
            1 => 'visa',
            2 => 'maestro',
            3 => 'mir',
            default => 'undefined',
        };

        return new CardInfo($type, $bank);
    }

}

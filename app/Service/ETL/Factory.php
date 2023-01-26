<?php

namespace App\Service\ETL;

use App\Service\ETL\Contracts\ETLInterface;
use App\Service\ETL\Impl\ETLCardInfo;
use App\Service\ETL\Impl\UploadDecorator;
use App\Service\CardInformation\FactoryInterface as CardInformationFactoryInterface;
use App\Service\Reader\FactoryInterface as ReaderFactoryInterface;
use App\Service\Writer\FactoryInterface as WriterFactoryInterface;
use Illuminate\Support\Facades\App;

final class Factory implements FactoryInterface
{
    public function getCardInfoETL(): ETLInterface
    {
        return new UploadDecorator(
            new ETLCardInfo(
                App::make(ReaderFactoryInterface::class),
                App::make(CardInformationFactoryInterface::class),
                App::make(WriterFactoryInterface::class),
            ),
        );
    }

}

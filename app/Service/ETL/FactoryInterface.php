<?php

namespace App\Service\ETL;

use App\Service\ETL\Contracts\ETLInterface;
use App\Service\ETL\Contracts\UploadConfigurationInterface;

interface FactoryInterface
{
    public function getCardInfoETL(UploadConfigurationInterface $uploadConfiguration): ETLInterface;
}

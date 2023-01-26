<?php

namespace App\Service\ETL\Contracts;

interface UploadConfigurationInterface
{
    public function getUrl(): string;

    public function getClientKey(): string;
}

<?php

namespace App\Service\ETL\Impl;

use App\Service\ETL\Contracts\ETLInterface;
use App\Service\ETL\Contracts\FileValueInterface;
use App\Service\ETL\Contracts\UploadConfigurationInterface;
use Illuminate\Support\Facades\Http;

final class UploadDecorator extends AbstractDecorator
{
    public function __construct(
        private UploadConfigurationInterface $uploadConfiguration,
        ETLInterface $decorated,
    )
    {
        parent::__construct($decorated);
    }

    public function transform(FileValueInterface $file): FileValueInterface
    {
        $transformedFile = $this->decorated->transform($file);
        $filename = basename($transformedFile->getFile());
        $signature = hash('sha256', $filename . $this->uploadConfiguration->getClientKey());
        Http::attach('transformed', file_get_contents($transformedFile->getFile()), $filename)
            ->withHeaders([
                'X-Verify-Signature' => $signature,
            ])
            ->post($this->uploadConfiguration->getUrl());
        return $transformedFile;
    }

}

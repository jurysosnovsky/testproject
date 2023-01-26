<?php

namespace App\Service\Reader\Impl;

use App\Service\Reader\Contracts\FileValueInterface;
use Generator;

final class ValidationDecorator extends AbstractDecorator
{

    public function read(FileValueInterface $file): Generator
    {
        if (!$file->isValid()) {
            throw new \RuntimeException(sprintf('File is wrong: %s', $file->getFile()));
        }
        return $this->decorated->read($file);
    }
}

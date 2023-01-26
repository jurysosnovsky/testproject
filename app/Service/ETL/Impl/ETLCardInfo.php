<?php

namespace App\Service\ETL\Impl;

use App\Service\CardInformation\FactoryInterface as CardInformationFactoryInterface;
use App\Service\ETL\Contracts\ETLInterface;
use App\Service\ETL\Contracts\FileValueInterface;
use App\Service\ETL\DTO\CardNumber;
use App\Service\ETL\DTO\FileValue;
use App\Service\ETL\DTO\InputExcelFile;
use App\Service\ETL\DTO\OutputExcelFile;
use App\Service\Reader\Contracts\RowResultInterface;
use App\Service\Reader\FactoryInterface as ReaderFactoryInterface;
use App\Service\Writer\FactoryInterface as WriterFactoryInterface;

final class ETLCardInfo implements ETLInterface
{

    public function __construct(
        private ReaderFactoryInterface $readerFactory,
        private CardInformationFactoryInterface $cardFactory,
        private WriterFactoryInterface $writerFactory,
    )
    {
    }

    public function transform(FileValueInterface $file): FileValueInterface
    {
        $input = new InputExcelFile($file->getFile());
        $output = new OutputExcelFile(mt_rand(1000, 9999));
        $reader = $this->readerFactory->getExcelReader();
        $writer = $this->writerFactory->getExcelWriter();
        foreach ($reader->read($input) as $row) {
            if (!$row instanceof RowResultInterface) {
                throw new \RuntimeException('Wrong data type');
            }
            $row = $row->getRow();
            $cardNumber = new CardNumber($row[2]);
            $cardInfo = $this->cardFactory->getService()->getCardInfo($cardNumber);
            $row[] = $cardInfo->getType();
            $row[] = $cardInfo->getBank();
            $writer->write($output, $row);
        }
        $writer->flush();
        return new FileValue($output->getFile());
    }

}

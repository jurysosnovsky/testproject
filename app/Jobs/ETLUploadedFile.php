<?php

namespace App\Jobs;

use App\Models\UploadFile;
use App\Service\ETL\Contracts\UploadConfigurationInterface;
use App\Service\ETL\DTO\FileValue;
use App\Service\ETL\FactoryInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ETLUploadedFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private readonly int $uploadFileId,
    )
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(FactoryInterface $factory)
    {
        /** @var UploadFile $uploadFile */
        $uploadFile = UploadFile::whereId($this->uploadFileId)->first();
        $service =$factory->getCardInfoETL(new class($uploadFile) implements UploadConfigurationInterface {

            private string $clientKey;
            private string $url;

            public function __construct(UploadFile $uploadFile)
            {
                $this->url = $uploadFile->callback;
                $this->clientKey = $uploadFile->user->client_key;
            }

            public function getUrl(): string
            {
                return $this->url;
            }

            public function getClientKey(): string
            {
                return $this->clientKey;
            }
        });
        $service->transform(new FileValue($uploadFile->path));
    }
}

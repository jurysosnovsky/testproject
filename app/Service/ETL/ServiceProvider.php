<?php

namespace App\Service\ETL;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{

    private function loadDependencies(): void
    {
        $this->app->bind(FactoryInterface::class, Factory::class);
    }

    public function register()
    {
        $this->loadDependencies();

    }


}

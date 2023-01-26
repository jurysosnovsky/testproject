<?php

namespace App\Service\Writer;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

final class ServiceProvider extends BaseServiceProvider
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

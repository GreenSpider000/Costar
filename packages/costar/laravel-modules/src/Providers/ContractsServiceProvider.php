<?php

namespace Costar\Modules\Providers;

use Illuminate\Support\ServiceProvider;
use Costar\Modules\Contracts\RepositoryInterface;
use Costar\Modules\Laravel\LaravelFileRepository;

class ContractsServiceProvider extends ServiceProvider
{
    /**
     * Register some binding.
     */
    public function register()
    {
        $this->app->bind(RepositoryInterface::class, LaravelFileRepository::class);
    }
}

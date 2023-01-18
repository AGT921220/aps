<?php

namespace App\Providers;

use App\Bussines\Erp\Client\Domain\ClientRepository;
use App\Bussines\Erp\Client\Infrastructure\ClientEloquentRepository;
use Illuminate\Support\ServiceProvider;

class ClientServiceProvider extends ServiceProvider
{
    public $bindings = [
        ClientRepository::class => ClientEloquentRepository::class,
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

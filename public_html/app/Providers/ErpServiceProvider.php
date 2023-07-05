<?php

namespace App\Providers;

use App\Bussines\Erp\Product\Domain\ProductRepository;
use App\Bussines\Erp\Product\Infrastructure\ProductEloquentRepository;
use Illuminate\Support\ServiceProvider;

class ErpServiceProvider extends ServiceProvider
{
    public $bindings = [
        ProductRepository::class => ProductEloquentRepository::class,
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

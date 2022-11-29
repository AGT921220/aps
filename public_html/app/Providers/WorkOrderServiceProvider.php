<?php

namespace App\Providers;

use App\Bussines\Erp\WorkOrder\Domain\WorkOrderRepository;
use App\Bussines\Erp\WorkOrder\Infrastructure\WorkOrderEloquentRepository;
use Illuminate\Support\ServiceProvider;

class WorkOrderServiceProvider extends ServiceProvider
{
    public $bindings = [
        WorkOrderRepository::class => WorkOrderEloquentRepository::class,
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

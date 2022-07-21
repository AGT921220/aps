<?php

namespace App\Console;

use App\Console\Commands\CheckExistencePromoOption;
use App\Console\Commands\MigrateProductCatalogPromoOption;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command(MigrateProductCatalogPromoOption::class)->everyMinute('02:00');    
        $schedule->command(MigrateProductCatalogPromoOption::class)->dailyAt('07:44'); //9:00 pm 1er proceso
         
        $schedule->command(CheckExistencePromoOption::class)->hourly(); //01:50    

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

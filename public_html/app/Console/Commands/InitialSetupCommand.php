<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class InitialSetupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'initial_setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $this->createAdminUser();
        return 0;
    }

    private function createAdminUser(): void
    {
        $adminUser = new User();
        $adminUser->name = 'Alfredo';
        $adminUser->paternal_surname = 'Gutiérrez';
        $adminUser->maternal_surname = 'González';
        $adminUser->phone = '6144950659';
        $adminUser->rol = 'admin';
        $adminUser->email = 'admin@aps.com';
        $adminUser->password = Hash::make('admin');
        $adminUser->save();
    }
}

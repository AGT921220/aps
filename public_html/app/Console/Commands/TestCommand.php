<?php

namespace App\Console\Commands;

use App\Bussines\Shared\PromoOption\Infrastructure\PromoOptionClient;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    protected $signature = 'test';
    protected $description = 'Command description';
    private $promoOptionClient;
    public function __construct(PromoOptionClient $promoOptionClient)
    {
        $this->promoOptionClient = $promoOptionClient;
        parent::__construct();
    }

    public function handle()
    {
        $promoOptionProducts = $this->promoOptionClient->__invoke();
        dd($promoOptionProducts);
    }
}

<?php

namespace App\Console\Commands;

use App\Bussines\Shared\PromoOption\ProductsPromoOptionMigrater;
use Illuminate\Console\Command;

class ProductsMigraterCommand extends Command
{
    protected $signature = 'migrate_products';
    protected $description = 'Migra Productos de Promo Opción al Catálogo';

    private $migrater;
    public function __construct(ProductsPromoOptionMigrater $migrater)
    {
        parent::__construct();
        $this->migrater = $migrater;
    }
    public function handle()
    {
        // $this->info('test');
        return;
        $this->migrater->__invoke();
    }
}

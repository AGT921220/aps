<?php

namespace App\Console\Commands;

use App\Bussines\Shared\PromoOption\ProductsExistencesPromoOptionMigrater;
use Illuminate\Console\Command;

class ProductsExistencesMigraterCommand extends Command
{
    protected $signature = 'migrate_existences_products';
    protected $description = 'Migra las existencias de Productos de Promo Opción al Catálogo';

    private $migrater;
    public function __construct(ProductsExistencesPromoOptionMigrater $migrater)
    {
        parent::__construct();
        $this->migrater = $migrater;
    }
    public function handle()
    {
        $this->migrater->__invoke();
    }
}

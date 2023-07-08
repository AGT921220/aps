<?php

namespace App\Console\Commands;

use App\Bussines\Shared\PromoOption\ProductsPromoOptionMigrater;
use Illuminate\Console\Command;

class ProductsMigraterCommand extends Command
{
    protected $signature = 'migrate_products';
    protected $description = 'Migra Productos de Promo Opción al Catálogo';

    private $promoOptionMigrater;
    public function __construct(ProductsPromoOptionMigrater $promoOptionMigrater)
    {
        parent::__construct();
        $this->promoOptionMigrater = $promoOptionMigrater;
    }
    public function handle()
    {
        info('ProductsMigraterCommand');
        $this->promoOptionMigrater->__invoke();
    }
}

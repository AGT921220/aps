<?php

namespace App\Http\Controllers\Dashboard;

use App\Bussines\Shared\PromoOption\ProductsPromoOptionMigrater;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class TestController extends Controller
{
    private $productsPromoOptionMigrater;
    public function __construct(ProductsPromoOptionMigrater $productsPromoOptionMigrater)
    {
        $this->productsPromoOptionMigrater = $productsPromoOptionMigrater;
    }
    public function index()
    {


                // Obtener la versión de PHP
                $versionPHP = phpversion();

                // Obtener la versión de Laravel
                $versionLaravel = app()->version();
        
                // Retornar una respuesta al cliente
                return response()->json([
                    'version_php' => $versionPHP,
                    'version_laravel' => $versionLaravel
                ]);
        Artisan::call('migrate_products', [
        ]);
        return;
        $products = $this->productsPromoOptionMigrater->__invoke();
        
        return $products;
    }
}

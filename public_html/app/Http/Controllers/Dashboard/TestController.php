<?php

namespace App\Http\Controllers\Dashboard;

use App\Bussines\Shared\PromoOption\Infrastructure\PromoOptionClient;
use App\Bussines\Shared\PromoOption\ProductsExistencesPromoOptionMigrater;
use App\Bussines\Shared\PromoOption\ProductsPromoOptionMigrater;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;

class TestController extends Controller
{

    private $migrater;
    private $httpClient;
    public function __construct(ProductsExistencesPromoOptionMigrater $migrater,
    
    PromoOptionClient $httpClient
    )
    {
        $this->migrater = $migrater;
        $this->httpClient = $httpClient;
    }
    public function index()
    {

        return $this->httpClient->getProducts();



        $this->migrater->__invoke();
        return;

        // Obtener la versión de PHP
        $versionPHP = phpversion();

        // Obtener la versión de Laravel
        $versionLaravel = app()->version();
        $horaActual = Carbon::now()->toTimeString();

        // Retornar una respuesta al cliente
        return response()->json([
            'version_php' => $versionPHP,
            'version_laravel' => $versionLaravel,
            'hora' => $horaActual
        ]);
    }
}

<?php

namespace App\Console\Commands;

use App\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TestPromoOption extends Command
{
    protected $signature = 'test_promo_option';

    protected $description = 'Migra Productos de Promo Opción al Catálogo';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

        $products = Product::select(DB::raw('DISTINCT family'))->get();

        $products->map(function ($item) {
            $this->createBladeFiles(str_replace(" ", "-", $item->family));
        });

        /*
        $type = 'existencias';
        $promoOptionProducts = $this->getPromoOptionProducts($type);

        $file = 'existenciasProduccion.json';
        Storage::disk('local')->put($file, json_encode($promoOptionProducts));

        $catalogProducts = Storage::get('existenciasProduccion.json');
        $test = json_decode($catalogProducts, true);
        dd($test);
        $test  = json_decode($catalogProducts);
        info($test);
        dd(json_encode($test));
        */
    }
    private function createBladeFiles(string $family): void
    {


        $content = '@extends("layouts.app")


        @section("metas")
        
        <meta name="META" content="EJEMPLO DE ETIQUETA META">
        
        @endsection
        
        @section("content")
        @include("page.categories.products.index")
        @endsection';

        $createfile = fopen($_SERVER['DOCUMENT_ROOT'] . "./resources/views/page/categories/$family.blade.php", 'w',$content);
//        file_put_contents($createfile, $content);
fwrite($createfile, $content);
fclose($createfile);

    }
    private function getPromoOptionProducts(string $type): array
    {
        $user = 'CHI0208';
        $xapikey = 'eeaf988dc5b4e6d3a92095ccd6b7e480';
        $headers = array(
            "user: " . $user,
            "x-api-key: " . $xapikey,
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, "demo=1"); //Opcional
        curl_setopt(
            $ch,
            CURLOPT_URL,
            "https://www.contenidopromo.com/wsds/mx/$type/"
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result, true);
    }
}

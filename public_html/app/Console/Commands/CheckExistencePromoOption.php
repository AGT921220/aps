<?php

namespace App\Console\Commands;

use App\Product;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class CheckExistencePromoOption extends Command
{
    protected $signature = 'check_existence_promo_option';

    protected $description = 'Revisa la existencia de productos en promo opción y los valida/invalida';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        info('CheckExistencePromoOption');
        $type = 'existencias';
        $promoOptionExistences = $this->getPromoOptionExistences($type);

        //$promoOptionExistences  = json_decode(Storage::get('existenciasProduccion.json'), true);




        $this->updateExistences($promoOptionExistences);
    }

    private function getPromoOptionExistences(string $type): array
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

    private function updateProduct(string $product,  int $existence): void
    {
        Product::where('item_code', $product)->update(['existences' => $existence]);
    }
    private function updateExistences($toUpdate): void
    {
        if (count($toUpdate) >= 1) {
            foreach ($toUpdate as $product => $existence) {
                $existence = (!!$existence) ? $existence : 0;
                $this->updateProduct($product, $existence);
            }
        }
    }
}

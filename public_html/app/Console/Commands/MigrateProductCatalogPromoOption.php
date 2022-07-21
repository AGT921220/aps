<?php

namespace App\Console\Commands;

use App\Product;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;

class MigrateProductCatalogPromoOption extends Command
{
    protected $signature = 'migrate_product_catalog_promo_option';

    protected $description = 'Migra Productos de Promo Opción al Catálogo';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $type ='catalogo';
        $promoOptionProducts = $this->getPromoOptionProducts($type);
        $localProducts = $this->getLocalProducts();
        $itemCodes = $localProducts->pluck('item_code')->toArray();

        $toInsert = [];
        $toUpdate = [];
        foreach ($promoOptionProducts as $product) {
            if (!in_array($product['item_code'], $itemCodes)) {
                array_push($toInsert, $product);
            }
            if (in_array($product['item_code'], $itemCodes)) {
                array_push($toUpdate, $product);
            }
        }
        $this->insertNewValues($toInsert);
        $this->updateValues($toUpdate);

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
        curl_setopt($ch, CURLOPT_POSTFIELDS, "demo=1"); //Opcional
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

    private function getLocalProducts(): Collection
    {
        return Product::all();
    }
    private function insertProducts(array $products): void
    {
        Product::insert($products);
    }
    private function updateProduct(array $product):void
    {
        Product::where('item_code', $product['item_code'])->update($product);
    }
    private function insertNewValues($toInsert): void
    {
        if (count($toInsert) >= 1) {
            foreach (array_chunk($toInsert, ceil(count($toInsert) / 5)) as $chunk) {
                $this->insertProducts($chunk);
            }
        }
    }
    private function updateValues($toUpdate):void
    {
        if (count($toUpdate) >= 1) {
            foreach (array_chunk($toUpdate, ceil(count($toUpdate) / 100)) as $chunk) {
                foreach($chunk as $product)
                {
                    $this->updateProduct($product);
                }
            }
        }
    }
}

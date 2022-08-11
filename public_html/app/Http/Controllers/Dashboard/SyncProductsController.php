<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Database\Eloquent\Collection;

class SyncProductsController extends Controller
{
    public function index()
    {
        $type = 'catalogo';
        $promoOptionProducts = $this->getPromoOptionProducts($type);
        $localProducts = $this->getLocalProducts();
        $itemCodes = $localProducts->pluck('item_code')->toArray();

        $toInsert = [];
        $toUpdate = [];
        foreach ($promoOptionProducts as $product) {
            $formatProduct = $this->getFormatProduct($product);
            if (!in_array($product['item_code'], $itemCodes)) {
                array_push($toInsert, $formatProduct);
            }
            if (in_array($product['item_code'], $itemCodes)) {
                array_push($toUpdate, $formatProduct);
            }
        }
        $this->insertNewValues($toInsert);
        $this->updateValues($toUpdate);
        return redirect('/new-products')->with('success', 'Productos Actualizados');
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

    private function getLocalProducts(): Collection
    {
        return Product::all();
    }
    private function insertProducts(array $products): void
    {
        Product::insert($products);
    }
    private function updateProduct(array $product): void
    {
        Product::where('item_code', $product['item_code'])->update($product);
    }
    private function insertNewValues($toInsert): void
    {
        if (count($toInsert) >= 1) {
            foreach (array_chunk($toInsert, ceil(count($toInsert) / 500)) as $chunk) {
                $this->insertProducts($chunk);
            }
        }
    }
    private function updateValues($toUpdate): void
    {
        if (count($toUpdate) >= 1) {
            foreach (array_chunk($toUpdate, ceil(count($toUpdate) / 500)) as $chunk) {
                foreach ($chunk as $product) {
                    $this->updateProduct($product);
                }
            }
        }
    }

    private function getFormatProduct(array $product): array
    {
        return [
            'name' => (!!$product['name']) ? $product['name'] : '',
            'item_code' => (!!$product['item_code']) ? $product['item_code'] : '',
            'parent_code' => (!!$product['parent_code']) ? $product['parent_code'] : '',
            'description' => (!!$product['description']) ? $product['description'] : '',
            'size' => (!!$product['size']) ? $product['size'] : 0,
            'family' => (!!$product['family']) ? $product['family'] : '',
            'color' => (!!$product['color']) ? $product['color'] : 0,
            'colors' => (!!$product['colors']) ? $product['colors'] : '',
            'material' => (!!$product['material']) ? $product['material'] : 0,
            'capacity' => (!!$product['capacity']) ? $product['capacity'] : 0,
            'batteries' => (!!$product['batteries']) ? $product['batteries'] : '',
            'printing' => (!!$product['printing']) ? $product['printing'] : '',
            'printing_area' => (!!$product['printing_area']) ? $product['printing_area'] : '',
            'nw' => (!!$product['nw']) ? $product['nw'] : 0,
            'gw' => (!!$product['gw']) ? $product['gw'] : 0,
            'height' => (!!$product['height']) ? $product['height'] : 0.0,
            'width' => (!!$product['width']) ? $product['width'] : 0,
            'length' => (!!$product['length']) ? $product['length'] : 0,
            'count_box' => (!!$product['count_box']) ? $product['count_box'] : 0,
            'img' => (!!$product['img']) ? $product['img'] : '',
        ];
    }
}

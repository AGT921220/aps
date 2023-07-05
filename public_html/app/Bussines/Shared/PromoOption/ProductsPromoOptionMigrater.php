<?php

namespace App\Bussines\Shared\PromoOption;

use App\Bussines\Erp\Product\Domain\Product;
use App\Bussines\Shared\PromoOption\Infrastructure\PromoOptionClient;
use App\Models\Product as ModelsProduct;
use Illuminate\Support\Carbon;

class ProductsPromoOptionMigrater
{
    private $httpClient;
    private const CHUNK_LIMIT = 1000;
    public function __construct(PromoOptionClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }
    public function __invoke()
    {

        $localProductItemCodes = $this->getLocalProducts();
        $productsToInsert = $this->getPromoOptionProducts($localProductItemCodes);
        $chunkedProducts = array_chunk($productsToInsert, self::CHUNK_LIMIT);

        foreach ($chunkedProducts as $chunk) {
            ModelsProduct::insert($chunk);
        }
    }
    private function getPromoOptionProducts(array $localProductItemCodes): array
    {
        $currentDate = Carbon::now()->toDateString();

        $result = array_map(function (array $data) use ($localProductItemCodes, $currentDate) {
            if (!in_array($data['item_code'], $localProductItemCodes)) {
                return [
                    'item_code' => $data['item_code'],
                    'provider' => Product::PROMOOPTION_TYPE,
                    'parent_code' => $data['parent_code'],
                    'family' => $data['family'],
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'color' => $data['color'],
                    'colors' => $data['colors'],
                    'size' => $data['size'],
                    'material' => $data['material'],
                    'capacity' => $data['capacity'],
                    'printing' => $data['printing'],
                    'printing_area' => $data['printing_area'],
                    'height' =>  $data['height'],
                    'width' =>  $data['width'],
                    'length' =>  $data['length'],
                    'count_box' =>  $data['count_box'],
                    'img' => $data['img'],
                    'created_at' => $currentDate,
                    'updated_at' => $currentDate
                ];
            }
        }, $this->httpClient->__invoke(Product::CATALOG_TYPE));


        $result = array_filter($result, function ($value) {
            return $value !== null;
        });

        $result = array_values($result);

        return array_values(array_filter($result));
    }
    private function getLocalProducts(): array
    {
        return ModelsProduct::select('item_code')->where('provider', Product::PROMOOPTION_TYPE)->pluck('item_code')->toArray();
    }
}

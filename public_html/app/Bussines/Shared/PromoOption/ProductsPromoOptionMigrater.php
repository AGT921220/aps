<?php

namespace App\Bussines\Shared\PromoOption;

use App\Bussines\Erp\Product\Domain\Product;
use App\Bussines\Shared\PromoOption\Infrastructure\PromoOptionClient;
use App\Models\Product as ModelsProduct;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Collection;
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
        info('START');

        info('getPromoOptionProducts');
        $promoOptionProducts = $this->getPromoOptionProducts();
        info('getPromoOptionProducts Finish');

        info('array_map productsToInsert');
        $productsToInsert = array_map(function (array $data) {
            unset($data['images']);
            unset($data['childrens']);
            return $data;
        }, $promoOptionProducts);
        info('array_map productsToInsert Finish');

        $chunkedProducts = array_chunk($productsToInsert, self::CHUNK_LIMIT);

        info('chunks');
        foreach ($chunkedProducts as $chunk) {
            ModelsProduct::insert($chunk);
        }
        info('chunks Finish');

        info('array_map productImages');
        $productImages = array_map(function (array $product) {
            return ['images' => $product['images'], 'item_code' => $product['item_code']];
        }, $promoOptionProducts);
        info('array_map productImages Finish');

        info('insertProductImages');
        $this->insertProductImages($productImages);
        info('insertProductImages Finish');

        info('array_map productChildrens');
        $productChildrens = array_map(function (array $product) {
            return ['childrens' => $product['childrens'], 'parent_id' => $product['item_code']];
        }, $promoOptionProducts);
        info('array_map productChildrens Finish');

        info('getLocalParentProducts');
        $allParentProducts = $this->getLocalParentProducts();
        info('getLocalParentProducts Finish');


        info('foreach');
        $productChildrensToInsert = [];
        foreach ($productChildrens as $childrens) {
            foreach ($childrens['childrens'] as $children) {

                $parentId = $allParentProducts->where('item_code', $childrens['parent_id'])->first()->id;
                $productChildrensToInsert[] = [
                    'parent_id' => $parentId, 'provider' => Product::PROMOOPTION_TYPE,
                    'name' => html_entity_decode($children['nombreHijo']),
                    'item_code' => $children['skuHijo'],
                    'color'=>$children['color']
                ];
            }
        }
        info('foreach Finish');


        $chunkedProducts = array_chunk($productChildrensToInsert, self::CHUNK_LIMIT);

        info('chunk');
        foreach ($chunkedProducts as $chunk) {
            ModelsProduct::insert($chunk);
        }
        info('chunk Finish');

    }
    private function getPromoOptionProducts(): array
    {
        $currentDate = Carbon::now()->toDateString();
        $localProductItemCodes = $this->getLocalProductItemCodes();

        $result = array_map(function (array $data) use ($localProductItemCodes, $currentDate) {
            if (!in_array($data['skuPadre'], $localProductItemCodes)) {
                return [
                    'item_code' => $data['skuPadre'],
                    'provider' => Product::PROMOOPTION_TYPE,
                    'family' => html_entity_decode($data['categorias']),
                    'name' => html_entity_decode($data['nombrePadre']),
                    'description' => html_entity_decode($data['descripcion']),
                    'material' => html_entity_decode($data['material']),
                    'capacity' => $data['capacidad'],
                    'created_at' => $currentDate,
                    'updated_at' => $currentDate,
                    'images' => $data['imagenesPadre'],
                    'childrens' => $data['hijos']
                ];
            }
        }, $this->httpClient->getProducts());


        $result = array_filter($result, function ($value) {
            return $value !== null;
        });

        $result = array_values($result);

        return array_values(array_filter($result));
    }
    private function getLocalProductItemCodes(): array
    {
        return ModelsProduct::select('item_code')->where('provider', Product::PROMOOPTION_TYPE)->pluck('item_code')->toArray();
    }
    private function insertProductImages(array $products): void
    {
        $localProducts = $this->getLocalParentProducts();
        $productImagesToInsert = [];
        foreach ($products as $product) {
            $currentId = $localProducts->where('item_code', $product['item_code'])->first()->id;

            foreach ($product['images'] as $image) {
                $productImagesToInsert[] = ['product_id' => $currentId, 'image' => $image];
            }
            $localProducts->forget($product->id);

            //AQUI
        }
        $chunkedProductImages = array_chunk($productImagesToInsert, self::CHUNK_LIMIT);

        foreach ($chunkedProductImages as $chunk) {
            ProductImage::insert($chunk);
        }
    }
    private function getLocalParentProducts(): Collection
    {
        return ModelsProduct::select('item_code', 'id')
        ->whereNull('parent_id')
        ->where('provider', Product::PROMOOPTION_TYPE)->get();
    }
    
}

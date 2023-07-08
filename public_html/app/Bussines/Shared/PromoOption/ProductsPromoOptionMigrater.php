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

        $productsToInsert = array_map(function (array $data) {
            unset($data['images']);
            unset($data['childrens']);
            return $data;
        }, $promoOptionProducts);

        $productImages = array_map(function (array $product) {
            return ['images' => $product['images'], 'item_code' => $product['item_code']];
        }, $promoOptionProducts);

        $productChildrens = array_map(function (array $product) {
            return ['childrens' => $product['childrens'], 'parent_id' => $product['item_code']];
        }, $promoOptionProducts);
        array_shift($promoOptionProducts);


        $this->insertParentProducts($productsToInsert);
        $this->insertProductImages($productImages);
        $this->insertChildrenProducts($productsToInsert, $productChildrens);



        $childrenImages = [];
        foreach ($productChildrens as $productChildren) {
            foreach ($productChildren['childrens'] as $children) {
                if (!!$children['imagenesHijo']) {
                    $newChildren = ['item_code' => $children['skuHijo'], 'image' => $children['imagenesHijo'][0]];
                    $childrenImages[] = $newChildren;
                }
            }
        }
        $this->insertChildrenProductImages($childrenImages);
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
        $codes = collect($products)->pluck('item_code')->toArray();

        //AQUI
        $localProducts = $this->getLocalParentProducts($codes)->toArray();

        $localProductsNew = [];

        foreach ($localProducts as $item) {
            $localProductsNew[$item['item_code']] = $item;
        }


        $productImagesToInsert = [];
        foreach ($products as $product) {
            // $currentId = $localProducts->where('item_code', $product['item_code'])->first()->id;
            $currentProduct = $localProductsNew[$product['item_code']];
            if (!$currentProduct) {
                continue;
            }
            foreach ($product['images'] as $image) {
                $productImagesToInsert[] = ['product_id' => $currentProduct['id'], 'image' => $image];
            }
            unset($localProductsNew[$product['item_code']]);
        }
        $chunkedProductImages = array_chunk($productImagesToInsert, self::CHUNK_LIMIT);

        foreach ($chunkedProductImages as $chunk) {
            ProductImage::insert($chunk);
        }
    }
    private function getLocalParentProducts(array $codes): Collection
    {
        return ModelsProduct::select('item_code', 'id')
            ->whereNull('parent_id')
            ->whereIn('item_code', $codes)
            ->where('provider', Product::PROMOOPTION_TYPE)->get();
    }

    private function getLocalChildrenProducts(array $codes): Collection
    {
        return ModelsProduct::select('item_code', 'id')
            ->whereNotNull('parent_id')
            ->whereIn('item_code', $codes)
            ->where('provider', Product::PROMOOPTION_TYPE)->get();
    }

    private function insertParentProducts(array $productsToInsert): void
    {
        $chunkedProducts = array_chunk($productsToInsert, self::CHUNK_LIMIT);
        info('chunks');
        foreach ($chunkedProducts as $chunk) {
            ModelsProduct::insert($chunk);
        }
        info('chunks Finish');
    }

    private function insertChildrenProducts(array $productsToInsert, array $productChildrens): void
    {
        $codes = collect($productsToInsert)->pluck('item_code')->toArray();
        $allParentProducts = $this->getLocalParentProducts($codes);
        info('getLocalProducts Finish');


        $localProductsNew = [];

        foreach ($allParentProducts as $item) {
            $localProductsNew[$item['item_code']] = $item;
        }

        info('foreach');
        $productChildrensToInsert = [];
        foreach ($productChildrens as $childrens) {
            foreach ($childrens['childrens'] as $children) {

                if ($children['estatus'] == 1) {
                    $parent = $localProductsNew[$childrens['parent_id']];

                    $productChildrensToInsert[] = [
                        'parent_id' => $parent['id'], 'provider' => Product::PROMOOPTION_TYPE,
                        'name' => html_entity_decode($children['nombreHijo']),
                        'item_code' => $children['skuHijo'],
                        'color' => $children['color']
                    ];
                }
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
    private function insertChildrenProductImages(array $childrenProducts): void
    {
        $codes = collect($childrenProducts)->pluck('item_code')->toArray();
        $localProducts = $this->getLocalChildrenProducts($codes);
        $localProductsNew = [];

        foreach ($localProducts as $item) {
            $localProductsNew[$item['item_code']] = $item;
        }



        $productImagesToInsert = [];
        foreach ($childrenProducts as $product) {
            // $currentId = $localProducts->where('item_code', $product['item_code'])->first()->id;

            if (isset($localProductsNew[$product['item_code']])) {
                $currentProduct = $localProductsNew[$product['item_code']];
                $productImagesToInsert[] = ['product_id' => $currentProduct['id'], 'image' => $product['image']];
                unset($localProductsNew[$product['item_code']]);
            }
        }
        $chunkedProductImages = array_chunk($productImagesToInsert, self::CHUNK_LIMIT);

        foreach ($chunkedProductImages as $chunk) {
            ProductImage::insert($chunk);
        }
    }
}

<?php

namespace App\Bussines\Shared\PromoOption;

use App\Bussines\Erp\Product\Domain\Product;
use App\Bussines\Shared\PromoOption\Infrastructure\PromoOptionClient;
use App\Models\Product as ModelsProduct;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProductsExistencesPromoOptionMigrater
{
    private $httpClient;
    private const CHUNK_LIMIT = 1000;
    public function __construct(PromoOptionClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }
    public function __invoke()
    {
        info('ProductsExistencesPromoOptionMigrater');
        $productKeys = $this->getProductKeys();
        $productExistences = $this->getProductStocks();
        info('getProductStocks');

        $productsToUpdate = [];

        info('foreach');
        foreach ($productExistences as $productExistence) {
            $product = $productKeys->where('item_code', $productExistence['Material'])
                ->whereNotNull('parent_id')
                ->first();
            $product = $product ? $product : $product = $productKeys->where('item_code', $productExistence['Material'])
                ->first();

            if ($product) {
                $productExistence['id'] = $product->id;
                $productsToUpdate[] = $productExistence;
                // $productKeys->forget($product->id);

            } else {
                info($productExistence['Material']);
            }
        }
        info('foreach Finish');
        DB::beginTransaction();

        try {
            foreach ($productsToUpdate as $product) {
                ModelsProduct::where('id', $product['id'])
                    ->update([
                        'stock' => $product['Stock'],
                    ]);
            }
        } catch (Exception $e) {
            DB::rollBack();
        }

        DB::commit();
    }
    private function getProductStocks(): array
    {
        return $this->httpClient->getStocks();
    }
    private function getProductKeys(): Collection
    {
        return ModelsProduct::select('id', 'item_code')->where('provider', Product::PROMOOPTION_TYPE)->get();
    }
}

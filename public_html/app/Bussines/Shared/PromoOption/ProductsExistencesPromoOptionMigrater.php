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
        $productExistences = $this->getProductStocks();

        $codes = collect($productExistences)->pluck('Material')->toArray();
        $productExistencesNew = [];

        foreach ($productExistences as $item) {
            $productExistencesNew[$item['Material']] = $item;
        }
        array_shift($productExistences);

        DB::beginTransaction();

        try {
            ModelsProduct::select('id', 'item_code')
                ->where('provider', Product::PROMOOPTION_TYPE)
                ->whereIn('item_code', $codes)
                ->chunk(self::CHUNK_LIMIT, function ($products) use (&$productExistencesNew) {
                    $products->each(function ($product) use (&$productExistencesNew) {
                        $product->stock = $productExistencesNew[$product->item_code]['Stock'];
                        $product->save();
                        unset($productExistencesNew[$product->item_code]);
                    });
                });
        } catch (Exception $e) {
            DB::rollBack();
        }
        info('finish');
        DB::commit();
    }
    private function getProductStocks(): array
    {
        return $this->httpClient->getStocks();
    }
}

<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {

        // $categories = Product::select('img', 'parent_code')
        //     // ->limit(100)
        //     ->get();
        // $categories->map(function ($item) {
        //     $item->parent_code = str_replace(" ", "-", $item->parent_code);
        //     return $item;
        // });
        // return view('test_individual', compact('categories'));


        $categories = Product::select(
            'parent_code',
            'img'
            //, DB::raw('count(*) as total')
        )
            // ->groupBy('parent_code')
            // ->orderBy('total', 'ASC')
            // ->limit(100)
            ->get();

        $categories = $categories->groupBy('parent_code');


        $categories = $categories->map(function ($item) {
            $category = $item->first();
            $category->total = $item->count();

            $category->parent_code = str_replace(" ", "-", $category->parent_code);
            $category->image_url = "parent_code/" . $category->parent_code . ".jpg";
            if ($category->total == 1) {
                $category->image_url = $category->img;
            }


            return $category;
        });
//        dd($categories);
        dump($categories->count());
        return view('test', compact('categories'));
    }


    public function showImages()
    {
        $type = 'imagenes';
        $promoOption = $this->getPromoOptionProducts($type);
        return $promoOption;
    }

    private function getPromoOptionProducts(string $type): array
    {

        error_reporting(E_ALL);
        ini_set('display_errors', '1');


        $user = "CHI0208";
        $xapikey = "eeaf988dc5b4e6d3a92095ccd6b7e480";
        $headers = array(
            "user: " . $user,
            "x-api-key: " . $xapikey,
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://www.contenidopromo.com/wsds/mx/$type/");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "demo=1");
        curl_setopt($ch, CURLOPT_SSLVERSION, 32);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 2);
        // curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 2);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);


        $result = curl_exec($ch);

        $errNo = curl_errno($ch);
        $err = curl_error($ch);
        curl_close($ch);


        return json_decode($result, true);
    }
}

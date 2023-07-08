<?php

namespace App\Bussines\Erp\Product\Domain;


interface ProductRepository
{
     public function search(? array $filters = []):ProductResponse;
     public function searchWithChildrens(? array $filters = []):ProductResponse;

}

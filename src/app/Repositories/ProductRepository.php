<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository
{

    public function model()
    {
        return Product::class;
    }

    public function getProductList()
    {
//        return $this->model->with('category')->select()->get();
        return $this->model->with('category');
    }
}

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
        return $this->model->orderBy('id', 'ASC')->with('category')->get();
    }

    public function getProductByCategory($category_id)
    {
        return $this->model->where('category_id', '=', $category_id)->get();
    }

    public function getFavoriteProduct()
    {
        return $this->model->orderBy('id', 'ASC')->where('status', '=', '1')->get();
    }
}

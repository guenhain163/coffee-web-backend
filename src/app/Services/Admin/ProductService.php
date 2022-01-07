<?php

namespace App\Services\Admin;

use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Services\BaseService;

class ProductService extends BaseService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProductList()
    {
//        return Product::all();
        return $this->productRepository->getProductList();
    }
}

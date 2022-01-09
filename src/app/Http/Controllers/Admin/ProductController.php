<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\ProductService;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return view('admin.product.index');
    }

    public function show(DataTables $dataTables)
    {
        return $dataTables->eloquent($this->productService->getProductList())->toJson();
    }
}

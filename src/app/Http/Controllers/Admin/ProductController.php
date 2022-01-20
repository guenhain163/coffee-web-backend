<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\ProductService;
use App\Services\Admin\CategoryService;
use App\Http\Requests\CreateProductRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;

    public function __construct(
        ProductService $productService,
        CategoryService $categoryService
    )
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getCategoryList();
        return view('admin.product.index')->with('categories', $categories);
    }

    public function show(DataTables $dataTables)
    {
        return $dataTables->eloquent($this->productService->getProductList())->toJson();
    }

    public function create(CreateProductRequest $request)
    {
        return $this->productService->create($request);
    }

    public function delete(Request $request)
    {
        return $this->productService->delete($request);
    }

    public function updateStatus(Request $request)
    {
        return $this->productService->updateStatus($request);
    }
}

<?php

namespace App\Services\Admin;

use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Services\BaseService;
use App\Services\FileService;
use Illuminate\Support\Facades\Storage;

class ProductService extends BaseService
{
    protected $productRepository;
    protected $fileService;

    const PATH_PHOTO_PRODUCTS = '/public/image/products';

    public function __construct(
        ProductRepository $productRepository,
        FileService $fileService
    )
    {
        $this->productRepository = $productRepository;
        $this->fileService = $fileService;
    }

    public function getProductList()
    {
        return $this->productRepository->getProductList();
    }

    public function create($data)
    {
        $pathProfileImage = $this->fileService->updateFile($data->file('image'), self::PATH_PHOTO_PRODUCTS);
        $product = $this->productRepository->create([
            'title' => $data->title,
            'link_image' => str_replace('public', '', $pathProfileImage),
            'description' => $data->description,
            'price' => preg_replace('/\D/', '', $data->price),
            'category_id' => $data->category
        ]);
        
        return $product;
    }
}

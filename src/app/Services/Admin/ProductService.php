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
            'reduced_price' => preg_replace('/\D/', '', $data->reduced_price),
            'category_id' => $data->category
        ]);

        $product = $this->productRepository->update([
            'product_code' => str_pad($product->id,8,"0", STR_PAD_LEFT)
        ], $product->id);

        return $product;
    }

    public function delete($data)
    {
        return $this->productRepository->delete($data->id);
    }

    public function updateStatus($data)
    {
        $status = $data['status'] ? Product::STATUS_BLOCKED : Product::STATUS_ACTIVE;
        return $this->productRepository->update(['status' => $status], $data->id);
    }

//    public function update($data)
//    {
//        if($data->file('image')) {
//
//        } else {
//            $product = $this->productRepository->create([
//            'title' => $data->title,
//            'link_image' => str_replace('public', '', $pathProfileImage),
//            'description' => $data->description,
//            'price' => preg_replace('/\D/', '', $data->price),
//            'reduced_price' => preg_replace('/\D/', '', $data->reduced_price),
//            'category_id' => $data->category
//        ]);
//        }
//        $pathProfileImage = $this->fileService->updateFile($data->file('image'), self::PATH_PHOTO_PRODUCTS);
//        $product = $this->productRepository->create([
//            'title' => $data->title,
//            'link_image' => str_replace('public', '', $pathProfileImage),
//            'description' => $data->description,
//            'price' => preg_replace('/\D/', '', $data->price),
//            'reduced_price' => preg_replace('/\D/', '', $data->reduced_price),
//            'category_id' => $data->category
//        ]);
//
//        return $product;
//    }
}

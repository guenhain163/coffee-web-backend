<?php

namespace App\Services\Admin;

use App\Models\Order;
use App\Repositories\OrderRepository;
use App\Services\BaseService;
use Illuminate\Support\Facades\Storage;

class OrderService extends BaseService
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getOrderList()
    {
        return $this->orderRepository->getOrderList();
    }
}

<?php

namespace App\Services\Admin;

use App\Models\Order;
use App\Repositories\OrderRepository;
use App\Repositories\OrderDetailRepository;
use App\Services\BaseService;
use Illuminate\Support\Facades\Storage;

class OrderService extends BaseService
{
    protected $orderRepository;
    protected $orderDetailRepository;

    public function __construct
    (
        OrderRepository $orderRepository,
        OrderDetailRepository $orderDetailRepository
    )
    {
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
    }

    public function getOrderList()
    {
        return $this->orderRepository->getOrderList();
    }

    public function orderDetail($id)
    {
        return $this->orderDetailRepository->getOrderDetail($id);
    }

    public function update($data)
    {
        return $this->orderRepository->update($data, $data['id']);
    }
}

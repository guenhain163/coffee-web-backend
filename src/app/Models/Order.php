<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders_detail';

    protected $fillable = [
        'order_code',
        'staff_id',
        'customer_id',
        'discount',
        'total_price',
        'customer_paid',
        'refunds',
        'order_date',
        'note',
    ];

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'id');
    }
}

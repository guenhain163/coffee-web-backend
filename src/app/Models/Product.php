<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public const STATUS_BLOCKED = 0;
    public const STATUS_ACTIVE = 1;

    protected $fillable = [
        'title',
        'link_image',
        'description',
        'price',
        'category_id',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id');
    }
}

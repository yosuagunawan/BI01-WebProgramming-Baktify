<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $guarded = ['id'];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function product_type()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }
}

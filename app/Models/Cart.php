<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsto(User::class, 'user_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

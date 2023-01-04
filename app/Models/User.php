<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;

    protected $guarded = ['id'];

    public function user_role()
    {
        return $this->belongsTo(UserRole::class, 'user_role_id');
    }

    public function cart()
    {
        return $this->hasmany(Cart::class, 'cart_id');
    }
}

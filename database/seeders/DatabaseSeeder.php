<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        UserRole::create([
            'role_name' => 'normal'
        ]);

        UserRole::create([
            'role_name' => 'admin'
        ]);

        User::factory(10)->create();

        ProductType::create([
            'type_name' => 'Country'
        ]);

        ProductType::create([
            'type_name' => 'Dubstep'
        ]);

        ProductType::create([
            'type_name' => 'Electro'
        ]);

        Product::create([
            'product_type_id' => 1,
            'name' => 'Haewon',
            'price' => 100_000,
            'description' => 'Haewon From NMIXX',
            'quantity' => 5,
            'product_image' => 'Haewon.png'
        ]);

        Product::create([
            'product_type_id' => 2,
            'name' => 'Heejin',
            'price' => 110_000,
            'description' => 'Heejin From Loona',
            'quantity' => 15,
            'product_image' => 'Heejin.jpg'
        ]);

        Product::create([
            'product_type_id' => 3,
            'name' => 'Momo',
            'price' => 120_000,
            'description' => 'Momo From Twice',
            'quantity' => 20,
            'product_image' => 'Momo.jpg'
        ]);

        Product::create([
            'product_type_id' => 2,
            'name' => 'Hyemu',
            'price' => 130_000,
            'description' => 'Hyemu From Izone',
            'quantity' => 10,
            'product_image' => 'Hyemu.jpg'

        ]);

        Product::create([
            'product_type_id' => 3,
            'name' => 'Karina',
            'price' => 140_000,
            'description' => 'Karina From Aespa',
            'quantity' => 10,
            'product_image' => 'Karina.jpg'

        ]);
    }
}

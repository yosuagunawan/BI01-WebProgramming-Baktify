<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return [
            [
                'type_name' => 'Mac'
            ],
            [
                'type_name' => 'IPhone'
            ],
            [
                'type_name' => 'IPad'
            ]
        ];
    }
}

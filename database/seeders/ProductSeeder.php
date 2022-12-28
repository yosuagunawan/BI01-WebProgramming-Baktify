<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
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
                'product_type_id' => 1,
                'name' => 'MacBook Air M1',
                'price' => 13905300,
                'description' => 'MacBook Air dengan M1 adalah laptop portabel yang mengagumkan — laptop ini gesit dan cepat dengan desain senyap, tanpa kipas, dan layar Retina yang indah. Berkat bentuk yang ramping dan kekuatan baterai sepanjang hari, MacBook Air ini bekerja dengan sangat cepat dan ringan.',
                'screen_size' => '13,3 inci, resolusi 2560 x 1600.',
                'processor' => 'M1',
                'ram' => '8 GB',
                'battery' => '18 hours',
                'storage' => 'SSD 256 GB'
            ],[
                'product_type_id' => 1,
                'name' => 'MacBook Air M1',
                'price' => 18108880,
                'description' => 'MacBook Air dengan M2 adalah MacBook Air M1 yang dirancang ulang dengan chip M2 generasi berikutnya, MacBook Air luar biasa tipis serta menghadirkan kecepatan dan efisiensi daya yang istimewa dalam casing aluminium sepenuhnya yang tahan lama. Inilah laptop ultra cepat dan ultra andal yang memungkinkan Anda bekerja, bermain, berkarya, atau apa saja, di mana saja.',
                'screen_size' => '13,3 inci, resolusi 2560 x 1600.',
                'processor' => 'M2',
                'ram' => '8 GB',
                'battery' => '18 jam',
                'storage' => 'SSD 512 GB'
            ],[
                'product_type_id' => 1,
                'name' => 'MacBook Pro 13"',
                'price' => 23799000,
                'description' => 'Chip M2 baru menjadikan MacBook Pro 13 inci semakin andal. Desain ringkas yang sama mendukung kekuatan baterai hingga 20 jam1 dan sistem pendingin aktif untuk mempertahankan kinerja yang ditingkatkan. Dilengkapi layar Retina cemerlang, kamera FaceTime HD, dan mikrofon kualitas studio, inilah laptop pro kami yang paling portabel.',
                'screen_size' => '13,3 inci, resolusi 2560 x 1600.',
                'processor' => 'M2',
                'ram' => '8 GB',
                'battery' => '20 jam',
                'storage' => 'SSD 512 GB'
            ],[
                'product_type_id' => 1,
                'name' => 'iMac 24"',
                'price' => 20073000,
                'description' => 'Sambut iMac baru. Terinspirasi oleh yang terbaik dari Apple. Ditransformasi oleh chip M1. Mengagumkan di ruang apa pun. Menyatu sempurna dalam hidup Anda.',
                'screen_size' => '24 inci, resolusi 4480 x 2520.',
                'processor' => 'M1',
                'ram' => '8 GB',
                'battery' => '20 jam',
                'storage' => 'SSD 256 GB'
           ]
        ];
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('cart_id');
            $table->foreignId('product_type_id');
            $table->string('name')->unique();
            $table->double('price');
            $table->text('description');
            $table->string('screen_size');
            $table->string('processor');
            $table->string('ram');
            $table->string('battery');
            $table->string('storage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};

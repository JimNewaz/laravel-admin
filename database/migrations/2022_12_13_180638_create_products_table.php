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
            $table->string('product_name');
            $table->string('slug');
            $table->text('summary');
            $table->text('description');
            $table->string('product_image');
            $table->string('category_id');
            $table->string('category');
            $table->string('sub_category_id');
            $table->string('sub_category');
            $table->string('sku');
            $table->integer('item_in_stock');
            $table->integer('regular_price');
            $table->integer('selling_price');
            $table->string('brand');
            $table->string('tags');
            $table->string('size');
            $table->string('color');
            $table->string('status')->default('active');            
            $table->timestamps();
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

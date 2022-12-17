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
        Schema::create('product_campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('campaign_product');
            $table->integer('original_price');
            $table->integer('campaign_price');
            $table->integer('total_quantity');
            $table->integer('sell_quantity');
            $table->string('status')->default('active');
            $table->string('start_date');
            $table->string('end_date');
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
        Schema::dropIfExists('product_campaigns');
    }
};

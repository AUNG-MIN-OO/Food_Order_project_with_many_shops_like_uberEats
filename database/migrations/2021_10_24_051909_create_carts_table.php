<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('item_id');
            $table->string('item_name');
            $table->string('customer_id');
            $table->string('item_price');
            $table->string('quantity');
            $table->text('item_image');
            $table->text('shop_id');
            $table->tinyInteger('order_status')->default(1)->comment("0=>canceled,1=confirmed");
            $table->date('delivery_time')->nullable();
            $table->string('promotion_status')->nullable();
            $table->string('deliveryMan_id')->nullable();
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
        Schema::dropIfExists('carts');
    }
}

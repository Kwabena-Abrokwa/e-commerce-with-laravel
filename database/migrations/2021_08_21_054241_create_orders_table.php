<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer("order_Id")->unique();
            $table->integer('users_id');
            $table->integer('product_id');
            $table->string("merchant_user_id");
            $table->integer('quantity');
            $table->string('color');
            $table->decimal('subtotal', 10, 2);
            $table->integer('couponId')->nullable();
            $table->integer('checkoutId')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('orders');
    }
}

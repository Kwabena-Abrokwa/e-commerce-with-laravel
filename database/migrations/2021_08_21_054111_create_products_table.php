<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string("product_Id")->unique();
            $table->string("merchant_user_id");
            $table->string('name');
            $table->string('category');
            $table->string('type');
            $table->mediumText('description');
            $table->string('image1');
            $table->string('color1');
            $table->integer('quantity1_sm');
            $table->integer('quantity1_md');
            $table->integer('quantity1_lg');
            $table->integer('quantity1_xl');
            $table->integer('quantity1_xxl');
            $table->string('image2');
            $table->string('color2');
            $table->integer('quantity2_sm');
            $table->integer('quantity2_md');
            $table->integer('quantity2_lg');
            $table->integer('quantity2_xl');
            $table->integer('quantity2_xxl');
            $table->string('image3');
            $table->string('color3');
            $table->integer('quantity3_sm');
            $table->integer('quantity3_md');
            $table->integer('quantity3_lg');
            $table->integer('quantity3_xl');
            $table->integer('quantity3_xxl');
            $table->decimal('scrap_price', 10, 2)->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('total_quantity');
            $table->timestamps();
            $table->softDeletes();
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
}

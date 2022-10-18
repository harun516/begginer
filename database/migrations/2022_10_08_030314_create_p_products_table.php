<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_products', function (Blueprint $table) {
            $table->string('product_id');
            $table->string('product_name');
            $table->string('price_purchase');
            $table->string('price_selling');
            $table->string('stock');
            $table->string('supplier_id');
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
        Schema::dropIfExists('p_products');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCReturnPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_return_purchases', function (Blueprint $table) {
            $table->string('return_puchase_id');
            $table->string('date');
            $table->string('user_id');
            $table->string('area_id');
            $table->string('product_id');
            $table->string('stock');
            $table->string('total');
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
        Schema::dropIfExists('c_return_purchases');
    }
}

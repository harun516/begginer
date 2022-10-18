<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePStockoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_stockouts', function (Blueprint $table) {
            $table->string('stock_id');
            $table->string('date');
            $table->string('user_id');
            $table->string('area_id');
            $table->string('product_id');
            $table->string('status');
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
        Schema::dropIfExists('p_stockouts');
    }
}

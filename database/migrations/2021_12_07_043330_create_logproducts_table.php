<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logproducts', function (Blueprint $table) {
            $table->id();
            $table->string('action');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('quantity');
            $table->string('keterangan');
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
        Schema::dropIfExists('logproducts');
    }
}

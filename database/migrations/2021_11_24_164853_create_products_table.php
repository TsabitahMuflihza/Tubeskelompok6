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
            $table->string('name');
            $table->string('price');
            $table->string('stock');
            $table->foreignId('brand_id')->references('id')->on('brands');
            $table->foreignId('categori_id')->references('id')->on('categoris');
            $table->foreignId('supplier_id')->references('id')->on('suppliers');
            $table->string('info');
            $table->string('image');
            $table->string('discount');
            $table->string('sold');
            $table->string('active');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
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

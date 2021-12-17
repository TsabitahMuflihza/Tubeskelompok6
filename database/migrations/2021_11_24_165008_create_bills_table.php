<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamp('date');
            $table->string('total');
            $table->string('payment_status'); // 0 : belum bayar, 1 : lunas, 2: dibatalkan
            $table->string('shipping_cost');
            $table->string('shipping_company');
            $table->string('product_status'); // 0 : proses , 1 : dikirim , 2 : selesai, 3: dibatalkan
            $table->string('address'); // 0 : proses , 1 : dikirim , 2 : selesai, 3: dibatalkan
            $table->string('customer_note'); // 0 : proses , 1 : dikirim , 2 : selesai, 3: dibatalkan
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cashier_id');
            $table->unsignedBigInteger('customer_id');
            $table->integer('price_total');
            $table->integer('discount');
            $table->integer('point')->default(0);
            $table->integer('total');
            $table->string('type');
            $table->string('payment_method');
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
        Schema::dropIfExists('invoices');
    }
}

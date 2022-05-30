<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_events', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('discount');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('phone_number');
            $table->text('messages');
            $table->string('url');
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
        Schema::dropIfExists('discount_events');
    }
}

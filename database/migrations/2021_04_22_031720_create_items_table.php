<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->string('code')->nullable();
            $table->unsignedBigInteger('qr_id')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('grade_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('size')->nullable();
            $table->string('colour')->nullable();
            $table->integer('price')->nullable();
            $table->integer('reseller_price')->nullable();
            $table->string('remark')->nullable();
            $table->integer('is_sold')->nullable()->default(0);
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
        Schema::dropIfExists('items');
    }
}

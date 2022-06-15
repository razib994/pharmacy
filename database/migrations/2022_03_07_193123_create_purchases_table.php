<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->integer('manufacturer_id');
            $table->integer('category_id');
            $table->integer('type_id');
            $table->date('purchase_date');
            $table->integer('invoice_no');
            $table->integer('medicine_id');
            $table->date('expire_date');
            $table->integer('quantity');
            $table->integer('total_quantity');
            $table->float('total_purchase_price');
            $table->float('total_price');
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
        Schema::dropIfExists('purchases');
    }
};

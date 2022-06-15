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
        Schema::create('pos_invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_no');
            $table->integer('customer_id');
            $table->string('sale_date');
            $table->string('medicine_name');
            $table->integer('category_id');
            $table->integer('quantity');
            $table->float('total_price');
            $table->float('subtotal');
            $table->float('paid_amount');
            $table->float('due_amount');
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
        Schema::dropIfExists('pos_invoices');
    }
};

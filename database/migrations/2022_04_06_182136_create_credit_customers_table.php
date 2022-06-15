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
        Schema::create('credit_customers', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_no');
            $table->integer('customer_id');
            $table->float('total_amount');
            $table->float('paid_amount');
            $table->float('due_amount');
            $table->string('sale_date');
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
        Schema::dropIfExists('credit_customers');
    }
};

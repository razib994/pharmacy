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
        Schema::table('pos_invoices', function (Blueprint $table) {
           $table->float('purchase_unit_price')->after('quantity');
           $table->float('sale_unit_price')->after('purchase_unit_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pos_invoices', function (Blueprint $table) {
            $table->dropColumn('purchase_unit_price');
            $table->dropColumn('sale_unit_price');
        });
    }
};

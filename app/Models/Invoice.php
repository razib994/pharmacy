<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Invoice extends Model
{
    use HasFactory;

     public function manufacturer(){
    	return $this->belongsTo(Manufacturer::class);
    }
    public static function getManufaturerPayble() {
        $records = DB::table('invoices')
            ->join('manufacturers','manufacturers.id','=','invoices.manufacturer_id')
            ->select( 'manufacturers.name',
            'purchase_date',
            'invoice_no',
            'subtotal',
            'paid_amount',
            'due_amount')->get()->toArray();
        return $records;
    }

    public static function getPurchaseList() {
        $records = DB::table('invoices')
            ->join('manufacturers','manufacturers.id','=','invoices.manufacturer_id')
            ->select( 'invoice_no', 'manufacturers.name',
                'purchase_date',
                'subtotal')
                ->get()->toArray();
        return $records;
    }

    public static function getallInvoices() {
        $records = DB::table('sale_invoices')
            ->join('customers','customers.id','=','sale_invoices.customer_id')
            ->select('invoice_no','customers.name','sale_date','total_amount')
            ->get()->toArray();
        return $records;
    }
    // public function all_invoice_data(){
    // 	return $this->belongsTo(Purchase::class);
    // }

}

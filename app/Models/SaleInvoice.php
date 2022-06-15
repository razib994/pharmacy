<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SaleInvoice extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_no','customer_id','sale_date','subtotal','discount','total_amount','paid_amount','due_amount'];

     public function customer(){
    	return $this->belongsTo(Customer::class);
    }

    public static function getSaleInvoices() {
        $records = DB::table('sale_invoices')
            ->join('customers', 'customers.id', '=', 'sale_invoices.customer_id')
            ->select('invoice_no','customers.name','sale_date','subtotal','discount','total_amount','paid_amount','due_amount')->get()->toArray();
        return $records;
    }
    public static function getDailySales() {
        $records = DB::table('sale_invoices')->select('invoice_no','sale_date','total_amount')->whereDay('sale_date',date('d'))->orderBy('id', 'asc')->get()->toArray();
        return $records;
    }
    public static function getMonthlySales() {
        $records = DB::table('sale_invoices')->select('invoice_no','sale_date','total_amount')->whereMonth('sale_date',date('m'))->orderBy('id', 'asc')->get()->toArray();
        return $records;
    }
    public static function getYealySales() {
        $records = DB::table('sale_invoices')->select('invoice_no','sale_date','total_amount')->whereYear('sale_date', '=', Carbon::now()->year)->orderBy('id', 'asc')->get()->toArray();
        return $records;
    }
    public static function getPreviousSales() {
        $records = DB::table('sale_invoices')->select('invoice_no','sale_date','total_amount')->whereYear('sale_date',Carbon::now()->year-1)->orderBy('id', 'asc')->get()->toArray();
        return $records;
    }

    public static function getProfitLossMonthly() {
        $records = DB::table('sale_invoices')->select('invoice_no','sale_date','total_amount')->whereYear('sale_date',Carbon::now()->year-1)->orderBy('id', 'asc')->get()->toArray();
        return $records;
    }

    public static function getProfitLossYearly() {
        $records = DB::table('sale_invoices')->select('invoice_no','sale_date','total_amount')->whereYear('sale_date',Carbon::now()->year-1)->orderBy('id', 'asc')->get()->toArray();
        return $records;
    }

    public static function getProfitLossPrevious() {
        $records = DB::table('sale_invoices')->select('invoice_no','sale_date','total_amount')->whereYear('sale_date',Carbon::now()->year-1)->orderBy('id', 'asc')->get()->toArray();
        return $records;
    }
}

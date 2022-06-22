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
        $records = DB::table('sale_invoices')->select('invoice_no','sale_date','paid_amount')->whereDay('sale_date',date('d'))->orderBy('id', 'asc')->get()->toArray();
        return $records;
    }
    public static function getMonthlySales() {
        $records = DB::table('sale_invoices')->select('invoice_no','sale_date','paid_amount')->whereMonth('sale_date',date('m'))->orderBy('id', 'asc')->get()->toArray();
        return $records;
    }
    public static function getYealySales() {
        $records = DB::table('sale_invoices')->select('invoice_no','sale_date','paid_amount')->whereYear('sale_date', '=', Carbon::now()->year)->orderBy('id', 'asc')->get()->toArray();
        return $records;
    }
    public static function getPreviousSales() {
        $records = DB::table('sale_invoices')->select('invoice_no','sale_date','paid_amount')->whereYear('sale_date',Carbon::now()->year-1)->orderBy('id', 'asc')->get()->toArray();
        return $records;
    }

    public static function getProfitLossMonthly() {
        $total_purchase_price = SaleRevenue::whereMonth('sale_date',date('m'))->sum('total_purchase_price');
        $total_sale_price = SaleRevenue::whereMonth('sale_date',date('m'))->sum('total_sale_price');
        $revenue = $total_sale_price - $total_purchase_price;
        $current_month_expense = Expense::whereMonth('date',date('m'))->sum('amount');
        $profit_loss = $revenue-$current_month_expense;
        $t = $profit_loss;
        $records =  [
            'month_name'    => date('F'),
            'amount'        => $t,
            ];
        $data = array((object)$records);
        return $data;
    }

    public static function getProfitLossYearly() {
        $total_purchase_price = SaleRevenue::whereYear('sale_date',Carbon::now()->year)->sum('total_purchase_price');
        $total_sale_price = SaleRevenue::whereYear('sale_date',Carbon::now()->year)->sum('total_sale_price');
        $revenue = $total_sale_price - $total_purchase_price;
        $current_year_expense = Expense::whereYear('date',Carbon::now()->year)->sum('amount');
        $profit_loss = $revenue-$current_year_expense;
        $t = $profit_loss;
        $records =  [
            'year_name'    => Carbon::now()->year,
            'amount'        => $t,
        ];
        $data = array((object)$records);
        return $data;
    }

    public static function getProfitLossPrevious() {
        $total_purchase_price = SaleRevenue::whereYear('sale_date',Carbon::now()->year-1)->sum('total_purchase_price');
        $total_sale_price = SaleRevenue::whereYear('sale_date',Carbon::now()->year-1)->sum('total_sale_price');
        $revenue = $total_sale_price - $total_purchase_price;
        $current_year_expense = Expense::whereYear('date',Carbon::now()->year-1)->sum('amount');
        $profit_loss = $revenue-$current_year_expense;
        $t = $profit_loss;
        $records =  [
            'previous_month_name'    => Carbon::now()->year-1,
            'amount'                 => $t,
        ];
        $data = array((object)$records);
        return $data;
    }
}

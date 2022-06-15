<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SaleRevenue extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_no','sale_date','total_purchase_price','total_sale_price','discount'];

    public static function getData() {
        $records = DB::table('sale_revenues')->select("id", "invoice_no","sale_date","total_purchase_price","total_sale_price","discount")->orderBy('id', 'asc')->get()->toArray();
        return $records;
    }

    public static function getDailySalesRevenue() {
        $records = DB::table('sale_revenues')->select('invoice_no','sale_date','total_purchase_price')->whereDay('sale_date',date('d'))->orderBy('id', 'asc')->get()->toArray();
        return $records;
    }
    public static function getMonthlySalesRevenue() {
        $records = DB::table('sale_revenues')->select('invoice_no','sale_date','total_purchase_price')->whereMonth('sale_date',date('m'))->orderBy('id', 'asc')->get()->toArray();
        return $records;
    }
    public static function getYealySalesRevenue() {
        $records = DB::table('sale_revenues')->select('invoice_no','sale_date','total_purchase_price')->whereYear('sale_date', '=', Carbon::now()->year)->orderBy('id', 'asc')->get()->toArray();
        return $records;
    }
    public static function getPreviousSalesRevenue() {
        $records = DB::table('sale_revenues')->select('invoice_no','sale_date','total_purchase_price')->whereYear('sale_date',Carbon::now()->year-1)->orderBy('id', 'asc')->get()->toArray();
        return $records;
    }

}

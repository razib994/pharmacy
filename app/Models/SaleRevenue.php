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
        $records = DB::table('sale_revenues')->select('invoice_no','sale_date')->distinct()->whereDay('sale_date',date('d'))->get();
        $mappedcollection = $records->map(function($record, $key) {

            $total_sale_price = SaleRevenue::where('invoice_no',$record->invoice_no)->sum('total_sale_price');
            $total_purchase_price = SaleRevenue::where('invoice_no',$record->invoice_no)->sum('total_purchase_price');
            $total = $total_sale_price-$total_purchase_price;

            return [
                'invoice_no'    => $record->invoice_no,
                'sale_date'     => $record->sale_date,
                'total'     =>$total,
            ];
        });
        return $mappedcollection;
    }
    public static function getMonthlySalesRevenue() {
        $records = DB::table('sale_revenues')->select('invoice_no','sale_date')->distinct()->whereMonth('sale_date',date('m'))->get();
        $mappedcollection = $records->map(function($record, $key) {

            $total_sale_price = SaleRevenue::where('invoice_no',$record->invoice_no)->sum('total_sale_price');
            $total_purchase_price = SaleRevenue::where('invoice_no',$record->invoice_no)->sum('total_purchase_price');
            $total = $total_sale_price-$total_purchase_price;

            return [
                'invoice_no'    => $record->invoice_no,
                'out_stock'     =>$total,
                'total'         => $record->sale_date,
            ];
        });
        return $mappedcollection;

    }
    public static function getYealySalesRevenue() {
        $records = DB::table('sale_revenues')->select('invoice_no','sale_date')->distinct()->whereYear('sale_date', '=', Carbon::now()->year)->get();
        $mappedcollection = $records->map(function($record, $key) {

            $total_sale_price = SaleRevenue::where('invoice_no',$record->invoice_no)->sum('total_sale_price');
            $total_purchase_price = SaleRevenue::where('invoice_no',$record->invoice_no)->sum('total_purchase_price');
            $total = $total_sale_price-$total_purchase_price;

            return [
                'invoice_no' => $record->invoice_no,
                'total' =>$total,
                'sale_date' => $record->sale_date,
            ];
        });
        return $mappedcollection;
    }

    public static function getPreviousSalesRevenue() {
        $records = DB::table('sale_revenues')->select('invoice_no','sale_date','total_purchase_price')->whereYear('sale_date',Carbon::now()->year-1)->orderBy('id', 'asc')->get()->toArray();
        return $records;
    }

}

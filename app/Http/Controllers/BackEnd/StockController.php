<?php

namespace App\Http\Controllers\BackEnd;

use App\Exports\SaleRevenueExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\SaleQuantity;
use App\Models\SaleRevenue;
use App\Models\PosInvoice;
use App\Models\SaleInvoice;
use App\Models\CreditPaymentHistory;
use DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Excel;

class StockController extends Controller
{
    public function index(){
        $data['stock'] = Stock::select('category_id','medicine_name')
                       ->selectRaw('sum(box_quantity) as sum, sum(in_quantity) as sum1')
                       ->groupBy('category_id','medicine_name')
                       ->get();




        // $data['out_stock'] = SaleQuantity::select('category_id','medicine_name')
        //                ->selectRaw('sum(quantity) as sum2')
        //                ->groupBy('category_id','medicine_name')
        //                ->get();
    	return view('back-end.pos.stock',$data);
    }

    public function revenue_list(){
      // $data['revenues'] = SaleRevenue::orderBy('id','desc')->get();
       $data['revenues'] = SaleRevenue::select('invoice_no','sale_date')
                       ->selectRaw('sum(total_purchase_price) as sum1, sum(total_sale_price) as sum2')
                       ->groupBy('invoice_no','sale_date')
                        ->whereDay('sale_date',date('d'))
                       ->get();

       return view('back-end.report.revenue',$data);
    }

    public function monthly_sales_revenue(){
       $data['revenues'] = SaleRevenue::select('invoice_no','sale_date')
                       ->selectRaw('sum(total_purchase_price) as sum1, sum(total_sale_price) as sum2')
                       ->groupBy('invoice_no','sale_date')
                       ->whereMonth('sale_date',date('m'))
                       ->get();

      // $data['revenues'] = SaleRevenue::whereMonth('sale_date',date('m'))->get();
       return view('back-end.report.monthly-sales-revenue',$data);
    }
     //yearly sales revenue
     public function yearly_sales_revenue(){
      $data['revenues'] = SaleRevenue::select('invoice_no','sale_date')
                       ->selectRaw('sum(total_purchase_price) as sum1, sum(total_sale_price) as sum2')
                       ->groupBy('invoice_no','sale_date')
                       ->whereYear('sale_date', '=', Carbon::now()->year)
                       ->get();
      return view('back-end.report.yearly-sales-revenue',$data);
    }
     //previous year sales revenue
     public function previous_year_sales_revenue(){
      $data['revenues'] = SaleRevenue::select('invoice_no','sale_date')
                       ->selectRaw('sum(total_purchase_price) as sum1, sum(total_sale_price) as sum2')
                       ->groupBy('invoice_no','sale_date')
                       ->whereYear('sale_date', '=', Carbon::now()->year-1)
                       ->get();
      return view('back-end.report.previous_year_sales_revenue',$data);
    }

     //daily sales
     public function daily_sales(){
       $data['daily'] = SaleInvoice::whereDay('sale_date',date('d'))->get();
       $data['credit_payment'] = CreditPaymentHistory::whereDay('payment_date',date('d'))->sum('todays_payment');
      return view('back-end.report.daily-sales-report',$data);
    }

     //monthly sales
     public function monthly_sales(){
       $data['monthly'] = SaleInvoice::whereMonth('sale_date',date('m'))->get();
       $data['credit_payment'] = CreditPaymentHistory::whereDay('payment_date',date('d'))->sum('todays_payment');
      return view('back-end.report.monthly-sales-report',$data);
    }

     //yearly sales
     public function yearly_sales(){
       $data['yearly'] = SaleInvoice::whereYear('sale_date', '=', Carbon::now()->year)->get();
       $data['credit_payment'] = CreditPaymentHistory::whereDay('payment_date',date('d'))->sum('todays_payment');
      return view('back-end.report.yearly-sales-report',$data);
    }

     //yearly sales
     public function previous_year_sales(){
       $data['previous_year_sales'] = SaleInvoice::whereYear('sale_date',Carbon::now()->year-1)->get();
       $data['credit_payment'] = CreditPaymentHistory::whereDay('payment_date',date('d'))->sum('todays_payment');
      return view('back-end.report.previous-year-sales',$data);
    }

    public function monthly_profit_loss(){
       return view('back-end.report.monthly_profit_loss');
    }

    public function yearly_profit_loss(){
       return view('back-end.report.yearly_profit_loss');
    }
    public function previous_year_profit_loss(){
       return view('back-end.report.previous_year_profit_loss');
    }
    public function export()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new SaleRevenueExport(), 'saleRevenue.xlsx');

    }



}

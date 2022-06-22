<?php

namespace App\Http\Controllers\BackEnd;

use App\Exports\CreditPaymentExport;
use App\Exports\CreditPaymentHistoryExport;
use App\Exports\DailySalesRevenueExport;
use App\Exports\ExpenseExport;
use App\Exports\ExpenseMonthlyExport;
use App\Exports\ExpensePreviousExport;
use App\Exports\ExpenseYearlyExport;
use App\Exports\InvoicesListExport;
use App\Exports\ManufacturerExport;
use App\Exports\ManufacturerPaymentHistoryExport;
use App\Exports\MedicineExport;
use App\Exports\MonthlySalesExport;
use App\Exports\MonthlySalesRevenueExport;
use App\Exports\PayableManufacturerExport;
use App\Exports\PreviousSalesExport;
use App\Exports\PreviousSalesRevenueExport;
use App\Exports\ProfitLossMonthlyExport;
use App\Exports\ProfitLossPreviousExport;
use App\Exports\ProfitLossYearlyExport;
use App\Exports\PurchaseExport;
use App\Exports\PurchaseInvoiceListExport;
use App\Exports\ReturnPurchesListExport;
use App\Exports\SaleInvoiceExport;
use App\Exports\SalesReturnListExport;
use App\Exports\StockExport;
use App\Exports\YealySalesExport;
use App\Exports\YealySalesRevenueExport;
use App\Http\Controllers\Controller;
use App\Models\Manufacturer;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Medicine;
use App\Models\Category;
use App\Models\PosInvoice;
use App\Models\SaleQuantity;
use App\Models\SaleRevenue;
use App\Models\SaleInvoice;
use App\Models\CreditCustomer;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class PosController extends Controller
{

    public function index(){
      $data['invoice_list'] =SaleInvoice::all();
      return view('back-end.pos.pos-list',$data);
    }

    public function add(){
    	$data['customers'] = Customer::all();
    	$data['medicine'] = Medicine::all();
    	$data['category'] = Category::all();
      $invoice_data = PosInvoice::orderBy('id','desc')->first();
      if($invoice_data==null){
          $firstReg = '0';
          $data['invoice_no'] = $firstReg+1;
      }else{
         $invoice_data = PosInvoice::orderBy('id','desc')->first()->invoice_no;
         $data['invoice_no'] = $invoice_data+1;
      }
    	return view('back-end.pos.add-pos',$data);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'customer_id' => 'required',
        ]);

       $count_medicine = count($request->medicine_name);
        for($i=0; $i<$count_medicine; $i++){
          if(array($request->available_stock) > array($request->quantity)) {
              $pos_invoice = new PosInvoice();
              $pos_invoice->invoice_no = $request->invoice_no;
              $pos_invoice->customer_id = $request->customer_id;
              $pos_invoice->sale_date = $request->sale_date;
              $pos_invoice->medicine_name = $request->medicine_name[$i];
              $pos_invoice->category_id = $request->category_id[$i];
              $pos_invoice->quantity = $request->quantity[$i];
              $pos_invoice->purchase_unit_price = $request->purchase_unit_price[$i];
              $pos_invoice->sale_unit_price = $request->sale_unit_price[$i];
              $pos_invoice->total_price = $request->total_price[$i];
              $pos_invoice->subtotal = $request->subtotal;
              $pos_invoice->discount = $request->discount;
              $pos_invoice->total_amount = $request->total_amount;
              $pos_invoice->paid_amount = $request->paid_amount;
              $pos_invoice->due_amount = $request->due_amount;
              $pos_invoice->save();

              $revenue = new SaleRevenue();
              $revenue->invoice_no = $request->invoice_no;
              $revenue->sale_date = $request->sale_date;
              $revenue->total_purchase_price = $request->total_purchase_price[$i];
              $revenue->total_sale_price = $request->total_sale_price[$i];
              $revenue->discount = $request->discount;
              $revenue->save();
          } else {
              return redirect()->back();
          }
        }

      $sale_invoice = new SaleInvoice();
      $sale_invoice->invoice_no = $request->invoice_no;
      $sale_invoice->customer_id = $request->customer_id;
      $sale_invoice->sale_date = $request->sale_date;
      $sale_invoice->subtotal = $request->subtotal;
      $sale_invoice->discount = $request->discount;
      $sale_invoice->total_amount = $request->total_amount;
      $sale_invoice->paid_amount = $request->paid_amount;
      $sale_invoice->due_amount = $request->due_amount;
      $sale_invoice->save();

      $credit_customer = new CreditCustomer();
      $credit_customer->invoice_no = $request->invoice_no;
      $credit_customer->customer_id = $request->customer_id;
      $credit_customer->total_amount = $request->total_amount;
      $credit_customer->paid_amount = $request->paid_amount;
      $credit_customer->due_amount = $request->due_amount;
      $credit_customer->sale_date = $request->sale_date;
      $credit_customer->save();

      return redirect('pos/list');


    }


    public function delete($id){
      $pos_delete = SaleInvoice::find($id);
        $posDeleted = PosInvoice::where('invoice_no', $pos_delete->invoice_no)->get();
        foreach ($posDeleted as $posDelete) {
            $posDelete->delete();
        }
        $posRevenue= SaleRevenue::where('invoice_no', $pos_delete->invoice_no)->get();
        foreach ($posRevenue as $posRevenu) {
            $posRevenu->delete();
        }

        $posCreateCustomers= CreditCustomer::where('invoice_no', $pos_delete->invoice_no)->get();
        foreach ($posCreateCustomers as $posCreateCustomer) {
            $posCreateCustomer->delete();
        }

      $pos_delete->delete();

      return redirect('pos/list');
    }



    public function edit($invoice_no){
      $data['pos_invoices'] = PosInvoice::where('invoice_no',$invoice_no)->get();
      $data['pos_invoices_count'] = PosInvoice::where('invoice_no',$invoice_no)->count();
      $data['sale_invoices'] = SaleInvoice::where('invoice_no',$invoice_no)->first();
        $data['medicine'] = Medicine::all();
        $data['category'] = Category::all();
        $data['type'] = Type::all();
      return view('back-end.pos.edit-pos',$data);
    }

    public function update(Request $request){

      PosInvoice::where('invoice_no',$request->invoice_no)->delete();
      SaleInvoice::where('invoice_no',$request->invoice_no)->delete();
      SaleRevenue::where('invoice_no',$request->invoice_no)->delete();
      CreditCustomer::where('invoice_no',$request->invoice_no)->delete();

      foreach($request['medicine_name'] as $key=>$value){
            $a = PosInvoice::create(
                [
                  "invoice_no"=>$request->invoice_no,
                  "customer_id"=>$request->customer_id,
                  "sale_date"=>date('Y-m-d',strtotime($request->sale_date)),
                  "medicine_name"=>$value,
                  "category_id"=>$request['category_id'][$key],
                  "quantity"=>$request['quantity'][$key],
                  "purchase_unit_price"=>$request['purchase_unit_price'][$key],
                  "total_purchase_price"=>$request['total_purchase_price'][$key],
                  "sale_unit_price"=>$request['sale_unit_price'][$key],
                  "total_price"=>$request['total_price'][$key],
                  "subtotal"=>$request->subtotal,
                  "discount"=>0,
                  "total_amount"=>$request->total_amount,
                  "paid_amount"=>$request->paid_amount,
                  "due_amount"=>$request->due_amount,
                ]
            );

             $b = SaleRevenue::create(
                [
                  "invoice_no"=>$request->invoice_no,
                  "sale_date"=>date('Y-m-d',strtotime($request->sale_date)),
                    "total_purchase_price"=>$request['total_purchase_price'][$key],
                  "total_sale_price"=>$request['total_price'][$key],
                  "discount"=>0,
                ]
            );
             }
        $sale_invoice = new SaleInvoice();
        $sale_invoice->invoice_no = $request->invoice_no;
        $sale_invoice->customer_id = $request->customer_id;
        $sale_invoice->sale_date = $request->sale_date;
        $sale_invoice->subtotal = $request->subtotal;
        $sale_invoice->discount = $request->discount;
        $sale_invoice->total_amount = $request->total_amount;
        $sale_invoice->paid_amount = $request->paid_amount;
        $sale_invoice->due_amount = $request->due_amount;
        $sale_invoice->save();

        $credit_customer = new CreditCustomer();
        $credit_customer->invoice_no = $request->invoice_no;
        $credit_customer->customer_id = $request->customer_id;
        $credit_customer->total_amount = $request->total_amount;
        $credit_customer->paid_amount = $request->paid_amount;
        $credit_customer->due_amount = $request->due_amount;
        $credit_customer->sale_date = $request->sale_date;
        $credit_customer->save();
         return redirect('pos/list');
    }

    public function get_sale_unit_price(Request $request){
       $category_id = $request->category_id;
       $medicine_name = $request->medicine_name;
       $info = DB::table('medicines')
                   ->where('category_id','=',$category_id)
                   ->where('medicine_name','=',$medicine_name)
                   ->get();
        return response()->json($info);
    }

    public function get_purchase_unit_price(Request $request){
       $category_id = $request->category_id;
       $medicine_name = $request->medicine_name;
       $info = DB::table('medicines')
                   ->where('category_id','=',$category_id)
                   ->where('medicine_name','=',$medicine_name)
                   ->get();
        return response()->json($info);
    }
    public function get_available_quantity(Request $request){
       $category_id = $request->category_id;
       $medicine_name = $request->medicine_name;

       $stocks = DB::table('stocks')
                   ->where('category_id','=',$category_id)
                   ->where('medicine_name','=',$medicine_name)
                   ->sum('in_quantity');

       $sale = DB::table('pos_invoices')
                   ->where('category_id','=',$category_id)
                    ->where('medicine_name','=',$medicine_name)
                   ->sum('quantity');



        $available = $stocks-$sale;
        return response()->json(['available'=>$available]);
    }

    public function pos_overview($invoice_no){
      $data['pos_invoice_overviews'] = PosInvoice::where('invoice_no',$invoice_no)->get();
      $data['sale_invoice'] = SaleInvoice::where('invoice_no', $invoice_no)->first();


      return view('back-end.pos.pos-overview',$data);
    }

    public function invoice_print($invoice_no){
      $data['overviews'] = PosInvoice::where('invoice_no',$invoice_no)->get();
      $data['sale_invoice'] = SaleInvoice::where('invoice_no',$invoice_no)->first();
      $pdf = PDF::loadView('back-end.pos.print-invoice',$data)->setOptions(['defaultFont' => 'sans-serif']);
      return $pdf->stream('document.pdf');
    }

    public function credit_customer_excel() {
        return Excel::download(new SaleInvoiceExport(), 'credit_customer.xlsx');
    }

    public function credit_customer_payment_history() {
        return Excel::download(new CreditPaymentHistoryExport(), 'credit_customer_payment_history.xlsx');
    }
    public function manufacturer_excel_downlaod() {
        return Excel::download(new ManufacturerExport(), 'manufacturer.xlsx');
    }
    public function payable_manufacturer_download() {
        return Excel::download(new PayableManufacturerExport(), 'payable_manufacturer.xlsx');
    }
    public function medicine_excel_download() {
        return Excel::download(new MedicineExport(), 'medicine.xlsx');
    }

    public function purchase_return_list_downlaod() {
        return Excel::download(new MedicineExport(), 'purchase_return_list.xlsx');
    }
// Sales
    public function daily_excel_download() {
        return Excel::download(new CreditPaymentExport(), 'daily_sale_excel.xlsx');
    }
    public function monthly_excel_download() {
        return Excel::download(new MonthlySalesExport(), 'monthly_sale_excel.xlsx');
    }
    public function yealy_excel_download() {
        return Excel::download(new YealySalesExport(), 'yearly_sale_excel.xlsx');
    }
    public function previous_excel_download() {
        return Excel::download(new PreviousSalesExport(), 'previous_sale_excel.xlsx');
    }
// Revenue Sales
    public function daily_sale_revenue_excel_download() {
        return Excel::download(new DailySalesRevenueExport(), 'daily_sale_revenue_excel.xlsx');
    }
    public function monthly_sale_revenue_excel_download() {
        return Excel::download(new MonthlySalesRevenueExport(), 'monthly_sale_revenue_excel.xlsx');
    }
    public function yealy_sale_revenue_excel_download() {
        return Excel::download(new YealySalesRevenueExport(), 'yearly_sale_revenue_excel.xlsx');
    }
    public function previous_sale_revenue_excel_download() {
        return Excel::download(new PreviousSalesRevenueExport(), 'previous_sale_revenue_excel.xlsx');
    }

    public function get_expense_excel_download() {
        return Excel::download(new ExpenseExport(), 'expense.xlsx');
    }

    public function get_expense_monthly_excel_download() {
        return Excel::download(new ExpenseMonthlyExport(), 'expensemonthly.xlsx');
    }

    public function get_expense_excel_yearly_download() {
        return Excel::download(new ExpenseYearlyExport(), 'expenseyearly.xlsx');
    }
    public function get_expense_excel_previous_download() {
        return Excel::download(new ExpensePreviousExport(), 'expenseprevious.xlsx');
    }

    public function return_purches_excel() {
        return Excel::download(new ReturnPurchesListExport(), 'returnPurches.xlsx');
    }

    public function sale_return_list_excel() {
        return Excel::download(new SalesReturnListExport(), 'salereturnlist.xlsx');
    }

    public function get_purches_list_excel() {
        return Excel::download(new PurchaseExport(), 'purchaseList.xlsx');
    }

    public function manufacturer_payment_history() {
        return Excel::download(new ManufacturerPaymentHistoryExport(), 'manufacturer_payment_history.xlsx');
    }

    public function get_stock_list_excel() {
        return Excel::download(new StockExport(), 'stock_excel.xlsx');
    }

    public function get_purchase_invoice_list() {
        return Excel::download(new PurchaseInvoiceListExport(), 'purchase_invoice_list_excel.xlsx');
    }
    public function get_all_invoices() {
        return Excel::download(new InvoicesListExport(), 'all_invoices_excel.xlsx');
    }

    public function get_profit_loss_monthly() {
        return Excel::download(new ProfitLossMonthlyExport(), 'profit_loss_monthly.xlsx');
    }

    public function get_profit_loss_yearly() {
        return Excel::download(new ProfitLossYearlyExport(), 'profit_loss_yearly_excel.xlsx');
    }

    public function get_profit_loss_previous() {
        return Excel::download(new ProfitLossPreviousExport(), 'profit_loss_previous_excel.xlsx');
    }

}

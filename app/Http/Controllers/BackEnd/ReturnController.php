<?php

namespace App\Http\Controllers\BackEnd;

use App\Exports\SaleRevenueExport;
use App\Exports\SalesReturnExport;
use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Medicine;
use App\Models\ReturnPurchase;
use App\Models\SalesReturn;
use App\Models\SaleQuantity;
use App\Models\Stock;
use App\Models\SaleReturnSubtotal;
use DB;

class ReturnController extends Controller
{
   public function purchase_return_list(){
   	  $data['return_purchase'] = ReturnPurchase::all();
      return view('back-end.return.purchase-return-list',$data);
   }

   public function add_purchase_return(){
   	 $data['category'] = Category::all();
     $data['medicine'] = Medicine::all();
     return view('back-end.return.add-purchase-return',$data);
   }

   public function store_purchase_return(Request $request){
       $validated = $request->validate([
           'medicine_name.*' => ['required'],
           'category_id.*' => ['required'],

       ]);
   	   foreach($request['medicine_name'] as $key=>$value){

   	   	 ReturnPurchase::create(
   	   	 	[
   	   	 		'medicine_name' => $value,
   	   	 		'category_id'   => $request['category_id'][$key],
   	   	 		'return_date'   => $request['purchase_return_date'][$key],
   	   	 		'amount'        => $request['amount'][$key],
   	   	 		'quantity'      => $request['quantity'][$key],
   	   	 		'total_amount'  => $request['total_amount'][$key],
   	   	    ]
   	   	);
   	   	$info = Stock::where(['category_id'=>$request['category_id'][$key]])
                    ->where(['medicine_name'=>$request['medicine_name'][$key]])
                    ->value('in_quantity');
   	    $res = DB::table('stocks')
                    ->where(['category_id'=>$request['category_id'][$key]])
                    ->where(['medicine_name'=>$request['medicine_name'][$key]])
                    ->update(['in_quantity'=>$info-$request['quantity'][$key]]);
   	   }
   	   return redirect('return/purchase/list');
   }

    public function purchesReturndelete($id){

        $info = ReturnPurchase::find($id);
        $stock = Stock::where('medicine_name',$info->medicine_name)->where('category_id',$info->category_id)->first();
        $stock->in_quantity = $stock->in_quantity + $info->quantity;
        $stock->update();

        $info->delete();
        return redirect('return/purchase/list')->with('message','Delete Successfully');
    }

   public function sales_return_list(){
   	  $data['sales_return'] = SalesReturn::all();
      return view('back-end.return.sales-return-list',$data);
   }

   public function add_sales_return(){
   	 $data['category'] = Category::all();
     $data['medicine'] = Medicine::all();
     $return_data = SaleReturnSubtotal::orderBy('id','desc')->first();
      if($return_data==null){
          $firstReg = '0';
          $data['invoice_no'] = $firstReg+1;
      }else{
         $return_data = SaleReturnSubtotal::orderBy('id','desc')->first()->invoice_no;
         $data['invoice_no'] = $return_data+1;
      }
     return view('back-end.return.add-sales-return',$data);
   }

   public function store_sales_return(Request $request){

       $validated = $request->validate([
           'medicine_name.*' => ['required'],
           'category_id.*' => ['required'],

       ]);

     foreach($request['medicine_name'] as $key=>$value){
   	   	 SalesReturn::create(
   	   	 	[
   	   	 		'medicine_name'=>$value,
   	   	 		'category_id' =>$request['category_id'][$key],
   	   	 		'return_date' =>$request->return_date,
   	   	 		'amount' =>$request['amount'][$key],
   	   	 		'quantity' =>$request['quantity'][$key],
   	   	 		'total_amount' =>$request['total_amount'][$key],
   	   	    ]
   	   	);
   	   	$info = Stock::where(['category_id'=>$request['category_id'][$key]])
                    ->where(['medicine_name'=>$request['medicine_name'][$key]])
                    ->value('in_quantity');
   	    $res = DB::table('stocks')
                    ->where(['category_id'=>$request['category_id'][$key]])
                    ->where(['medicine_name'=>$request['medicine_name'][$key]])
                    ->update(['in_quantity'=>$info+$request['quantity'][$key]]);
   	   }
        SaleReturnSubtotal::create([
           "return_date"    => $request->return_date,
           "subtotal"       => $request->subtotal
        ]);

   	   return redirect('return/sales/list');


   }

    public function salesreutrndelete($id){
        $info = SalesReturn::find($id);
        $stock = Stock::where('medicine_name',$info->medicine_name)->where('category_id',$info->category_id)->first();
        $stock->in_quantity = $stock->in_quantity - $info->quantity;
        $stock->update();
        $info->delete();
        return redirect('return/sales/list')->with('message','Delete Successfully');
    }

    public function saleReturnExport()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new SalesReturnExport(), 'SalesReturn.xlsx');

    }
}

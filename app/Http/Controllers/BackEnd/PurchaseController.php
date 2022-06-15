<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manufacturer;
use App\Models\Type;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\Invoice;
use App\Models\Medicine;
use App\Models\Stock;
use DB;

class PurchaseController extends Controller
{
    public function index(){
        $data['purchases_invoice'] = Invoice::all();
    	return view('back-end.purchase.purchase-invoice-list',$data);
    }
    public function purchase_list(){
        $data['purchase_list'] = Purchase::all();
        return view('back-end.purchase.purchase-list',$data);
    }

    public function add(){
    	$data['manufacturer'] = Manufacturer::all();
        $data['category'] = Category::all();
        $data['medicine'] = Medicine::all();
    	return view('back-end.purchase.add-purchase',$data);
    }

    public function store(Request $request){

        $count_medicine = count($request->medicine_name);
        for($i=0; $i<$count_medicine; $i++){
            $info = new Purchase();
            $info->manufacturer_id = $request->manufacturer_id;
            $info->category_id = $request->category_id[$i];
            $info->type_id = $request->type_id[$i];
            $info->purchase_date = date('Y-m-d',strtotime($request->purchase_date));
            $info->invoice_no = $request->invoice_no;
            $info->medicine_name = $request->medicine_name[$i];
            $info->expire_date = date('Y-m-d',strtotime($request->expire_date[$i]));
            $info->quantity = $request->quantity[$i];
            $info->total_quantity = $request->total_quantity[$i];
            $info->total_purchase_price = $request->total_purchase_price[$i];
            $info->total_price = $request->total_price[$i];
            $info->save();

            $stock = new Stock();
            $stock->manufacturer_id = $request->manufacturer_id;
            $stock->category_id = $request->category_id[$i];
            $stock->invoice_id = $request->invoice_no;
            $stock->box_quantity = $request->quantity[$i];
            $stock->medicine_name = $request->medicine_name[$i];
            $stock->in_quantity = $request->total_quantity[$i];
            $stock->save();
        }

            $invoice = new Invoice();
            $invoice->manufacturer_id = $request->manufacturer_id;
            $invoice->purchase_date =date('Y-m-d',strtotime($request->purchase_date));
            $invoice->invoice_no = $request->invoice_no;
            $invoice->subtotal = $request->subtotal;
            $invoice->paid_amount = $request->paid_amount;
            $invoice->due_amount = $request->due_amount;
            $invoice->save();

      return redirect('purchase/invoice/list');
    }

    public function get_quantity(Request $request){
        $quantity = DB::table('types')->where('id',$request->type_id)->value('quantity');
        return response()->json($quantity);
    }

    public function edit($invoice_no){
       $data['purchases_data'] = Purchase::where('invoice_no',$invoice_no)->get();
       $data['invoices_data'] = Invoice::where('invoice_no',$invoice_no)->first();
       $data['type'] = Type::all();
       return view('back-end.purchase.edit-purchase',$data);
    }

    public function purchase_invoice_delete($invoice_no){
        DB::table("invoices")->where("invoice_no", $invoice_no)->delete();
        DB::table("purchases")->where("invoice_no", $invoice_no)->delete();
        Stock::where("invoice_id", $invoice_no)->delete();
       return redirect('purchase/invoice/list')->with('message','Delete Successfully');
    }

    public function item_wise_purchase_list_delete($id){
        $info = Purchase::find($id);
        $info->delete();
        return redirect('purchase/list')->with('message','Delete Successfully');
    }

    public function purchase_invoice_overview($invoice_no){
        $data['purchase_invoice_overviews'] = Purchase::where('invoice_no',$invoice_no)->get();
        $data['purchase_invoice'] = Invoice::where('invoice_no',$invoice_no)->first();
        return view('back-end.purchase.purchase-invoice-overview',$data);
    }

    public function purchase_invoice_update(Request $request){
       Purchase::where('invoice_no',$request->invoice_no)->delete();
       Stock::where('invoice_id',$request->invoice_no)->delete();

        foreach($request['medicine_name'] as $key=>$value){

            Purchase::create(
                [
                  "manufacturer_id"=>$request->manufacturer_id,
                  "medicine_name"=>$value,
                  "category_id"=>$request['category_id'][$key],
                  "type_id"=>$request['type_id'][$key],
                  "purchase_date"=>date('Y-m-d',strtotime($request->purchase_date)),
                  "invoice_no"=>$request->invoice_no,
                  "expire_date"=> date('Y-m-d',strtotime($request->expire_date[$key])),
                  "quantity"=>$request['quantity'][$key],
                  "total_quantity"=>$request['total_quantity'][$key],
                  "total_purchase_price"=>$request['total_purchase_price'][$key],
                  "total_price"=>$request['total_price'][$key],
                ]
            );

            Stock::create([
                'manufacturer_id'=>$request->manufacturer_id,
                'invoice_id' => $request->invoice_no,
                'category_id'=>$request->category_id[$key],
                'box_quantity'=>$request->quantity[$key],
                'medicine_name'=>$request->medicine_name[$key],
                'in_quantity'=>$request->total_quantity[$key],

            ]);

        }


        $res = DB::table('invoices')
                    ->where('invoice_no',$request->invoice_no)
                    ->update(
                        [
                            'subtotal'=>$request->subtotal,
                            'due_amount'=>$request->due_amount,
                            'paid_amount'=>$request->paid_amount
                        ]);

        return redirect('purchase/invoice/list');
    }

}

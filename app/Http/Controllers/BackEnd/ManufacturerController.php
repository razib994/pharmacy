<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manufacturer;
use App\Models\Purchase;
use App\Models\Invoice;
use App\Models\PaymentHistory;
use DB;

class ManufacturerController extends Controller
{
    public function index(){
        $data['manufacturer'] = Manufacturer::all();
        return view('back-end.manufacturer.all-manufacturer',$data);
    }

     public function add(){
    	return view('back-end.manufacturer.add-manufacturer');
    }

    public function store(Request $request){

          $request->validate([
			  'name'=>'required|string',
			  'phone_no'=>'required|string|min:11|unique:manufacturers',
			  'email'=>'required|string|',
			  'address'=>'required|string',
			]);

        $info = new Manufacturer();
        $info->name = $request->name;
        $info->phone_no = $request->phone_no;
        $info->email = $request->email;
        $info->address = $request->address;
        $info->save();
        // Session::flash('message','Insert Successful');
        return redirect()->back()->with('message','Manufacturer Added Succefully ');
    }

     public function delete($id){
    	$info = Manufacturer::find($id);
    	$info->delete();
       return redirect('manufacturer/list')->with('message','Manufacturer Delete Successfully');
    }

    public function edit($id){
    	$data['info'] = Manufacturer::find($id);
       return view('back-end.manufacturer.edit-manufacturer',$data);
    }


     public function update(Request $request){

          $request->validate([
			  'name'=>'required|string',
			  'phone_no'=>'required|string|min:11',
			  'email'=>'required|string|',
			  'address'=>'required|string',
			]);

        $info =Manufacturer::find($request->id);
        $info->name = $request->name;
        $info->phone_no = $request->phone_no;
        $info->email = $request->email;
        $info->address = $request->address;
        $info->save();
        // Session::flash('message','Insert Successful');
       return redirect('manufacturer/list')->with('update','Manufacturer Update Successfully');
    }

     public function payable_manufacturer(){
        $data['invoice'] = Invoice::where('due_amount','>','0')->get();
        return view('back-end.manufacturer.payable_manufacturer',$data);
    }

     public function payable_manufacturer_edit($id){
        $data['info'] = Invoice::find($id);
        return view('back-end.manufacturer.edit-payable-manufacturer',$data);
    }

      public function update_payable_manufacturer(Request $request){
        $info = Invoice::find($request->invoice_no);
        $due_amount = $request->due_amount;
        $todays_amount = $request->todays_payment;
        $current_due_amount =  $due_amount - $todays_amount;
        $paid_amount = $request->paid_amount;
        $fullPaid =  $paid_amount + $todays_amount;

         PaymentHistory::insert([
            'manufacturer_id' => $request->manufacturer_id,
            'invoice_no' => $request->invoice_no,
            'todays_payment' => $request->todays_payment,
            'payment_date' => $request->payment_date
         ]);

        // if($current_due_amount){
             $res = DB::table('invoices')
                    ->where('invoice_no',$request->invoice_no)
                    ->update(['due_amount'=>$current_due_amount,'paid_amount'=>$fullPaid]);
        // }
        return redirect('manufacturer/payable');
    }

     public function manufacturer_payments_history(){
        $data['payments'] = PaymentHistory::all();
        return view('back-end.manufacturer.manufacturer-payment-history',$data);
    }
     public function manufacturer_payments_delete($id){
        $payments_delete = PaymentHistory::find($id);
        $payments_delete->delete();
        return view('back-end.manufacturer.manufacturer-payment-history');
    }

}

<?php

namespace App\Http\Controllers\BackEnd;
use App\Exports\CustomerExport;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\PosInvoice;
use App\Models\SaleInvoice;
use App\Models\CreditPaymentHistory;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use DB;

class CustomerController extends Controller
{
    public function index(){
    	$data['customers'] = Customer::all();
    	return view('back-end.customer.all-customer',$data);
    }

    public function add(){
    	return view('back-end.customer.add-customer');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name'=>        'required',
            'phone_no'=>    'required|min:11',
            'address'=>     'required',
        ]);
        if($validator->fails()) {
                $return['status'] = 400;
                $return['errors'] = $validator->errors();
                return json_encode($return);
        } else {
            $info = new Customer();
            $info->name = $request->name;
            $info->phone_no = $request->phone_no;
            $info->address = $request->address;
            $info->save();
            $return['status']   = 200;
            $return['success'] = 'Customer is successfully added';
            return json_encode($return);

        }

        // Session::flash('message','Insert Successful');
        //return redirect()->back()->with('message','Customer Added Succefully ');
    }

    public function customerStore(Request $request){

        $validator = Validator::make($request->all(), [
            'name'=>        'required',
            'phone_no'=>    'required|min:11',
            'address'=>     'required',
        ]);

            $info = new Customer();
            $info->name = $request->name;
            $info->phone_no = $request->phone_no;
            $info->address = $request->address;
            $info->save();

        // Session::flash('message','Insert Successful');
        return redirect()->back()->with('message','Customer Added Succefully ');
    }

    public function delete($id){
    	$info = Customer::find($id);
    	$info->delete();
       return redirect('customer/list')->with('message','Customer Delete Successfully');
    }

     public function edit($id){
    	$data['info'] = Customer::find($id);
       return view('back-end.customer.edit-customer',$data);
    }
     public function update(Request $request){
    	$info =Customer::find($request->id);
        $info->name = $request->name;
        $info->phone_no = $request->phone_no;
        $info->address = $request->address;
        $info->save();
        return redirect('customer/list')->with('update','Customer Update Successfully');
    }

    public function credit(){
        $data['credit_customers'] = SaleInvoice::where('due_amount','>','0')->get();

    	return view('back-end.customer.credit-customer',$data);
    }

    public function edit_credit_customer($invoice_no){
        $data['info'] = SaleInvoice::where('invoice_no', $invoice_no)->first();
        return view('back-end.customer.edit-credit-customer',$data);
    }

    public function update_credit_customer(Request $request){
        $info = SaleInvoice::find($request->invoice_no);
        $due_amount = $request->due_amount;
        $todays_amount = $request->todays_payment;
        $current_due_amount =  $due_amount - $todays_amount;
        $paid_amount = $request->paid_amount;
        $fullPaid =  $paid_amount + $todays_amount;

         CreditPaymentHistory::insert([
            'customer_id' => $request->customer_id,
            'invoice_no' => $request->invoice_no,
            'todays_payment' => $request->todays_payment,
            'payment_date' => $request->payment_date
         ]);

             $res = DB::table('sale_invoices')
                    ->where('invoice_no',$request->invoice_no)
                    ->update(['due_amount'=>$current_due_amount,'paid_amount'=>$fullPaid]);

        return redirect('customer/credit');
    }

    public function credit_customer_payment_history(){
        $data['payments'] = CreditPaymentHistory::all();
        return view('back-end.customer.credit-customer-payment-history',$data);
    }

    public function credit_customer_payment_history_delete($id){
        $info = CreditPaymentHistory::find($id);
        $info->delete();
        return redirect('customer/credit/payment/history');
    }

    public function customer_excel(){
        return Excel::download(new CustomerExport(), 'customer-list.xlsx');
}
}

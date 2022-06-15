<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;
use DB;
use Carbon\Carbon;
use Rap2hpoutre\FastExcel\FastExcel;

class ExpenseController extends Controller
{
    public function index(){
    	$data['expenses'] = Expense::all();
    	return view('back-end.expense.expense-list',$data);
    }

     public function add(){
    	return view('back-end.expense.add-expense');
    }

    public function store(Request $request){

       $this->validate($request,[
       	  "name" =>"required",
       	  "details" =>"required",
       	  "amount" =>"required",
       	  "date" =>"required",
       	  "remarks" =>"required"
       ]);

       $info = new Expense();
       $info->name = $request->name;
       $info->details = $request->details;
       $info->amount = $request->amount;
       $info->date = $request->date;
       $info->remarks = $request->remarks;
       $info->save();
       return redirect('expense/all');
    }

    public function delete($id){
    	$info = Expense::find($id);
    	$info->delete();
    	return redirect('expense/all');
    }

    public function edit($id){
    	$info = Expense::find($id);
    	return view('back-end.expense.edit-expense',compact('info',$info));
    }

    public function update(Request $request){
       $info =Expense::find($request->id);
       $info->name = $request->name;
       $info->details = $request->details;
       $info->amount = $request->amount;
       $info->date = $request->date;
       $info->remarks = $request->remarks;
       $info->save();
       return redirect('expense/all');
    }

    public function monthly(){
      // $daily = Expense::select(DB::raw("(COUNT(*)) as count"),DB::raw("MONTHNAME(date) as month_name"))
      //                   ->whereYear('date', date('Y'))
      //                   ->groupBy('month_name')
      //                   ->orderBy('date','asc')
      //                   ->get();
      // return $daily;

      // $daily = Expense::whereMonth('created_at', date('m'))
      //         ->get();
      // return $daily;
      // $daily = Expense::whereDate('created_at', Carbon::today())->get();
      // $today = Carbon::today();
      // $today1 = Carbon::now()->subMonth()->month;
      // $today1 = Carbon::now()->year;
      // $daily = Expense::whereDate('date', Carbon::today())->get();
      // $yearly = Expense::whereYear('date', '=', Carbon::now()->year)->get();
      // $monthly = Expense::whereMonth('date', '=', Carbon::now()->subMonth()->month)->get();
        $monthly = Expense::whereMonth('date',date('m'))->get();
      return view('back-end.expense.monthly-expense-report',compact('monthly',$monthly));
    }

    public function yearly(){
       $yearly = Expense::whereYear('date', '=', Carbon::now()->year)->get();
      return view('back-end.expense.yearly-expense-report',compact('yearly',$yearly));
    }
    
    public function previous_year_expense(){
       $previous_year = Expense::whereYear('date', '=', Carbon::now()->year-1)->get();
      return view('back-end.expense.previous-year-expense',compact('previous_year',$previous_year));
    }

   public function download_excel(){
     $expenses_data = DB::table('expenses')->get()->toArray();
     $expense_array[]=array('name','details','amount','date','remarks');

     foreach($expenses_data as $expense_list){
       $expense_array[] = array(
        "name" =>$expense_list->name,
       "details" =>$expense_list->details,
       "amount" =>$expense_list->amount,
       "date" =>$expense_list->date,
       "remarks" =>$expense_list->remarks,
       );
     }

     Excel::create('Expense List',function($excel) use ($expense_array){
      $excel->sheet('Expense List',function($sheet) use ($expense_array){
        $sheet->fromArray($expense_array,null,'A1',false,false);
      });
     })->download('xlsx');
   }


   // function download_excel()
   //  {
   //   $customer_data = DB::table('expenses')->get()->toArray();
   //   $customer_array[] = array('Name', 'Details', 'Amount', 'Date', 'Remarks');
   //   foreach($customer_data as $customer)
   //   {
   //    $customer_array[] = array(
   //     'Name'  => $customer->name,
   //     'Details'   => $customer->details,
   //     'Amount'    => $customer->amount,
   //     'Date'  => $customer->date,
   //     'Remarks'   => $customer->remarks
   //    );
   //   }
   //   FastExcel::create('Customer Data', function($excel) use ($customer_array){
   //    $excel->setTitle('Customer Data');
   //    $excel->sheet('Customer Data', function($sheet) use ($customer_array){
   //     $sheet->fromArray($customer_array, null, 'A1', false, false);
   //    });
   //   })->download('xlsx');
   //  }

}

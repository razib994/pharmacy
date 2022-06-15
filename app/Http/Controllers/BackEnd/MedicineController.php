<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manufacturer;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Medicine;
use DB;

class MedicineController extends Controller
{
    public function index(){
    	$data['medicines'] = Medicine::all();
    	return view('back-end.medicine.medicine-list',$data);
    }

    public function add(){
    	$data['manufacturer'] = Manufacturer::all();
    	$data['category'] = Category::where('status','1')->get();
    	$data['unit'] = Unit::all();
    	return view('back-end.medicine.add-medicine',$data);
    }

    public function store(Request $request){

    	$request->validate([
			  'manufacturer_id'=>'required',
              'category_id'=>'required',
              'unit_id'=>'required',
              'medicine_name'=>'required',
			  'generic_name'=>'required',
              'purchase_unit_price'=>'required',
              'sale_unit_price'=>'required',
			  'status'=>'required',
			]);

    	$info = new Medicine();
    	$info->manufacturer_id = $request->manufacturer_id ;
        $info->category_id = $request->category_id;
        $info->unit_id = $request->unit_id;
        $info->medicine_name = $request->medicine_name ;
    	$info->generic_name = $request->generic_name ;
        $info->purchase_unit_price = $request->purchase_unit_price ;
        $info->sale_unit_price = $request->sale_unit_price ;
    	$info->status = $request->status ;
    	$info->save();
    	return redirect()->back()->with('message','Medicine Added Succefully ');
       
    }

    public function delete($id){
        $info = Medicine::find($id);
    	$info->delete();
       return redirect('medicine/list')->with('message','Medicine Delete Successfully');
    }

      public function edit($id){
    	$data['info'] = Medicine::find($id);
       return view('back-end.medicine.edit-medicine',$data);
    }


    public function update(Request $request){

    	$request->validate([
			  'manufacturer_id'=>'required',
              'category_id'=>'required',
              'unit_id'=>'required',
              'medicine_name'=>'required',
              'generic_name'=>'required',
              'purchase_unit_price'=>'required',
              'sale_unit_price'=>'required',
              'status'=>'required'
			]);

    	$info = Medicine::find($request->id);
    	$info->manufacturer_id = $request->manufacturer_id ;
        $info->category_id = $request->category_id;
        $info->unit_id = $request->unit_id;
        $info->medicine_name = $request->medicine_name ;
        $info->generic_name = $request->generic_name ;
        $info->purchase_unit_price = $request->purchase_unit_price ;
        $info->sale_unit_price = $request->sale_unit_price ;
        $info->status = $request->status;
    	$info->save();
        return redirect('medicine/list')->with('update','Medicine Update Succefully');
       
    }
    

}

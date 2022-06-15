<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
     public function index(){
    	$data['info'] = Unit::all();
    	return view('back-end.medicine.unit-list',$data);
    }

    public function add(){
    	return view('back-end.medicine.add-unit');
    }

      public function store(Request $request){

          $request->validate([
			  'name'=>'required|string',
			  'status'=>'required',
			]);

        $info = new Unit();
        $info->name = $request->name;
        $info->status = $request->status;
        $info->save();
        return redirect()->back()->with('message','Unit Added Succefully ');
    }

     public function delete($id){
    	$info = Unit::find($id);
    	$info->delete();
       return redirect('unit/list')->with('message','Unit Delete Successfully');
    }

    public function edit($id){
    	$data['info'] = Unit::find($id);
       return view('back-end.medicine.edit-unit',$data);
    }

     public function update(Request $request){

          $request->validate([
			  'name'=>'required|string',
			  'status'=>'required',
			]);

        $info = Unit::find($request->id);
        $info->name = $request->name;
        $info->status = $request->status;
        $info->save();
        return redirect('unit/list')->with('update','Unit Update Succefully ');
    }
}

<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index(){
    	$data['info'] = Type::all();
    	return view('back-end.medicine.type-list',$data);
    }

    public function add(){
    	return view('back-end.medicine.add-type');
    }
    public function store(Request $request){

          $request->validate([
			  'box_curton'=>'required',
			  'quantity'=>'required',
			]);

        $info = new Type();
        $info->box_carton   = $request->box_curton;
        $info->quantity     = $request->quantity;
        $info->save();
        return redirect('type/add')->with('message','Type Added Succefully ');
    }

     public function delete($id){
    	$info = Type::find($id);
    	$info->delete();
       return redirect('type/list')->with('message','Type Delete Successfully');
    }

    public function edit($id){
    	$data['info'] = Type::find($id);
       return view('back-end.medicine.edit-type',$data);
    }

    public function update(Request $request){

         $request->validate([
			  'box_curton'=>'required',
			  'quantity'=>'required',
		]);

        $info = Type::find($request->id);
        $info->box_carton = $request->box_curton;
        $info->quantity = $request->quantity;
        $info->save();
        return redirect('type/list')->with('update','Type Update Succefully ');
    }

}

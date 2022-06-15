<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
    	$data['category'] = Category::all();
    	return view('back-end.medicine.category-list',$data);
    }

    public function add(){
    	return view('back-end.medicine.add-category');
    }

      public function store(Request $request){

      $request->validate([
			  'name'=>'required|string',
			  'status'=>'required',
			]);

        $info = new Category();
        $info->name = $request->name;
        $info->status = $request->status;
        $info->save();
        return redirect()->back()->with('message','Category Added Succefully ');
    }

     public function delete($id){
    	$info = Category::find($id);
    	$info->delete();
       return redirect('category/list')->with('message','Category Delete Successfully');
    }

    public function edit($id){
    	$data['info'] = Category::find($id);
       return view('back-end.medicine.edit-category',$data);
    }

     public function update(Request $request){

          $request->validate([
			  'name'=>'required|string',
			  'status'=>'required',
			]);

        $info = Category::find($request->id);
        $info->name = $request->name;
        $info->status = $request->status;
        $info->save();
        return redirect('category/list')->with('update','Category Update Succefully ');
    }
}

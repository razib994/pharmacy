<?php

namespace App\Http\Controllers\BackEnd;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Excel;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::all();
        return view('back-end.user.all-user',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.user.add-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users',
        ]);

        $info = new User();
        $info->name = $request->name;
        $info->email = $request->email;
        $info->password = Hash::make($request->password);
        $info->is_admin = $request->is_admin;
        $info->save();
        // Session::flash('message','Insert Successful');
        return redirect()->back()->with('message','User Added Successfully ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['info'] = User::find($id);
        return view('back-end.user.edit-user',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $info = User::find($request->id);
        $info->name = $request->name;
        $info->email = $request->email;
        $info->is_admin = $request->is_admin;
        $info->save();
        // Session::flash('message','Insert Successful');
        return redirect()->back()->with('message','User Update Successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $info = User::find($id);
        $info->delete();
        return redirect('all/user')->with('message','User Delete Successfully');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}

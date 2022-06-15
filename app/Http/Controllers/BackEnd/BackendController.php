<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function index(){
    	return view('back-end.home.home');
    }
    public function login(){
    	return view('back-end.login.login');
    }
    public function testing(){
        return view('back-end.login.testing');
    }
}

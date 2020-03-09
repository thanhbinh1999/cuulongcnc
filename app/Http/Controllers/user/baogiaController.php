<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\userModel\baogia;
class baogiaController extends Controller
{
    public function getDetails(){
    	return view('user.baogia',['details' => baogia::all()]);
    }
}

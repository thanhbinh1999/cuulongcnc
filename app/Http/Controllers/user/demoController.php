<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\userModel\product;

class demoController extends Controller
{
    public function index (){
    	return 	$product = product::select('name')->groupBy('name')->get();
    	
    }
}

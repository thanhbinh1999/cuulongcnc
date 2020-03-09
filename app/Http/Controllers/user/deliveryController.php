<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ userModel\province;
use App\userModel\town;
use App\userModel\district;
class deliveryController extends Controller
{
    public function districtChange(Request $request){
    	$district = district::where('provinceID',$request->id)->get();
    	return response()->json(['success'=>$district]);

    }
    public function townChange(Request $request){
    	$town = town::where('districtID', $request->id)->get();
    	return response()->json(['success'=>$town]);
    }
}

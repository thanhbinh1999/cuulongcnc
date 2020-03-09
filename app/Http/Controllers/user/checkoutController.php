<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Cart;
use Illuminate\Http\Request;
use App\ userModel\province;
use App\userModel\town;
use App\userModel\district;

class checkoutController extends Controller
{
    public function viewCheckout(){
    //	
    	$province = province::all();
    	$district = district::where('provinceID',1)->get();
        if(session()->has('user')){
            if(Cart::getcontent()->count() > 0){
                return view('user.checkout',['province' =>$province, 'district' => $district]);

            }else{
                return redirect()->route('index');
            }
        }else{
            return redirect()->route('login');
        }
    }
}

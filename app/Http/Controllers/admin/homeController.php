<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\userModel\admin;
use App\userModel\customer;
use App\userModel\ord;
use App\userModel\product;
class homeController extends Controller
{
    public function getHome(){
    	$lists['customer'] = customer::count();
    	$lists['admin']   =  admin::count();
    	$lists['order']   = ord::where('StatusID', 'pending')->count();
    	$lists['orderSuccess'] = ord::where('StatusID', 'approved')->count();
    	$lists['total']    = ord::sum('total');
    	$lists['product'] = product::count();
    	return  view('admin.home',['listsInfo'=>$lists]);

    }

}

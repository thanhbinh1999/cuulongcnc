<?php

namespace App\Http\Controllers\user;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\usermodel\product;
use App\usermodel\category;
use App\usermodel\menu;
use App\usermodel\slider;
class homeController extends Controller
{
    public function index(){
    	$product = product::leftJoin('menu' , 'menu.categoryID' , '=' , 'product.categoryID')
                    ->select("product.ID","product.categoryID","product.name","product.price","product.avatar","product.SEO","product.amountProduct","product.producttype","menu.page as page")
    				->where('product.StatusID','active')
    				->get();
        $slider = slider::select('img')->where('StatusID','active')->get();
    	return view('user.index',['product'=>$product,'slider' => $slider]);
                   
    }
    public function search(Request $request){
    	if(!empty($request->keyword)){
    		$search = product::leftJoin('menu' , 'menu.categoryID' , '=' , 'product.categoryID')
    							->select('product.name','product.avatar','product.price','product.SEO','menu.page as page')
    							->where('product.name' , 'like', '%'.$request->keyword.'%' )
    							->take(5)
    							->get();
    		if(!empty($search)){
    			return response()->json(['success' => $search]);
    		}
    	}
    }
    public function GetSearch(Request $request){
    	$product =  product::leftJoin('menu' , 'menu.categoryID' , '=' , 'product.categoryID')
    							->select('product.name','product.avatar','product.price','product.SEO','menu.page as page','product.ID as ID')
    							->where('product.name' , 'like', '%'.$request->key.'%' )
    							->get();

    	$count = $product->count();  	
   		return view('user.search',['product' => $product,'keyword' =>$request->key,'count' => $count]);
    }
}

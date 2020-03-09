<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\userModel\product;
use Cart;
use Validator;
class addcartsController extends Controller
{
		
    public function getcarts($productID){
    	$product = product::select('ID','name','price','avatar')
    				->whereRaw('ID =? AND StatusID = ?' ,[$productID,'active'])->get();
    	if($product->count()>0){
    		Cart::add(
				$product[0]['ID'],$product[0]['name'],$product[0]['price'],1,
				array('avatar' => $product[0]['avatar'], 'total' =>  $product[0]['price']));	
				foreach (Cart::getcontent() as  $value) {
					if($value['quantity'] > 1){
						Cart::update($value['id'],  ['total' => $value['price'] * $value['quantity']  ]);
					}else{
						Cart::update($value['id'],  ['total' => $value['price'] ]);
					}
				}
				return redirect()->route('viewCart');	
    	}else{
    		return back();
    	}

    }
    public function viewCart(){
    	return view('user.carts');
    }
    public function updateCart(Request $request){
    	$validator = Validator::make($request->all(),[
    		'productID' => 'required',
    		'quantity' => 'required|max:30|min:1|numeric',
    	],[
    		'productID.required' => 'Có lỗi vui lòng thử lại',
    		'quantity.required' => 'Lỗi số lượng không hợp lệ',
    		'quantity.max' => 'Lỗi số lượng không hợp lệ',
    		'quantity.min' => 'Lỗi số lượng không hợp lệ',
    		'quantity.numeric' => 'Lỗi số lượng không hợp lệ',
    		
    	]) ;
    	if($validator->fails()){
    		return response()->json(array('errors' =>$validator->getMessageBag()->toArray()));

    	}else{
    			foreach (Cart::getcontent() as  $value) {
    				if($value['id'] == $request->productID){
    					Cart::update($request->productID,
    						['quantity' =>  ['relative' => false, 'value' => $request->quantity],
    					]);
    						Cart::update($value['id'],  ['total' => $value['price'] * $value['quantity']  ]);
    				}
    			}
    			return response()->json(['success'=>Cart::getcontent(),'totalAll' => Cart::getTotal()]);
    		}
    }
    public function deleteCart(Request $request){
    	if(Cart::remove($request->id)){
    		return  1;
    	}else{
    		return response()->json(['errors' => 'Có lỗi vui lòng thao tác lại !']);
    	}

    }
}

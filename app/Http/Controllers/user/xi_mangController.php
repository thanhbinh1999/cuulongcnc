<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\usermodel\product;
class xi_mangController extends Controller
{
    public function getProduct ($id = null){
    	if($id==null){
    		$product = product::whereRaw('StatusID = ? AND categoryID = ?',['active',1])->get();
    		return view('user.xi_mang',['product' => $product]);

    	}else{
    		$productReview = product::leftJoin('review', 'review.productID' , '=' , 'product.ID')
                            ->select('review.description', 'review.title','product.ID as ID','product.avatar','product.price','product.size','product.SEO','product.categoryID','product.name','review.guide')
                            ->whereRaw('product.SEO = ? AND StatusID = ?',[$id,'active'])
                            ->get();
    		$relatedProduct = product::leftJoin('menu', 'menu.categoryID', '=' , 'product.categoryID')
    								->select('product.name','product.price','product.avatar','product.StatusID','product.amountProduct','product.SEO','menu.page as page','product.ID as ID')
    								->where("product.categoryID",$productReview[0]['categoryID'])
    								->where('product.SEO' , '!=' , $productReview[0]['SEO'])
    								->where('product.StatusID','active')
    								->take(4)
    								->get();
    								
    		if($productReview->count() > 0 ){
   				return  view('user.productDetails',['productDetails' =>$productReview,'title' => $productReview[0]['name'],'relatedProduct'=>$relatedProduct]);

    		}else{

    			return redirect('xi-mang');
    		}
    		
    	}
    }
  
}

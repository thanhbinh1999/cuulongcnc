<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\usermodel\product;
class catxayController extends Controller
{
     public function getProduct ($id = null){
    	if($id==null){
    		$product = product::whereRaw('StatusID = ? AND categoryID = ?',['active',4])->get();
    		if($product->count() > 0){
    			return view('user.catxay',['product' => $product]);
    		}else{
    			return view('user.catxay')->with(['errors'=> 'Không có dữ liệu']);
    		}
    		
    	}else{
           $productReview = product::leftJoin('review', 'review.productID' , '=' , 'product.ID')
                            ->select('review.description', 'review.title','product.ID as ID','product.avatar','product.price','product.size','product.SEO','product.categoryID','product.name')
                            ->whereRaw('product.SEO = ? AND StatusID = ?',[$id,'active'])
                            ->get();

            $relatedProduct = product::leftJoin('menu', 'menu.categoryID', '=' , 'product.categoryID')
                                    ->select('product.name','product.price','product.avatar','product.StatusID','product.amountProduct','product.SEO','menu.page as page')
                                    ->where("product.categoryID",$productReview[0]['categoryID'])
                                    ->where('product.SEO' , '!=' , $productReview[0]['SEO'])
                                    ->where('product.StatusID','active')
                                    ->get();
                                    
            if($productReview->count() > 0 ){
                return  view('user.productDetails',['productDetails' =>$productReview,'title' => $productReview[0]['name'],'relatedProduct'=>$relatedProduct]);

            }else{

                return redirect('xi-mang');
            }
        }

    }
}

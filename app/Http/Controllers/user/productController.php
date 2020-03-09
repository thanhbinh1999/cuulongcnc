<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\userModel\product;

class productController extends Controller
{
	private $limit  = 5;
	private $currentPage =1;
	private  function getProduct(){
		return product::all();
	}
	private function numberPage(){
		$page = ceil(($this->getProduct()->count() / $this->limit));
		return $page;
	}

	private function count(){
		$count = ( $this->getProduct()->count() - $this->limit * $this->currentPage);
		return $count;
	}

    public function sanpham(){
    	$product =   $this->getProduct()->skip(0)->take($this->limit);
   		return view('user.paginate',['product' => $product, 'count' => $this->count()]);
   		
    }

   public function pagination(Request $request){
  	 	 if(is_numeric($request->page) && $request->page <= $this->numberPage()){
  	 	 	$products = $this->getProduct()->skip( ($this->limit)* ($request->page -1)  )->take($this->limit);
  	 	 	$count =  $this->count() - ( ($request->page -1) * $this->limit);
  	 	 		return response()->json(['products' => $products ,'count' => $count]);
  	 	 }else{
  	 	 	return response()->json(['count' => 0]);
  	 	 }
   }
}

<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\addOrderRequest;
use App\userModel\ord;
use App\userModel\orddetails;
use Cart;
use App\userModel\province;
use App\userModel\district;
use App\userModel\product;
use App\userModel\town;
use App\userModel\customer;
class orderController extends Controller
{
	public $a;
    public function addOrder(addOrderRequest $request ){
    		$location = $this->converAddress(request()->province,request()->district,request()->town);
    	 if(session()->has('user')){
    		if(Cart::getcontent()->count() > 0 ){
    			$insertOrder = new ord();
	    		$insertOrder->customerID = session('user.ID');
	    		$insertOrder->transport = ( Cart::getTotal()/10);
	    		$insertOrder->total = Cart::getTotal();
	    		$insertOrder->name = request()->fullName;
	    		$insertOrder->numberphone = request()->numberPhone;
	    		$insertOrder->email = request()->email;
	    		$insertOrder->address = request()->house.",".$location[0]['townName'].",".$location[0]['districtName'].",".$location[0]['provinceName'];
	    		$insertOrder->note = request()->notes;
	    		$insertOrder->form = request()->payment;
	    		$insertOrder->StatusID = 'pending';
	    		if($insertOrder->save()){   			
	    			foreach(Cart::getcontent() as $products){
	    				 $insertOrderDetail = orddetails::create(['ordID' => $insertOrder->id,'productID'=>$products['id'],'price' => $products['price'], 'amountProduct' => $products['quantity']]);
	    			}
	    			return view('user.checkout-success',['orderID' => $insertOrder->id ,'payment' => $insertOrder->form,'location'=> $insertOrder->address]);	
	    			
				}
    		}else{

    			return redirect()->route('index');
    		}
    	}else{
    		return redirect()->route('login');
    	} 
    	

    	
    }
    public function converAddress($provinceID,$districtID,$townID){
    	$location = province::join('district', 'district.provinceID' , '=' , 'province.ID')
    			->join('town', 'town.districtID', '=' , 'district.ID')
    			->select('town.name as townName', 'district.name as districtName', 'province.name as provinceName')
    			->whereRaw('province.ID =? AND district.ID = ? AND town.ID = ?',[$provinceID,$districtID,$townID])
    			->get();
    		return $location;
    }
    public function orderPending(){
    			if(session('user')){
    				return view('user.don-hang',['ord' => $this->ordPending(),'orddetails' => $this->orderDetailsPending()]);

    				
    				
    			}else{
    				return redirect()->route('login');
    			}
    			
	}
	public function ordPending(){
		$ord = ord::leftJoin('customer', 'customer.ID', '=' , 'ord.customerID')
    				->select('ord.ID','ord.created_at','ord.StatusID')
    				->whereRaw('ord.customerID = ? AND customer.StatusID = ? ',[session('user.ID'),'active'])
    				->get();
    	return $ord;
	}
	public function  orderDetailsPending(){
			$orddetails = ord::Join('orddetails', 'orddetails.ordID', '=' , 'ord.ID')
    				->Join('product', 'product.ID' , '=' , 'orddetails.productID')
    				->select('orddetails.ordID as ordID','product.name as name', 'orddetails.amountProduct as amountProduct' , 'ord.StatusID as StatusID','product.avatar as avatar')
    				->whereRaw(' ord.customerID = ? ',[session('user.ID')])
    				->get();
    		return $orddetails;
    	
	}
	public function change_order(Request $request){
		if($request->Limit != 'all'){
			$ord = ord::leftJoin('customer', 'customer.ID', '=' , 'ord.customerID')
    				->select('ord.ID','ord.created_at','ord.StatusID')
    				->whereRaw('ord.customerID = ? AND customer.StatusID = ? ',[session('user.ID'),'active'])
    				->orderBy('created_at','DESC')
    				->take($request->Limit)
    				->get();
    			}else{
    				$ord = ord::leftJoin('customer', 'customer.ID', '=' , 'ord.customerID')
    				->select('ord.ID','ord.created_at','ord.StatusID')
    				->whereRaw('ord.customerID = ? AND customer.StatusID = ? ',[session('user.ID'),'active'])
    				->orderBy('created_at','DESC')
    				->get();
    			}

    	if($ord->count()>0){
    		$html = '';
    		foreach ($ord as $ordLists) {
    			$html.="<tr style='background: silver'>";
					$html.="<td style='text-align: left;' colspan='4'>";
							$html.="<p style='color: blue'>Mã đơn hàng: &nbsp #".$ordLists['ID']."</p>";
							$html.=	"<p>Đặt ngày: &nbsp ".$ordLists['created_at']."</p>";										
							$html.=	"<p>Tình trạng:";
									if($ordLists['StatusID'] == 'pending'){
										$html .="<button class='btn btn-primary'>Chưa xử lý</button>";
									}
									if($ordLists['StatusID'] == 'approve'){
										$html.="<button class='btn btn-primary'>Đã xử lý</button>";
									}
									if($ordLists['StatusID'] == 'delete'){
										$html.="<button class='btn btn-danger'>Đã hủy</button>";
									}
									$html.="</p>";
					$html.="</td>";
					$html.="<td style='text-align: right' colspan='1'><a style='color: blue' href=''>Chi tiết</a></td>";
				$html.="</tr>";
				foreach ($this->orderDetailsPending() as $products){
					if($products['ordID'] == $ordLists['ID']){
						$html.="<tr>";
							$html.="<td>";
									$html.="<img style='width: 80px;height: 90px' src='public/img/".$products['avatar']."'>";
							$html.=	"</td>";
							$html.="<td>";
									$html.="<p>".$products['name']."</p>";
									$html.=	"</td>";
									$html.=	"<td>";
											$html.="<p>Số lượng: &nbsp ".$products['amountProduct']."</p>";
									$html.=	"</td>";
										$html.="<td></td>";
											$html.="<td><p>Ngày giao hàng:  &nbsp Dự kiến 2-5 ngày</p></td>";
					}
						$html.="</tr>";
				}
    		}
    		return $html;
    	}
    		
    		
	}
	public function getOrdDetails(Request $request){
		$ord = ord::leftJoin('orddetails', 'orddetails.ordID', '='  , 'ord.ID')
			->leftJoin('product','product.ID','=' , 'orddetails.productID')
			->select('ord.total','ord.transport','ord.name as userName','ord.note', 'ord.address','ord.numberphone','product.name as productName','product.avatar','orddetails.amountProduct','orddetails.price')
			->where('ord.ID', $request->id)
			->get();
		return view('user.orderDetails',['ord' => $ord]);
			
	}

	



}
	
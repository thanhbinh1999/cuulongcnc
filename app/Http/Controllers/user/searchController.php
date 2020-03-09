<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\userModel\product;
class searchController extends Controller
{
	private $limit = 5;
	

	public function getSearch(){
		$keywork = request()->get('productName');
		if(strlen($keywork) > 0){
				$product = product::select('name','avatar')->where("name", "like" ,"%".$keywork."%")->take($this->limit)->get();
				$recordNumber = product::where("name", "like" ,"%".$keywork."%")->count();	
				if($recordNumber >0 ){
					return [
					'product' => $product,
					'recordNumber' => $recordNumber,
					];
				}else{
					return null;
				}
				
		}else{
			return null;
		}
		
		
		
	}
	public function numberPage($page=1){
		$html = '';
		$totalPage = ceil($this->getSearch()['recordNumber'] / $this->limit);
		if($totalPage > 1){
			$html .= "<tr>";
				$html .="<td colspan = '4'>";
					for($i =1 ;$i<= $totalPage; $i++){
						if($i == $page){
							$html.= "<button class =  'bnt btn-primary' title = 'trang ".$i."'>".$i."</button>";
						}else{
							$html.="<button class= 'btn' title = 'trang ".$i."'>".$i."</button>";
						}
					}
				$html.="</td>";
			$html.="</tr>";
			return $html;

		}else{

			return '';
		}
	}
    public function index(){
    	return view('user.searchPaginate');
    }

    public function search(){
    	 $this->getSearch();
    	 return response()->json(['paginate' => $this->numberPage(request()->get('page')), 'product' => $this->getSearch()['product'] ]);
    	

    	 
    }
}

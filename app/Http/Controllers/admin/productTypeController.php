<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\userModel\product;
use App\userModel\category;
use App\userModel\producer;
use App\userModel\review;
class productTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banchay  = product::where('producttype', '=' , 1)->get()->toArray();
        $gach = product::where('producttype', '=' , 2)->get()->toArray();
        $nuocson = product::where('producttype','=',3)->get()->toArray();
        return view('admin.san-pham-goi-y',['banchay'=>$banchay, 'gach'=>$gach ,'nuocson' => $nuocson]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  
       // for ($i=1; $i <= count($request->product_id) ; $i++) { 
         //   echo $request->product_id($i);
        //}
       foreach ($request->product_id as  $value) {
           $update = product::where('ID',$value)->update(['producttype' => $request->type_id]);
       }
       if($update==1){
             $html = '';
              $i = 1;
               $product =  product::select('name','price','StatusID','avatar','producttype','ID')
                            ->where('StatusID','=','active')->where('producttype', '=', $request->type_id)
                            ->get()->toArray();
             foreach ($product as  $lists) {
                $html.="<tr class='product'>";
                    $html.="<td>".($i++)."</td>";
                    $html.="<td><img style='width: 100px;height: 100px;'src='../public/img/$lists[avatar]'></td>";
                    $html.= "<td>".$lists['name']."</td>";
                    $html.= "<td>".number_format($lists['price'])."</td>";
                    $html.="<td><button class='btn btn-primary'>Đang hiển thị</button></td>";
                    $html.="<td>";
                        $html.="<button rol-type ='$lists[producttype]' rol-id = '$lists[ID]' class='btn btn-primary edit-product-type'>";
                                $html.="<i class='fa fa-pencil-square-o' aria-hidden='true'></i>";
                        $html.="</button >";
                        $html.="<button rol-type='$lists[producttype]' rol-id= '$lists[ID]' class='btn btn-danger delete-product-type'>";
                            $html.= "<i class='fa fa-trash-o' aria-hidden='true'></i>";
                        $html.="</button>";
                     $html.="</td>";
                $html.="</tr>";
            }
             return response()->json(['success'=>$html]); 
       }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    public function form_edit(Request $request){
        if($request->check =='open'){
            $product = product::select('name','price','avatar','ID','producttype','StatusID')
            ->where('StatusID','=','active')
            ->paginate(10);
            if(!empty($product)){
                $html = '';
                $paginate = '';
                $i = 1;
                foreach ($product as  $lists) {
                    $html .= "<tr>";
                        $html.="<td class = 'avatar_form'><img src= '../public/img/$lists[avatar]'></td>";
                        $html .="<td>".$lists['name']."</td>";
                        $html .="<td>".number_format($lists['price'])."</td>";
                        $html .="<td><button class ='btn btn-primary'>".$lists['StatusID']."</button></td>";
                        $html .="<td><input type= 'checkbox' class = 'check-id-product' value = '$lists[ID]' ></td>";
                    $html.="</tr>";
                }
                return response()->json(['success'=>$html,'paginate' => $product]);
            }
        }
    }
    public function pagination(Request $request){
        if($request->ID){
            $record = 10;
            $offset = 0;
            $id = $request->ID-1;
            $offset = ($id * $record); 
            $product = product::select('name','price','avatar','ID','producttype','StatusID')
            ->where('StatusID','=','active')->offset($offset)->take(10)->get()->toArray();
           if(!empty($product)){
                $html = '';
                $paginate = '';
                $i = 1;
                foreach ($product as  $lists) {
                    $html .= "<tr>";
                        $html.="<td class = 'avatar_form'><img src= '../public/img/$lists[avatar]'></td>";
                        $html .="<td>".$lists['name']."</td>";
                        $html .="<td>".number_format($lists['price'])."</td>";
                        $html .="<td><button class ='btn btn-primary'>".$lists['StatusID']."</button></td>";
                        $html .="<td><input type= 'checkbox' class = 'check-id-product' value = '$lists[ID]'></td>";
                    $html.="</tr>";
                }
                return response()->json(['success'=>$html,'paginate' => $product]);
            }
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
        if(!$request->listID[1] == ''){
            $product = product::where("ID", '=',$request->baseID)->update(['producttype'=>0]);
            if($product==1){
                $product_add = product::where('ID', '=' , $request->listID[1])->update(['producttype'=>$request->typeProduct]);
                if($product_add==1){
                    $html = '';
                    $list =  product::select('name','price','StatusID','avatar','producttype','ID')
                            ->where('StatusID','=','active')->where('producttype', '=', $request->typeProduct)
                            ->get()->toArray();
                        $i = 1;
                    foreach ($list as  $lists) {
                        $html.="<tr class='product'>";
                            $html.="<td>".($i++)."</td>";
                            $html.="<td><img style='width: 100px;height: 100px;'src='../public/img/$lists[avatar]'></td>";
                            $html.= "<td>".$lists['name']."</td>";
                            $html.= "<td>".number_format($lists['price'])."</td>";
                            $html.="<td><button class='btn btn-primary'>Đang hiển thị</button></td>";
                            $html.="<td>";
                                $html.="<button rol-type ='$lists[producttype]' rol-id = '$lists[ID]' class='btn btn-primary edit-product-type'>";
                                            $html.="<i class='fa fa-pencil-square-o' aria-hidden='true'></i>";
                                 $html.="</button >";
                                $html.="<button rol-type='$lists[producttype]' rol-id= '$lists[ID]' class='btn btn-danger delete-product-type'>";
                                        $html.= "<i class='fa fa-trash-o' aria-hidden='true'></i>";
                                $html.="</button>";
                             $html.="</td>";
                     $html.="</tr>";
                    }
                     return response()->json(['success'=>$html]);
                }
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        
        $check  = product::whereRaw(' ID = ? AND producttype = ?  ',[$id,$request->type_id])->count();
        if($check==1){
            $update  = product::where('ID', $id)->update(['producttype'=> '0']);
            if($update==1){
                $product = product::where('producttype',$request->type_id)->get()->toArray();
                    if(!empty($product)){
                        $html = '';
                        $i = 1;
                         foreach ($product as  $lists) {
                            $html.="<tr class='product'>";
                                $html.="<td>".($i++)."</td>";
                                $html.="<td><img style='width: 100px;height: 100px;'src='../public/img/$lists[avatar]'></td>";
                                $html.= "<td>".$lists['name']."</td>";
                                $html.= "<td>".number_format($lists['price'])."</td>";
                                $html.="<td><button class='btn btn-primary'>Đang hiển thị</button></td>";
                                $html.="<td>";
                                    $html.="<button rol-type ='$lists[producttype]' rol-id = '$lists[ID]' class='btn btn-primary edit-product-type'>";
                                            $html.="<i class='fa fa-pencil-square-o' aria-hidden='true'></i>";
                                    $html.="</button >";
                                    $html.="<button rol-type='$lists[producttype]' rol-id= '$lists[ID]' class='btn btn-danger delete-product-type'>";
                                        $html.= "<i class='fa fa-trash-o' aria-hidden='true'></i>";
                                    $html.="</button>";
                                 $html.="</td>";
                            $html.="</tr>";
                          }
                          return response()->json(['success'=>$html]); 
                         
                          
                    }else{
                          return response()->json(['nullProduct'=> 'Không có sản phẩm nào !']);
                    }
            }
            
        }else{
              return response()->json(['nullProduct'=> 'Không có sản phẩm nào !']);
        }
        

      
    }
}

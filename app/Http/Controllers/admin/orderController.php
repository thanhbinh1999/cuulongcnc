<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\userModel\ord;
use App\userModel\product;
use App\userModel\orddetails;
class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function data(){

        $ord = DB::table('ord')->select(DB::raw("name,ID,numberphone,IF(StatusID = 'pending','Chưa duyệt','Đã duyệt') as StatusID,ordTime,IF(form = 'COD' , 'Thanh toán khi nhận hàng','Chuyển khoản') as form,total"))->where("StatusID",'pending');
        return $ord;
   }
    public function index()
    {

        return view('admin.orders',['ord' => $this->data()->get()->toArray()]);
    
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orddetails = ord::
                join('orddetails' , 'orddetails.ordID' , '=' , 'ord.ID')
                ->leftJoin('product' , 'product.ID' , '=' , 'orddetails.productID')
                ->select('ord.name as customerName','ord.email','ord.numberphone','ord.address', 'ord.note' , 'ord.transport as ship','product.avatar as productName','product.avatar','orddetails.price','orddetails.amountProduct','ord.total','ord.StatusID','ord.ID','product.name','ord.created_at','ord.form')
                ->where('ord.ID', $id)->get()->toArray();

            return response()->json(['success'=>$orddetails,'errors' =>'Không tìm thấy thông tin đơn hàng này!']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $update = ord::whereRaw('StatusID = ? AND ID =?',['pending',$id])->update(['StatusID' => 'approve']);
        if($update ==1){
            return response()->json(['success' => $this->data()->get()->toArray()]);
        }else{
            return response()->json(['errors' => 'Phê duyệt đơn hàng không thành công vui lòng thử lại']);
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
        $delete = ord::whereRaw('StatusID = ? AND ID =?',['pending',$id])->update(['StatusID' => 'delete']);
        if($delete ==1){
            return response()->json(['success' => $this->data()->get()->toArray()]);
        }else{
            return response()->json(['errors' => 'không có đơn hàng nào!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function search(Request $request){
        $result = $this->data()->where('ID','like','%'.$request->keyword.'%')->get()->toArray();
        if(!empty($result)){
            return response()->json(["success"=>$result]);
        }else{
            return response()->json(["errors"=>'Không tìm thấy đơn hàng!']);
        }
    }
    public function xuathoadon($id){
        $orddetails = ord::
                join('orddetails' , 'orddetails.ordID' , '=' , 'ord.ID')
                ->leftJoin('product' , 'product.ID' , '=' , 'orddetails.productID')
                ->select('ord.name as customerName','ord.email','ord.numberphone','ord.address', 'ord.note' , 'ord.transport as ship','product.avatar as productName','product.avatar','orddetails.price','orddetails.amountProduct','ord.total','ord.StatusID','ord.ID','product.name','ord.ordTime','ord.form')
                ->where('ord.ID', $id)->get()->toArray();
               return  view('admin.xuathoadon',['orddetails'=> $orddetails]);

                
    }
}

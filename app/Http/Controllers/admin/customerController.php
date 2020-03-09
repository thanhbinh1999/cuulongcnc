<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\userModel\customer;
class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(){
        return  customer::all();
    }
    public function index()
    {
        

        return view('admin.dskhachhang',['customer'=>$this->data()]);
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
        if($request->stringIf == 'lock' && $request->customerID != ''){
             $update = customer::where('ID' , $request->customerID)->update(['StatusID'=>'lock']);
             if($update ==1){
                return response()->json(['success'=>$this->data()]);
             }else{
                return response()->json(['errors'=>'Không thể khóa tài khoản này']);
             }
            
        }
        if($request->stringIf == 'open' && $request->customerID != ''){
             $update = customer::where('ID' , $request->customerID)->update(['StatusID'=>'active']);
             if($update ==1){
                return response()->json(['success'=>$this->data()]);
             }else{
                return response()->json(['errors'=>'Không thể khóa tài khoản này']);
             }
            
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}

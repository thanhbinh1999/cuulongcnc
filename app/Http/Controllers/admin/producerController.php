<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\userModel\producer;
class producerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function database(){
        return producer::all();
    }
    public function index()
    {

      return view('admin.producer')->with(['producers'=>$this->database()]);   
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
       
       $check = producer::where('name',$request->name)->count();
        if($request->name!=''){
             if($check  ==0){
                 $create = new producer();
                 $create->name = $request->name;
                $create->statusID = 'active';
                if($create->save()){
                    return response()->json(['success'=> 'Tạo mới thành công']);
                }else{
                    return response()->json(['errors' =>'Có lỗi vui lòng thử lại!']);
                }
            }else{
                return response()->json(['giong' => 'Tên nhà cung cấp bị trùng nhập tên khác']);
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
        $show = producer::where('ID',$id)->get();
        return response()->json(['success' => $show]);
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
        $statusID = ($request->statusID == 1)?"active":"stop";
        $update = producer::where('ID',$id)->update(['statusID'=>$statusID , 'name'=>$request->txt]);
        if($update ==1){
            return 1;
        }else{
            return 0;
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
}

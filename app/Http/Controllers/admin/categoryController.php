<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\userModel\category;
class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function database(){
        return category::whereRaw('StatusID = ? OR StatusID = ?',['active','stop'])->get();

    }
    public function index()
    {

        
        return view('admin.category',['category'=>$this->database()]);
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
        if($request->all()!=''){
            $statusID = ($request->statusID == 1 )?'active':'stop'; 
            $create =  new category();
            $create->name = $request->txt;
            $create->statusID = $statusID;
            if($create->save()){
                return response()->json(['success' => $this->database()]);
            }else{
                return response()->json(['errors'=>'Lỗi hệ thống vui lòng thử lại']);
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
        $category = category::whereRaw('ID = ? AND StatusID = ? OR StatusID = ?',[$id,'active','stop'])->get();
        return response()->json(['success'=>$category]);
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

        if($request->all()!=''){
            $statusID = ($request->statusID == 1)?'active':'stop';
            $category = category::where('ID',$id)->update(['name'=>$request->txt,'statusID'=>$statusID]);
            if($category ==1){
                return response()->json(['success' => $this->database()]);
            }else{
                  return response()->json(['errors' => 'Có lỗi vui lòng cập nhật lại']);
            }
        }else{
                return request()->json(['validator' => 'Tên không được để trống']);
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
        $delete = category::where('ID',$id)->update(['statusID'=>'delete']);
        if($delete ==1){
            return response()->json(['success'=>$this->database()]);
        }else{
            return response()->json(['errors'=>'Lỗi hệ thống vui lòng thử lại']);
        }
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\usermodel\slider;
use Validator;
class sliderController extends Controller
{
    /**
     * Display a listing of the resource.
     
     * @return \Illuminate\Http\Response
     */

    public function database(){
        return slider::all();
    }
    public function index()
    {
        $slider = $this->database()->where('StatusID','active');
         return view('admin.slider',['slider'=>$slider]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }
     public function change_images(Request $request){

    
         $rules = [
            'images' => 'required | max:5000|image',
            'images' => 'mimes:jpeg,jpg,png',
         ];
         $error = [
             'images.required' => 'Chưa chọn hình ảnh nào!',
             'images.max' => 'Hình ảnh ko vượt quá 5MB!',
             'images.mimes' => 'Hình không đúng định dạng',
         ];
        $validator = Validator::make($request->all(),$rules,$error);
        if($validator->fails())
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        else
             $file = $request->images;
              $file->move('public/img',$request->images->getClientOriginalName());
           
            return response()->json(array('success' => $request->images->getClientOriginalName()));

         
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
        $update = slider::where('ID',$id)->update(['img'=> $request->slider_images]);
        if($update ==1){
           return response()->json(['success'=>$this->database()]);
        }else{
            return resource()->json(['errors'=> 'Có lỗi vui lòng thao tác lại!']);
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
        $delete = slider::where('ID',$id)->delete();
        if($delete ==1){
            return response()->json(['success' => $this->database()]);
        }else{
            return response()->json(['errors' => 'Có lỗi vui lòng thử lại']);
        }
    }
}

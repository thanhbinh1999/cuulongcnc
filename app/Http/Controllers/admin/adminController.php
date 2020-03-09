<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\userModel\admin;
use App\userModel\levels;
use Validator;
class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         if(session()->has('admin')){
            $level = levels::where('StatusID','active')->get();
            $admin = admin::
                    join('levels', 'levels.ID', '=' , 'admin.levelsID')
                    ->select('admin.ID','admin.avatar','admin.accountName','admin.name','levels.name as levelsName','admin.StatusID')
                    ->where('admin.ID', '!=', session()->get('admin.ID'))
                    ->get();
                 return view('admin.dsadmin')->with(['database'=> $admin,'level' => $level ]);
                    

                  

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         $rules = [
            'name' => 'required|max:30',
            'age' =>'required|max:100|numeric',
            'phone' => 'required|numeric',
            'location' => 'required',
            'accountName' => 'required|max:40',
            'pass'  => 'required|max:30',
            'levelsID' => 'required|numeric',
            'avatar' => 'required',
        ];
        $errors = [
            'name.required' => 'Tên không được để trống !',
            'name.max' => 'Tên phải ngắn hơn 30 ký tự',
            'age.required' => 'Tuổi không được bỏ trống !',
            'age.max' => 'Tuổi nhập không hợp lệ',
            'age.numeric' => 'Tuổi phải là dạng số',
            'phone.required' => 'Vui lòng cung cấp số điện thoại',
            'phone.numeric' => 'Số điện thoại không hợp lệ',
            'location.required' => 'Chưa nhập địa chỉ',
            'accountName.required' => 'Tên tài khoản không được bỏ trống',
            'accountName.max' => 'Tên tài khoản không vượt quá 40 ký tự',
            'levelsID.required' => 'Chưa chọn phân quyền cho tài khoản',
            'levelsID.numeric' => 'Mã phân quyền không khớp', 
            'pass.required' => 'Mật khẩu không để trống',
            'pass.max' => 'Vui lòng đặt mật khẩu dưới 30 ký tự',
            'avatar.required' => 'Ảnh đại diện  chưa có',
        ];
          $validator = Validator::make($request->all(),$rules,$errors);
          if($validator->fails()){

            return redirect()->route('registration')->withErrors($validator)->withInput();

          }else{
                $check = admin::where('accountName',$request->accountName)->count();
                if($check ==0){
                     $file = $request->avatar;
                     $file->move('public/img', $file->getClientOriginalName());
                    $update = new admin();
                    $update->accountName = $request->accountName;
                    $update->pass = Hash::make($request->pass);
                    $update->name = $request->name;
                    $update->age = $request->age;
                    $update->location = $request->location;
                    $update->phone = $request->phone;
                    $update->avatar = $file->getClientOriginalName();
                    $update->StatusID = 'active';
                    $update->levelsID = $request->levelsID;    
                    if($update->save()){
                        return redirect()->route('registration')->with(['messages' => 'Thêm thành công']);
                    }else{
                        return redirect()->route('registration')->with(['messages' => 'Có lỗi trong khi thực hiện vio lòng thao tác lại']);
                    }
                }else{
                    return redirect()->route('registration')->with(['messages' => 'Tài khoản đã tồn tại chọn tên khác']);
                }
                
              
          }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $admin = admin::where('ID',$id)->get()->toArray();
         if(!empty($admin)){
            return response()->json(['success'=> $admin]);
         }else{
            return response()->json(['errors'=> 'Không có thông tin!']);
         }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $rules = [
            'name' => 'required|max:30',
            'age' =>'required|max:100|numeric',
            'phone' => 'required|numeric',
            'location' => 'required',
            'accountName' => 'required|max:40',
            'levelsID' => 'required|numeric',
        ];
        $errors = [
            'name.required' => 'Tên không được để trống !',
            'name.max' => 'Tên phải ngắn hơn 30 ký tự',
            'age.required' => 'Tuổi không được bỏ trống !',
            'age.max' => 'Tuổi nhập không hợp lệ',
            'age.numeric' => 'Tuổi phải là dạng số',
            'phone.required' => 'Vui lòng cung cấp số điện thoại',
            'phone.numeric' => 'Số điện thoại không hợp lệ',
            'location.required' => 'Chưa nhập địa chỉ',
            'accountName.required' => 'Tên tài khoản không được bỏ trống',
            'accountName.max' => 'Tên tài khoản không vượt quá 40 ký tự',
            'levelsID.required' => 'Chưa chọn phân quyền cho tài khoản',
            'levelsID.numeric' => 'Mã phân quyền không khớp', 
        ];

          $validator = Validator::make($request->all(),$rules,$errors);
          if(($validator->fails())){
               return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
          }else{
            $update = admin::where('ID',$id)->update($request->all());
            if($update==1){
                      $admin = admin::
                    join('levels', 'levels.ID', '=' , 'admin.levelsID')
                    ->select('admin.ID','admin.avatar','admin.accountName','admin.name','levels.name as levelsName','admin.StatusID')
                    ->where('admin.ID', '!=', session()->get('admin.ID'))
                    ->get();
                return response()->json(['success'=> $admin]);
            }
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
         $update = admin::where('ID',$id)->update(['StatusID'=>'lock']);
         if($update ==1){
            return response()->json(['success' => 'Xóa thành công']);
         }else{
            return response()->json(['errors'=>'Xóa thất bại!']);
         } 
    }
    public function change_avatar(Request $request){
        if($request->hasFile('avatar')){
             $file = $request->avatar;
            $avatar = $request->avatar->getClientOriginalName();
            $size = $request->avatar->getSize();
            $type = $request->avatar->getClientOriginalExtension();
            $path = $request->avatar->getRealPath();
            $checkList = array('png','jpg');
            $pathh  = public_path('img');
           if(in_array($type, $checkList,true) && ($size/1024) < 5120){
                  $file->move($pathh, $avatar);
                return response()->json(['success'=>$avatar]);

           }else{
                return response()->json(['errors' => 'Định dạng file không đúng hoặc quá lơn']);
           }
        }
    }
    public function themthanhvienIndex(){
         $level = levels::where('StatusID','active')->get();
        return view('admin.themthanhvien',['levels' =>$level]);
    }
}

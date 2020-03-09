<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\adminRequest;
use App\Http\Requests\userRequest;
use App\userModel\admin;
use DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function getLoginAdmin(){
        return view('admin.login');
    }
    public function postLoginAdmin(adminRequest $request){
      
        $accountCheck = admin::select('accountName as name','pass','avatar','ID')->whereRaw('accountName = ? AND StatusID = ?',[$request->userName,'active'])->get();
        if($accountCheck->count()> 0){
            if(Hash::check($request->password, $accountCheck[0]['pass']) == true){
                session()->put('admin.ID',$accountCheck[0]['ID']);
                session()->put('admin.name',$accountCheck[0]['name']);
                session()->put('admin.avatar',$accountCheck[0]['avatar']);
                if(session()->has('admin')){
                    return redirect()->route('home');
                }
            }else{
                     return redirect('admin')
                            ->with(['messages'=>'Tài khoản hoặc mật khẩu không chính xác!']);
                }

        }else{
                 return redirect('admin')
                        ->with(['messages'=>'Tài khoản hoặc mật khẩu không chính xác!']);
            } 

    }
    public function getLoginUser(){
        return view('user.login');
    }
    public function postLoginUser(userRequest $request){
        if(Auth::attempt(['email'=>request()->user,'password' => request()->password,'StatusID'=>'active'])){
           session()->put('user.ID', Auth::user()['ID']);
           session()->put('user.email', Auth::user()['email']);
           if(session()->has('user')){
               return  redirect()->route('index');
           }
        }else{
            return redirect()->route('login')->with(['messages'=> 'Sai tên tài khoản hoặc mật khẩu!']);
        }
    }
}

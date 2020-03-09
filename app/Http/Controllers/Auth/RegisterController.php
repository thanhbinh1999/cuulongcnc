<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\userModel\customer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illiminate\Http\Response;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Cookie;
use App\Http\Requests\addUserController;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(addUserController $request)
    {
        $email = Cookie::get('email');
        $pin = Cookie::get('pin');
        if( $email == $request->user && $pin == $request->pin){
            $customer = customer::create(['email' =>$email, 'password' => Hash::make($request->password) ,'StatusID' => 'active']);
            if($customer){
               Cookie::queue(Cookie::forget('email'));
               Cookie::queue(Cookie::forget('pin'));
               return redirect()->route('register')->with('success' , 'Đăng ký tài khoản thành công');
            }
        }else{
         return  redirect()->route('register')->with('success' , 'Vui lòng kiểm tra lại Email hoặc Mã xác nhận!');
        }
        
    }
    public function getRegister(){
        return view('user.register');
    }
    public function setcookie(){
        $user = customer::all();
        if(request()->email){
            if($user->where('email',request()->email)->count() > 0){
                return response()->json(['error' => 'Email đã đăng ký vui lòng chọn tên khác']);

            }else{
                    $minutes = 15;
                    $pin = rand(100000,999999);
                    Cookie::queue('pin',$pin, $minutes);
                    Cookie::queue('email',request()->email,$minutes);
                    
                $data = ['pin' => $pin, 'email' => request()->email];

                Mail::send('emails.sendpin',$data,function($msg){
                $msg->from('lebinh23091999@gmail.com','Mã đăng ký tài khoản của bạn');
                $msg->to(request()->email)->subject('Công ty TNHH Cửu Long');
                });
                return response()->json(['success' => 'Mã pin đã gửi vui lòng kiểm tra hồm thư Email của bạn']);
   
            }
        }
    }
   
}

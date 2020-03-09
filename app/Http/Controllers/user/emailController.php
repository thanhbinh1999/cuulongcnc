<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
class emailController extends Controller
{
    public function sendMail(){
    //	$details = [
      //  'title' => 'Mail from ItSolutionStuff.com',
        //'body' => 'This is for testing email using smtp'
    //];
   
    //\Mail::to('lebinh070020@gmail.com')->send(new \App\Mail\MailNotify($details));

    	$data = ['title' => 'day la title' , 'content' => 'day la content'];
    	Mail::send('emails.demo',$data,function($msg){
    		$msg->from('lebinh23091999@gmail.com','Thông báo đổi mật khẩu');
    		$msg->to('lebinh070020@gmail.com','conan Bình')->subject('Công ty TNHH Thành công thông báo kết quả trúng tuyển');

    	});
   
 
    }
}

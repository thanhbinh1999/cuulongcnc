<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function index(){
    	$a = 'ffefef';
    	$type = 'fefe';
    	return 	response()
            	->view('user.test', $a);
            	//->header('Content-Type',$type);
    }

   

}

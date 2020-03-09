<?php

namespace App\userModel;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $table = 'admin';
    protected $fillable = ['accountName', 'pass','name','age', 'location', 'phone','avatar', 'StatusID' , 'levelsID' , 'page','userName', 'pass'];
   	protected $timestamp = 'false';
}

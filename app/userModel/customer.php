<?php

namespace App\userModel;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table = 'customer';
    protected $fillable = ['ID', 'email', 'numberphone', 'password', 'StatusID','created_at'];
    protected $timestamp = false;
}

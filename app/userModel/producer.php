<?php

namespace App\userModel;

use Illuminate\Database\Eloquent\Model;

class producer extends Model
{
    protected $table = 'producer';
    protected $fillable = ['ID','name','StatusID'];
}

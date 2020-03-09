<?php

namespace App\userModel;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected  $table = 'review';
    protected $fillable = ['title','description','guide','productID','ID'];

}

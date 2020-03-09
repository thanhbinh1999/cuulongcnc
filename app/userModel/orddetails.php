<?php

namespace App\userModel;

use Illuminate\Database\Eloquent\Model;

class orddetails extends Model
{
    protected $table = 'orddetails';
    protected $fillable = ['ordID','productID','amountProduct','price'];
}

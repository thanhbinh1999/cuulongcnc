<?php

namespace App\userModel;


use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'product';
    protected $fillable = ['ID','name','price','avatar','amountProduct','color','size','categoryID','producerID','producttype'];
    public function scopePrice($query){
    	return $query->where('price', '>' , 200);
    }
    public function scopeProductList($query){
    	return $query->select('ID','name');
    }
    public function scopeGroupByPrice($query){
    	return $query->groupBy('categoryID');
    }


}

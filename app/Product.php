<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['imagePath','title','description','price'];

    public function orderdetails()
    {
        return $this->hasMany('App\Orderdetail');
    }

    protected $table='products';
}

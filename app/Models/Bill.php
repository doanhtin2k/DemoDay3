<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $fillable = [
        'address', 'numberphone','totalItem','user_id','totalPrice',
    ];
    public function  user()
    {
        return $this->belongsTo('App\User');
    }
    public function books()
    {
        return $this->belongsToMany("App\Models\Book","orders")->withPivot("quantity");
    }
}

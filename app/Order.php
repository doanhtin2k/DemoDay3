<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'quantity', 'user_id', 'book_id','bill_id'
    ];
//    public function book()
//    {
//        return $this->belongsTo('App\Models\Book');
//    }
}

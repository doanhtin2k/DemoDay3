<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = [
        'name', 'short_description', 'image','price','category_id'
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}

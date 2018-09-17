<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    protected $fillable = ['name'];

    public function books()
    {
    	$this->hasMany('App\BookManagement');
    }
}

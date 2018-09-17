<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IssueBook extends Model
{
    public function book()
    {
        return $this->belongsTo('App\BookManagement','book_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

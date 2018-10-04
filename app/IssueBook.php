<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IssueBook extends Model
{
	protected $fillable = ['user_id','book_id','return_date','issue_date'];
	
    public function book()
    {
        return $this->belongsTo('App\BookManagement','book_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function fine()
    {
        return $this->hasOne('App\Fine','issue_id');
    }
}
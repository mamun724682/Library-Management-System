<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function issuBook()
    {
        return $this->belongsTo('App\IssueBook','issue_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Notice extends Model
{
	use Sluggable;

    protected $fillable = ['title', 'description', 'image', 'slug'];
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' 	=> 'title',
                'onUpdate' => true,
            ]
        ];
    }

    public function getImageAttribute($value)
    {
        return asset('uploads/blog/notice/'. $value);
    }
    
}

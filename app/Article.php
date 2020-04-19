<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    
    protected $fillable = ['title','alias','text','keywords','meta_desc','category_id','author','reading_time'];
	
	
	public function category() {
		return $this->belongsTo('App\Category');
	}
	
	public function comments()
    {
        return $this->hasMany('App\Comment');
    }	
	
}

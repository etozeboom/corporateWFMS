<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    
    protected $fillable = ['title','alias','text','keywords','meta_desc','description','category_id','author','reading_time','title_meta'];
	
	
	public function categories() {
		return $this->belongsToMany('App\Category','category_article');
	}
	
	public function comments()
    {
        return $this->hasMany('App\Comment');
    }	
	
}

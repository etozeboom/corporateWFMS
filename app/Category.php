<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['title','alias','keywords','meta_desc','meta_title','text1','text2'];
    public function articles() {
		return $this->hasMany('App\Articles');
	}
}

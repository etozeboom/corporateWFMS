<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    
    protected $fillable = ['title','alias','text','keywords','meta_desc'];
	
	
}

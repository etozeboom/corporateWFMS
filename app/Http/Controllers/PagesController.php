<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Page;


class PagesController extends SiteController
{
    //
    public function __construct() {
    	
    	parent::__construct(new \App\Repositories\MenusRepository(new \App\Menu));
    	
    	
    	$this->bar = 'left';
    	
    	$this->template = config('settings.theme').'.pages';
		
	}
	
	 public function index(Request $request) {
	 	
	 	//dd($request->path());
		 
		$page = Page::where('alias',$request->path())->first();
		//dd($page);
	 	$this->title = 'Контакты';
	 	
	 	$content = view(config('settings.theme').'.page_content')->with('page',$page)->render();
		$this->vars = array_add($this->vars,'content',$content);
	 	
	 	//$this->contentLeftBar = view(config('settings.theme').'.contact_bar')->render();
	 	
	 	return $this->renderOutput();
    }
				
    
}

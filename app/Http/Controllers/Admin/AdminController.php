<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Auth;

use Menu;

use Gate;

class AdminController extends \App\Http\Controllers\Controller
{
    //
    
    
    protected $a_rep;
    
    protected $user;
    
    protected $template;
    
    protected $content = FALSE;
    
    protected $title;
    
    protected $vars;
    
    // public function __construct() {
	// 	dd(Auth::user());
	// 	//Auth::loginUsingId(1,true);
	// 	$this->user = Auth::user();
	// //	dd(Auth::user());

	// 	if(!$this->user) {
	// 		abort(403);
	// 	}
	// }
	
	public function renderOutput() {
		$this->vars = array_add($this->vars,'title',$this->title);
		//dd($this->vars);
		$menu = $this->getMenu();
		
		$navigation = view(config('settings.theme').'.admin.navigation')->with('menu',$menu)->render();
		$this->vars = array_add($this->vars,'navigation',$navigation);
		
		if($this->content) {
			$this->vars = array_add($this->vars,'content',$this->content);
		}
		
		$footer = view(config('settings.theme').'.admin.footer')->render();
		$this->vars = array_add($this->vars,'footer',$footer);
		//dd($this->vars);
		return view($this->template)->with($this->vars);
		
		
		
		
	}
	
	public function getMenu() {
		return Menu::make('adminMenu', function($menu) {
			
			
			if(Gate::allows('VIEW_ADMIN_ARTICLES')) {
				$menu->add('Сказки',array('route' => 'admin.skazki.index'));
			
			}
			
			//$menu->add('Меню',  array('route'  => 'admin.menus.index'));
			//$menu->add('Пользователи',  array('route'  => 'admin.users.index'));
			//$menu->add('Привилегии',  array('route'  => 'admin.permissions.index'));
			
			
		});
	}
	
	
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

use Gate;

class IndexController extends AdminController
{
    //
    
	
	public function index() {
		//dd(Auth::user());
		if(Gate::denies('VIEW_ADMIN')) {
			abort(403);
		}
		$this->template = config('settings.theme').'.admin.index';
		$this->title = 'Панель администратора';
		
		return $this->renderOutput();
		
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\MenusRepository;


class SiteController extends Controller
{
    //
    
    protected $a_rep;
    protected $c_rep;
    protected $m_rep;
    
    protected $keywords;
	protected $meta_desc;
	protected $title;
    
    protected $temlate;
    
    protected $vars = array();

    protected $contentRightBar = FALSE;
	protected $contentLeftBar = FALSE;
	
    
    protected $bar = 'no';
    
    
    public function __construct(MenusRepository $m_rep) {
		$this->m_rep = $m_rep;
	}
	
	
	protected function renderOutput() {
		
		
		$menu = $this->getMenu();
		
		//dd($menu);
		
		$navigation = view(config('settings.theme').'.navigation')->with('menu',$menu)->render();
		$this->vars = array_add($this->vars,'navigation',$navigation);
		
		if($this->contentRightBar) {
			$rightBar = view(config('settings.theme').'.rightBar')->with('content_rightBar',$this->contentRightBar)->render();
			$this->vars = array_add($this->vars,'rightBar',$rightBar);
		}
		
		if($this->contentLeftBar) {
			$leftBar = view(config('settings.theme').'.leftBar')->with('content_leftBar',$this->contentLeftBar)->render();
			$this->vars = array_add($this->vars,'leftBar',$leftBar);
		}
		
		$this->vars = array_add($this->vars,'bar',$this->bar);
		
		
		$this->vars = array_add($this->vars,'keywords',$this->keywords);
		$this->vars = array_add($this->vars,'meta_desc',$this->meta_desc);
		$this->vars = array_add($this->vars,'title',$this->title);
		
		
		
		$footer = view(config('settings.theme').'.footer')->render();
		$this->vars = array_add($this->vars,'footer',$footer);
		
		return view($this->template)->with($this->vars);
	}
	
	public function getMenu() {
		
		$menu = $this->m_rep->get();
		
		// dd($menu);
		
			
		// foreach($menu as $item) {
			

		// }
		//dd($mBuilder);
		
		return $menu;
	}	
    
    
}

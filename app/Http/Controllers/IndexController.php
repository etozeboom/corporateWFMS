<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\ArticlesRepository;
use Illuminate\Support\Facades\Auth;

use Config;

class IndexController extends SiteController
{
    
    public function __construct(ArticlesRepository $a_rep) {
    	
    	parent::__construct(new \App\Repositories\MenusRepository(new \App\Menu));
    	
    	$this->a_rep = $a_rep;
    	
    	$this->bar = 'right';
    	
    	$this->template = config('settings.theme').'.index';
		
	}
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
                
        $this->keywords = 'Home Page';
		$this->meta_desc = 'Home Page';
		$this->title = 'Home Page';
		
        
        $articles = $this->getArticles();
        
       // dd($articles);
        
        $this->contentRightBar = view(config('settings.theme').'.indexBar')->with('articles',$articles)->render();
        
        //Auth::logout();
       // dump(Auth::user());
        //dump($request->user());
        


        return $this->renderOutput();
    }
    
    protected function getArticles() {
    	$articles = $this->a_rep->get(['title','created_at','alias'],Config::get('settings.home_articles_count'));
    	
    	return $articles;
    }	
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

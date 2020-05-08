<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\ArticlesRepository;

use Gate;

use App\Category;
use App\Article;


class ArticlesController extends AdminController
{
    
     public function __construct(ArticlesRepository $a_rep) {
		
		//parent::__construct();
    // if(Gate::denies('VIEW_ADMIN_ARTICLES')) {
		// 	abort(403);
		// }
		
		$this->a_rep = $a_rep;
		
		
		$this->template = config('settings.theme').'.admin.articles';
		
	}
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $this->title = 'Менеджер статтей';
        
        $articles = $this->getArticles();
       // dd($articles);
        $this->content = view(config('settings.theme').'.admin.articles_content')->with('articles',$articles)->render();
       
        
        return $this->renderOutput(); 
        
        
    }
    
    
     public function getArticles()
    {
        //
        
        return $this->a_rep->get();
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
		$this->title = "Добавить новый материал";
		
		$categories = Category::select(['title','alias','parent_id','id'])->get();
		
		$lists = array();
		
		foreach($categories as $category) {
			if($category->parent_id == 0) {
				$lists[$category->title] = array();
			}
			else {
				$lists[$categories->where('id',$category->parent_id)->first()->title][$category->id] = $category->title;    
			}
		}
		
		$this->content = view(config('settings.theme').'.admin.articles_create_content')->with('categories', $lists)->render();
		
		return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
       // dd($request);
        //
		$result = $this->a_rep->addArticle($request);
		
		if(is_array($result) && !empty($result['error'])) {
			return back()->with($result);
		}
		
		return redirect('/admin')->with($result);
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
    public function edit(int $id, Article $article)
    {
        //dd($id);
       // dd($article);
        //
        //$article = Article::where('alias', $alias);
      //  $articles = $this->getArticles();
        $article = Article::where('id', $id)->first();
       // dd($article);
		
		

		$categories = Category::select(['title','alias','parent_id','id'])->get();
		
		$lists = array();
		
		foreach($categories as $category) {
			if($category->parent_id == 0) {
				$lists[$category->title] = array();
			}
			else {
				$lists[$categories->where('id',$category->parent_id)->first()->title][$category->id] = $category->title;    
			}
    }
    
    $multiCategories = Category::select(['title','alias','parent_id','id'])->where('id', '<>', config('settings.zaid'))->where('id', '<>', config('settings.zid'))->where('id', '<>', config('settings.ssid'))->where('id', '<>', config('settings.zvsid'))->where('id', '<>', config('settings.vozrastid'))->where('id', '<>', 1)->where('id', '<>', config('settings.raid'))->get();
		
    $multilists = array();
    foreach($article->categories as $category) {
      $multilists[$category->id] = true;
		}
    $this->title = 'Реадактирование материала - '. $article->title;
    //dd($article->categories);
		//dd($categories);
		//dd($lists);
		//dd($article);
		$this->content = view(config('settings.theme').'.admin.articles_create_content')->with(['multiCategories' =>$multiCategories, 'categories' =>$lists, 'article' => $article, 'listsMultiCat' => $multilists, 'lists' => $lists])->render();
		
		return $this->renderOutput();
		
		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     //   articles -> Article  
    public function update(int $id, ArticleRequest $request, Article $article)
    {
       // dump($article);
        //dd($request);
       // dd($id);

        $article = Article::where('id', $id)->first();
        //
        $result = $this->a_rep->updateArticle($request, $article);
		
		if(is_array($result) && !empty($result['error'])) {
			return back()->with($result);
		}
		
		return redirect('/admin')->with($result);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, Article $article)
    {
        //
       // dd($article);
       $article = Article::where('id', $id)->first();
      // dd($article);
        $result = $this->a_rep->deleteArticle($article);
		if(is_array($result) && !empty($result['error'])) {
			return back()->with($result);
		}
		
		return redirect('/admin')->with($result);
        
        
    }
}

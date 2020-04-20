<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\ArticlesRepository;
use App\Repositories\CommentsRepository;

use App\Http\Requests;

use App\Category;
use Illuminate\Support\Facades\DB;
class ArticlesController extends SiteController
{
    
     public function __construct(ArticlesRepository $a_rep, CommentsRepository $c_rep) {
    	
    	parent::__construct(new \App\Repositories\MenusRepository(new \App\Menu));

    	$this->a_rep = $a_rep;
    	$this->c_rep = $c_rep;
    	
    	$this->bar = 'left';
    	
    	$this->template = config('settings.theme').'.articles';
		
	}
	
	public function index($cat_alias = FALSE)
    {
        //
        //dd($cat_alias);
        $this->title = 'Блог';
		$this->keywords = 'String';
		$this->meta_desc = 'String';
		
		if ($cat_alias) {
			$cat = Category::where('alias', '=', $cat_alias)->get();
		} else {
			$cat = Category::where('id', '=', 1)->get();
		}

        $articles = $this->getArticles($cat_alias);
        //dd($articles);
		//dd($cat);
		//dd($cat[0]->meta_desc);
		$this->meta_desc = $cat[0]->meta_desc;
		$this->keywords = $cat[0]->keywords;
		$this->title = $cat[0]->meta_title;
        $content = view(config('settings.theme').'.articles_content')->with(['cat' => $cat[0], 'articles' => $articles])->render();
		$this->vars = array_add($this->vars,'content',$content);
		
        $categorys = Category::where('id', '<>', 1)->get();
       // $comments = $this->getComments(config('settings.recent_comments'));
        //dd($categorys);
        $this->contentLeftBar = view(config('settings.theme').'.articlesBar')->with(['categorys' => $categorys]);
		
        
        return $this->renderOutput();
    }
    
    // public function getComments($take) {
		
	// 	$comments = $this->c_rep->get(['text','name','email','site','article_id','user_id'],$take);
		
	// 	if($comments) {
	// 		$comments->load('article','user');
	// 	}
		
	// 	return $comments;
	// }

    
    public function getArticles($alias = FALSE) {
    	
    	$where = FALSE;
    	if($alias) {
    		// WHERE `alias` = $alias
			$id = Category::select('id')->where('alias',$alias)->first()->id;
			//WHERE `category_id` = $id
			$where = ['category_id',$id];
		}
		//$articles = $this->a_rep->get(['id','title','alias','created_at','category_id','keywords','meta_desc','author','reading_time'],FALSE,TRUE,$where);
		//dd($articles);
		if ($alias) {
			$articles = DB::table('articles')
			->join('categories', 'articles.category_id', '=', 'categories.id')
			->select('articles.id','articles.title','articles.alias','articles.category_id','articles.keywords','articles.meta_desc','articles.author','articles.reading_time', 'categories.title as cat')
			->where('articles.category_id', '=', $id)
			->get();
		} else {
			$articles = DB::table('articles')
			->join('categories', 'articles.category_id', '=', 'categories.id')
			->select('articles.id','articles.title','articles.alias','articles.category_id','articles.keywords','articles.meta_desc','articles.author','articles.reading_time', 'categories.title as cat')
			->get();
		}
		
			
		//dd($aaa);
		// if($articles) {
		// 	$articles->load('category','comments');
		// }
		
		return $articles;
		
	}
	
	public function show($alias = FALSE) {
		
		$cat = Category::select('alias')->where('alias',$alias)->first();
		if ($cat) {
			return $this->index($cat->alias);
		}
		$article = $this->a_rep->one($alias);
		
		// if($article) {
		// 	$article->img = json_decode($article->img);
		// }
		
		//dd($article->comments->groupBy('parent_id'));
		
		if(isset($article->id)) {
			$this->title = $article->title;
			$this->keywords = $article->keywords;
			$this->meta_desc = $article->meta_desc;
		}
		
		
		$content = view(config('settings.theme').'.article_content')->with('article',$article)->render();
		$this->vars = array_add($this->vars,'content',$content);
		
		
		//$comments = $this->getComments(config('settings.recent_comments'));
		$categorys = Category::all();
        
        $this->contentLeftBar = view(config('settings.theme').'.articlesBar')->with(['categorys' => $categorys]);
		
		
		return $this->renderOutput();
	}	
    
}

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
			$cat = Category::where('alias', '=', $cat_alias)->first();
		} else {
			$cat = Category::where('id', '=', 1)->first();
		}
		//dd($cat->id);
        $articles = $this->getArticles($cat_alias);
        //dd($articles);
		//dd($cat);
		//dd($cat[0]->meta_desc);
		$this->meta_desc = $cat->meta_desc;
		$this->keywords = $cat->keywords;
		$this->title = $cat->meta_title;
		// SELECT categories.*, count(articles.id) FROM `categories` LEFT JOIN `articles` ON categories.id=articles.category_id WHERE categories.parent_id = 5 GROUP BY categories.id
		//DB::raw('categories.title, categories.alias , count(articles.id)')
		if ($cat->id == 5 || $cat->id == 8) {
			//$authors = Category::where('parent_id', '=', $cat->id)->select('title','alias')->get();
			$authors = Category::where('parent_id', '=', $cat->id)->leftJoin('articles', 'categories.id', '=', 'articles.category_id')->select(DB::raw('categories.title, categories.alias , count(articles.id) as articles_count'))->where('categories.parent_id', '=', $cat->id)->groupBy('categories.id')->get();
			//dd($authors);
			$content = view(config('settings.theme').'.authors_content')->with(['cat' => $cat, 'authors' => $authors])->render();
		} else {
			$content = view(config('settings.theme').'.articles_content')->with(['cat' => $cat, 'articles' => $articles])->render();
		}	

		$this->vars = array_add($this->vars,'content',$content);
		
        $categorys = Category::where('id', '<>', 1)->where('parent_id', '<>', 5)->where('parent_id', '<>', 8)->get();
	   // $comments = $this->getComments(config('settings.recent_comments'));
		$zar = Category::where('parent_id', '=', 5)->get();
		$rus = Category::where('parent_id', '=', 8)->get();
        //dd($categorys);
        $this->contentLeftBar = view(config('settings.theme').'.articlesBar')->with(['categorys' => $categorys,'zar' => $zar,'rus' => $rus]);
		
        
        return $this->renderOutput();
    }
    
    
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
		
		return $articles;
		
	}
	
	public function show($alias = FALSE) {
		
		$cat = Category::select('alias')->where('alias',$alias)->first();
		if ($cat) {
			return $this->index($cat->alias);
		}
		$article = $this->a_rep->one($alias);
		
		event('articleHasViewed', $article);
		// if($article) {
		// 	$article->img = json_decode($article->img);
		// }
		
		
		if(isset($article->id)) {
			$this->title = $article->title;
			$this->keywords = $article->keywords;
			$this->meta_desc = $article->meta_desc;
		}
		
		
		$content = view(config('settings.theme').'.article_content')->with('article',$article)->render();
		$this->vars = array_add($this->vars,'content',$content);
		
		
		//$comments = $this->getComments(config('settings.recent_comments'));
		$categorys = Category::where('id', '<>', 1)->where('parent_id', '<>', 5)->where('parent_id', '<>', 8)->get();
		// $comments = $this->getComments(config('settings.recent_comments'));
		 $zar = Category::where('parent_id', '=', 5)->get();
		 $rus = Category::where('parent_id', '=', 8)->get();
		 //dd($categorys);
		 $this->contentLeftBar = view(config('settings.theme').'.articlesBar')->with(['categorys' => $categorys,'zar' => $zar,'rus' => $rus]);
		
		
		return $this->renderOutput();
	}	
    
}

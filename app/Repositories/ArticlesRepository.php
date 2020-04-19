<?php

namespace App\Repositories;

use App\Article;
use Gate;

use Image;
use Config;

class ArticlesRepository extends Repository {
	
	
	public function __construct(Article $articles) {
		$this->model = $articles;
	}
	
	public function one($alias,$attr = array()) {
		//dump($alias);
		$article = parent::one($alias,$attr);
		
		if($article && !empty($attr)) {
			$article->load('comments');
			$article->comments->load('user');
		}
		
		return $article;
	}
	
	public function addArticle($request) {
		//dd($request); //+
		if(Gate::denies('save', $this->model)) {
			abort(403);
		}
		
		$data = $request->except('_token','image');
		
		if(empty($data)) {
			return array('error' => 'Нет данных');
		}
		
		if(empty($data['alias'])) {
			$data['alias'] = $this->transliterate($data['title']);
		}
		
		if($this->one($data['alias'],FALSE)) {
			$request->merge(array('alias' => $data['alias']));
			$request->flash();
			
			return ['error' => 'Данный псевдоним уже успользуется'];
		}
		
		$this->model->fill($data); 
				
		if($this->model->fill($data)->save()) {
			return ['status' => 'Материал добавлен'];
		}   
		
	}
	
	public function updateArticle($request, $article) {

		//dump($request);
		if(Gate::denies('edit', $this->model)) {
			abort(403);
		}
		
		$data = $request->except('_token','_method');
		//dd($data);
		if(empty($data)) {
			return array('error' => 'Нет данных');
		}
		
		if(empty($data['alias'])) {
			$data['alias'] = $this->transliterate($data['title']);
		}
		
		$result = $this->one($data['alias'],FALSE);
		
		if(isset($result->id) && ($result->id != $article->id)) {
			$request->merge(array('alias' => $data['alias']));
			$request->flash();
			
			return ['error' => 'Данный псевдоним уже успользуется'];
		}

		//dump("22222222222222222222");
		$article->fill($data); 
		//dd($article->id);
		//dd($article->update());
		if($article->update()) {
			return ['status' => 'Материал обновлен'];
		} 

	}
	
	
	public function deleteArticle($article) {
		// dd($article);
		// if(Gate::denies('destroy', $article)) {
		// 	abort(403);
		// }
		
		$article->comments()->delete();
		
		if($article->delete()) {
			return ['status' => 'Материал удален'];
		}
		
	}
	
}

?>
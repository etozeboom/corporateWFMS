<?php

namespace App\Repositories;

use App\Article;
use Gate;
use Illuminate\Support\Facades\Storage;

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
		//dd($request);

		if($request->hasFile('image')) {
			$image = $request->file('image');
			
			if($image->isValid()) {
				
				//$str = str_random(8);
				
				$obj = new \stdClass;
				
				$obj->mini = 'img_mini.jpg';
				$obj->path = 'img.jpg';
				
				$img = Image::make($image);
				
				if(!Storage::disk('pub')->exists('/skaz/'.$result->id)) {

					Storage::disk('pub')->makeDirectory('/skaz/'.$result->id, 0775, true); //creates directory
				
				}

				$img->fit(Config::get('settings.image')['width'],
						Config::get('settings.image')['height'])->save(public_path().'/skaz/'.$result->id.'/'.$obj->path); 
				
				$img->fit(Config::get('settings.articles_img')['mini']['width'],
						Config::get('settings.articles_img')['mini']['height'])->save(public_path().'/skaz/'.$result->id.'/'.$obj->mini); 
						
				
				//$data['img'] = json_encode($obj);  
				
				// $this->model->fill($data); 
				
				// if($request->user()->articles()->save($this->model)) {
				// 	return ['status' => 'Материал добавлен'];
				// }                          
				
			}
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

		//dd(public_path().'/'.config('settings.theme').'/');
		//dd(Storage::directories(public_path().'/'.config('settings.theme').'/'));
		//dd(Storage::allDirectories('/pink'));
		//dd(Storage::disk()->allDirectories());
		//dd(Storage::disk('public')->exists('pink'));
		//dd(Storage::exists(public_path().'/'.config('settings.theme').'/skazki/'));
		//dd(Storage::exists(public_path().'/'.config('settings.theme').'/skazki/'));
		//dd(storage_path('app'));
		//dd(public_path());
		//dd(Storage::disk('pub')->Directories(config('settings.theme').'/skazki/'));
		//dd($result->id);
		if($request->hasFile('image')) {
			$image = $request->file('image');
			
			if($image->isValid()) {
				
				//$str = str_random(8);
				
				$obj = new \stdClass;
				
				$obj->mini = 'img_mini.jpg';
				$obj->path = 'img.jpg';
				
				$img = Image::make($image);
				
				if(!Storage::disk('pub')->exists('/skaz/'.$result->id)) {

					Storage::disk('pub')->makeDirectory('/skaz/'.$result->id, 0775, true); //creates directory
				
				}

				$img->fit(Config::get('settings.image')['width'],
						Config::get('settings.image')['height'])->save(public_path().'/skaz/'.$result->id.'/'.$obj->path); 
				
				$img->fit(Config::get('settings.articles_img')['mini']['width'],
						Config::get('settings.articles_img')['mini']['height'])->save(public_path().'/skaz/'.$result->id.'/'.$obj->mini); 
						
				
				//$data['img'] = json_encode($obj);  
				
				// $this->model->fill($data); 
				
				// if($request->user()->articles()->save($this->model)) {
				// 	return ['status' => 'Материал добавлен'];
				// }                          
				
			}
			
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
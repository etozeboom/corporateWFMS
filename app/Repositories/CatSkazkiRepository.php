<?php

namespace App\Repositories;

use App\Category;
use Gate;

use Image;
use Config;

class CatSkazkiRepository extends Repository {
	
	
	public function __construct(Category $categories) {
		$this->model = $categories;
	}
	
	public function one($alias,$attr = array()) {
		//dump($alias);
		$category = parent::one($alias,$attr);
		
		return $category;
	}
	
	public function addCategory($request) {
		
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
	
	public function updateCategory($request, $category) {

		$data = $request->except('_token','_method');
		//dd($data);
		if(empty($data)) {
			return array('error' => 'Нет данных');
		}
		
		if(empty($data['alias'])) {
			$data['alias'] = $this->transliterate($data['title']);
		}
		
		$result = $this->one($data['alias'],FALSE);
		
		if(isset($result->id) && ($result->id != $category->id)) {
			$request->merge(array('alias' => $data['alias']));
			$request->flash();
			
			return ['error' => 'Данный псевдоним уже успользуется'];
		}

		//dump("22222222222222222222");
		$category->fill($data); 
		//dd($category->id);
		//dd($category->update());
		if($category->update()) {
			return ['status' => 'Материал обновлен'];
		} 

	}
	
	
	public function deleteCategory($category) {
		// dd($category);
		// if(Gate::denies('destroy', $category)) {
		// 	abort(403);
		// }
		
		$category->comments()->delete();
		
		if($category->delete()) {
			return ['status' => 'Материал удален'];
		}
		
	}
	
}

?>
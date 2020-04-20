<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CatSkazkiRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->canDo('ADD_ARTICLES');
    }
    
     protected function getValidatorInstance()
     {
    	$validator = parent::getValidatorInstance();
    	
    	
    	
    	// $validator->sometimes('alias','unique:articles|max:255', function($input) {
        	
        // 	//dd($this->route());
        // 	if($this->route()->hasParameter('skazki')) {
		// 		$model = $this->route()->parameter('skazki');
		// 		dd($model);
		// 		return ($model->alias !== $input->alias)  && !empty($input->alias);
		// 	}
        	
        // 	return !empty($input->alias);
        	
        //});
        
        return $validator;
    	
    	
    }	

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        return [
            //
            'title' => 'required',
            'alias' => 'required|max:255'
        ];
    }
}

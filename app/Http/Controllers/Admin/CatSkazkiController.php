<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CatSkazkiRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\CatSkazkiRepository;

use Gate;

use App\Category;


class CatSkazkiController extends AdminController
{
    
     public function __construct(CatSkazkiRepository $cs_rep) {
		
		//parent::__construct();
    // if(Gate::denies('VIEW_ADMIN_ARTICLES')) {
		// 	abort(403);
		// }
		
		$this->cs_rep = $cs_rep;
		
		
		$this->template = config('settings.theme').'.admin.categories';
		
	}
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $this->title = 'Менеджер категорий';
        
        $categories = $this->getCategories();
        $this->content = view(config('settings.theme').'.admin.categories_content')->with('categories',$categories)->render();
       
        
        return $this->renderOutput(); 
        
        
    }
    
    
     public function getCategories()
    {
        //
        
        return $this->cs_rep->get();
        
        
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
		
		/*foreach($categories as $category) {
			if($category->parent_id == 0) {
				$lists[$category->title] = array();
			}
			else {
				$lists[$categories->where('id',$category->parent_id)->first()->title][$category->id] = $category->title;    
			}
		}*/
    //dd( $lists);
    $lists[1]="Сказки";
    $lists[config('settings.zaid')]="Зарубежные авторы";
    $lists[config('settings.raid')]="Русские авторы";
    $lists[config('settings.zid')]="О животных";
    $lists[config('settings.ssid')]="Сборник сказок";
    $lists[config('settings.zzvid')]="Зимние волшебные";
    $lists[config('settings.vozrastid')]="возраст";
		$this->content = view(config('settings.theme').'.admin.categories_create_content')->with('categories', $lists)->render();
		
		return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatSkazkiRequest $request)
    {
       // dd($request);
        //
		$result = $this->cs_rep->addCategory($request);
		
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
    public function edit(int $id, Category $category)
    {
        ($id);
       // dd($category);
        //
        //$category = Category::where('alias', $alias);
      //  $categories = $this->getCategories();
        $categoryy = Category::where('id', $id)->first();
       // dd($categoryy);
		
		
		$categories = Category::select(['title','alias','parent_id','id'])->get();
		
		$lists = array();
		
		// foreach($categories as $category) {
		// 	if($category->parent_id == 0) {
		// 		$lists[$category->title] = array();
		// 	}
		// 	else {
		// 		$lists[$categories->where('id',$category->parent_id)->first()->title][$category->id] = $category->title;    
		// 	}
		// }
    $lists[1]="Сказки";
    $lists[config('settings.zaid')]="Зарубежные авторы";
    $lists[config('settings.raid')]="Русские авторы";
    $lists[config('settings.zid')]="О животных";
    $lists[config('settings.ssid')]="Сборник сказок";
    $lists[config('settings.zzvid')]="Зимние волшебные";
    $lists[config('settings.vozrastid')]="возраст";

		$this->title = 'Реадактирование материала - '. $categoryy->title;
		
	//	dd($lists);
		$this->content = view(config('settings.theme').'.admin.categories_create_content')->with(['categories' =>$lists, 'category' => $categoryy])->render();
		
		return $this->renderOutput();
		
		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     //   categories -> Category  
    public function update(int $id, CatSkazkiRequest $request, Category $category)
    {
      //dd($request);
        //dump("11111");
       // dd($id);
        $category = Category::where('id', $id)->first();
        //
        $result = $this->cs_rep->updateCategory($request, $category);
		
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
    public function destroy(int $id, Category $category)
    {
        //
       // dd($category);
       $category = Category::where('id', $id)->first();
      // dd($category);
        $result = $this->cs_rep->deleteCategory($category);
		if(is_array($result) && !empty($result['error'])) {
			return back()->with($result);
		}
		
		return redirect('/admin')->with($result);
        
        
    }
}

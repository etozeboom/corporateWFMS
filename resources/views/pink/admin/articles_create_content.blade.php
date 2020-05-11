<div id="content_page" class="content">
				            <div class="">

{!! Form::open(['url' => (isset($article->id)) ? route('admin.skazki.update',['id' => $article->id]) : route('admin.skazki.store'),'class'=>'artcl_form','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    
	<ul>
		<li class="text_field">
			<label for="name_contact_us">
				<span class="label">Название:</span>
				<br />
				<span class="sublabel">Заголовок материала</span><br />
			</label>
			<div class="input_prepend">
			{!! Form::text('title',isset($article->title) ? $article->title  : old('title'), ['placeholder'=>'Введите название страницы']) !!}
			 </div>
		 </li>
		 
		 <li class="text_field">
			<label for="name_contact_us">
				<span class="label">title:</span>
				<br />
				<span class="sublabel">title_meta</span><br />
			</label>
			<div class="input_prepend">
			{!! Form::text('title_meta', isset($article->title_meta) ? $article->title_meta  : old('title_meta'), ['placeholder'=>'Введите title']) !!}
			 </div>
		 </li>

		 <li class="text_field">
			<label for="name_contact_us">
				<span class="label">Ключевые слова:</span>
				<br />
				<span class="sublabel">keywords</span><br />
			</label>
			<div class="input_prepend">
			{!! Form::text('keywords', isset($article->keywords) ? $article->keywords  : old('keywords'), ['placeholder'=>'Введите название страницы']) !!}
			 </div>
		 </li>
		 
		 
		 <li class="text_field">
			<label for="name_contact_us">
				<span class="label">Псевдоним:</span>
				<br />
				<span class="sublabel">введите псевдоним</span><br />
			</label>
			<div class="input_prepend">
			{!! Form::text('alias', isset($article->alias) ? $article->alias  : old('alias'), ['placeholder'=>'Введите псевдоним страницы']) !!}
			 </div>
		 </li>

		 <li class="text_field">
			<label for="name_contact_us">
				<span class="label">Автор:</span>
				<br />
				<span class="sublabel">введите автора</span><br />
			</label>
			<div class="input_prepend">
			{!! Form::text('author', isset($article->author) ? $article->author  : old('author'), ['placeholder'=>'Введите автора']) !!}
			 </div>
		 </li>

		 <li class="text_field">
			<label for="name_contact_us">
				<span class="label">Время чтения:</span>
				<br />
				<span class="sublabel">введите время чтения</span><br />
			</label>
			<div class="input_prepend">
			{!! Form::text('reading_time', isset($article->reading_time) ? $article->reading_time  : old('reading_time'), ['placeholder'=>'Введите время чтения']) !!}
			 </div>
		 </li>
		 
		 <li class="text_field li_meta_desc">
			<label for="name_contact_us">
				<span class="label">Мета описание:</span>
				<br />
				<span class="sublabel">meta_desc</span><br />
			</label>
			<div class="input_prepend">
			{!! Form::text('meta_desc', isset($article->meta_desc) ? $article->meta_desc  : old('meta_desc'), ['placeholder'=>'Введите название страницы']) !!}
			 </div>
		 </li>
		 
		<li class="textarea_field">
			<label for="message_contact_us">
				 <span class="label">Краткое описание:</span>
			</label>
			<div class="input_prepend">
			{!! Form::textarea('description', isset($article->description) ? $article->description  : old('description'), ['id'=>'editor','class' => 'form-control','placeholder'=>'Введите текст страницы']) !!}
			</div>
			<div class="msg_error"></div>
		</li>
		
		<li class="textarea_field">
			<label for="message_contact_us">
				 <span class="label">Текст:</span>
				 ссылка для картинки: https://kotbaun.com/public/skaz/{{isset($article->id) ? $article->id  : 'id skazki'}}/имя.jpg
			</label>
			<div class="input_prepend">
			{!! Form::textarea('text', isset($article->text) ? $article->text  : old('text'), ['id'=>'editor2','class' => 'form-control','placeholder'=>'Введите текст страницы']) !!}
			</div>
			<div class="msg_error"></div>
		</li>
		@if(isset($article->id))
		<li class="text_field">
			<label for="name_contact_us">
				<span class="label">Изображение:</span>

					<img alt="" src="{{route('home')}}/public/skaz/{{$article->id}}/img_mini.jpg" style="max-width: 80px" />
				<br />

				<span class="sublabel">Изображение материала</span><br />
			</label>
			<div class="input_prepend">
				{!! Form::file('image', ['class' => 'filestyle','data-buttonText'=>'Выберите изображение','data-buttonName'=>"btn-primary",'data-placeholder'=>"Файл"]) !!}
			 </div>
			<div class="input_prepend">
				{!! Form::select('img_plaha', [0 => 'нет картинки', 1 => 'белые буквы на темном фоне', 2 => 'черные буквы на светлом фоне'],isset($article->img_plaha) ? $article->img_plaha  : 0) !!}
			 </div>
			 
		</li>
		@endif

		<li class="text_field">
			<label for="name_contact_us">
				<span class="label">Категория:</span>
				<br />
				<span class="sublabel">Категория материала</span><br />
			</label>
			<div class="input_prepend">
				{!! Form::select('category_id', $categories,isset($article->category_id) ? $article->category_id  : '') !!}
			 </div>
			 
		</li>	

		@if(isset($multiCategories))
		<li class="text_field">
			<label for="name_contact_us">
				<span class="label">Категория:</span>
				<br />				{{$i=0}}
				<span class="sublabel">Категория материала</span><br />
			</label>
			<div class="input_prepend checkCat">
				
				<div class="checkTitle">Сказки</div>
				@foreach($multiCategories[1] as $category)
					<div class="check_div"><div class="checkText">{{$category->title}}</div> {!! Form::checkbox($i++, $category->id, array_key_exists($category->id, $listsMultiCat)) !!}</div>
				@endforeach
				<div class="checkTitle">Сборник сказок</div>
				@foreach($multiCategories[config('settings.ssid')] as $category)
					<div class="check_div"><div class="checkText">{{$category->title}}</div> {!! Form::checkbox($i++, $category->id, array_key_exists($category->id, $listsMultiCat)) !!}</div>
				@endforeach
				<div class="checkTitle">Зарубежные авторы</div>
				@foreach($multiCategories[config('settings.zaid')] as $category)
					<div class="check_div"><div class="checkText">{{$category->title}}</div> {!! Form::checkbox($i++, $category->id, array_key_exists($category->id, $listsMultiCat)) !!}</div>
				@endforeach
				<div class="checkTitle">Русские авторы</div>
				@foreach($multiCategories[config('settings.raid')] as $category)
					<div class="check_div"><div class="checkText">{{$category->title}}</div> {!! Form::checkbox($i++, $category->id, array_key_exists($category->id, $listsMultiCat)) !!}</div>
				@endforeach
				<div class="checkTitle">Сказки о животных</div>
				@foreach($multiCategories[config('settings.zid')] as $category)
					<div class="check_div"><div class="checkText">{{$category->title}}</div> {!! Form::checkbox($i++, $category->id, array_key_exists($category->id, $listsMultiCat)) !!}</div>
				@endforeach
				<div class="checkTitle">Сказки по возрасту</div>
				@foreach($multiCategories[config('settings.vozrastid')] as $category)
					<div class="check_div"><div class="checkText">{{$category->title}}</div> {!! Form::checkbox($i++, $category->id, array_key_exists($category->id, $listsMultiCat)) !!}</div>
				@endforeach
				<div class="checkTitle">Зимние волшебные сказки</div>
				@foreach($multiCategories[config('settings.zvsid')] as $category)
					<div class="check_div"><div class="checkText">{{$category->title}}</div> {!! Form::checkbox($i++, $category->id, array_key_exists($category->id, $listsMultiCat)) !!}</div>
				@endforeach

			 </div>

		</li>	 
		@endif

		@if(isset($article->id))
			<input type="hidden" name="_method" value="PUT">		
		
		@endif

		<li class="submit_button"> 
			{!! Form::button('Сохранить', ['class' => 'btn btn_the_salmon_dance_3','type'=>'submit']) !!}			
		</li>
		 
	</ul>
	
    
    
    
    
{!! Form::close() !!}

 <script>
	CKEDITOR.replace( 'editor' );
	CKEDITOR.replace( 'editor2' );
</script>
</div>
</div>
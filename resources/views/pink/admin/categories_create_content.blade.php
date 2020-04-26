<div id="content_page" class="content group">
				            <div class="hentry group">

{!! Form::open(['url' => (isset($category->id)) ? route('admin.catskazki.update',['id' => $category->id]) : route('admin.catskazki.store'),'class'=>'contact_form','method'=>'POST','enctype'=>'multipart/form-data']) !!}
  
	<ul>
		<li class="text_field">
			<label for="name_contact_us">
				<span class="label">Название:</span>
				<br />
				<span class="sublabel">Заголовок материала</span><br />
			</label>
			<div class="input_prepend"><span class="add_on"><i class="icon_user"></i></span>
			{!! Form::text('title',isset($category->title) ? $category->title  : old('title'), ['placeholder'=>'Введите название страницы']) !!}
			 </div>
		 </li>
		 
		 <li class="text_field">
			<label for="name_contact_us">
				<span class="label">Ключевые слова:</span>
				<br />
				<span class="sublabel">Ключевые слова</span><br />
			</label>
			<div class="input_prepend"><span class="add_on"><i class="icon_user"></i></span>
			{!! Form::text('keywords', isset($category->keywords) ? $category->keywords  : old('keywords'), ['placeholder'=>'Введите название страницы']) !!}
			 </div>
		 </li>
		 
		 <li class="text_field">
			<label for="name_contact_us">
				<span class="label">Мета описание:</span>
				<br />
				<span class="sublabel">Мета описание</span><br />
			</label>
			<div class="input_prepend"><span class="add_on"><i class="icon_user"></i></span>
			{!! Form::text('meta_desc', isset($category->meta_desc) ? $category->meta_desc  : old('meta_desc'), ['placeholder'=>'Введите название страницы']) !!}
			 </div>
		 </li>
		 
		 <li class="text_field">
			<label for="name_contact_us">
				<span class="label">Псевдоним:</span>
				<br />
				<span class="sublabel">введите псевдоним</span><br />
			</label>
			<div class="input_prepend"><span class="add_on"><i class="icon_user"></i></span>
			{!! Form::text('alias', isset($category->alias) ? $category->alias  : old('alias'), ['placeholder'=>'Введите псевдоним страницы']) !!}
			 </div>
		 </li>

		 <li class="text_field">
			<label for="name_contact_us">
				<span class="label">meta_title:</span>
				<br />
				<span class="sublabel">введите meta_title</span><br />
			</label>
			<div class="input_prepend"><span class="add_on"><i class="icon_user"></i></span>
			{!! Form::text('meta_title', isset($category->meta_title) ? $category->meta_title  : old('meta_title'), ['placeholder'=>'Введите meta_title']) !!}
			 </div>
		 </li>

		
		<li class="textarea_field">
			<label for="message_contact_us">
				 <span class="label">Описание1:</span>
			</label>
			<div class="input_prepend"><span class="add_on"><i class="icon_pencil"></i></span>
			{!! Form::textarea('text1', isset($category->text1) ? $category->text1  : old('text1'), ['id'=>'editor','class' => 'form-control','placeholder'=>'Введите текст страницы']) !!}
			</div>
			<div class="msg_error"></div>
		</li>

		<li class="textarea_field">
			<label for="message_contact_us">
				 <span class="label">Описание2:</span>
			</label>
			<div class="input_prepend"><span class="add_on"><i class="icon_pencil"></i></span>
			{!! Form::textarea('text2', isset($category->text2) ? $category->text2  : old('text2'), ['id'=>'editor2','class' => 'form-control','placeholder'=>'Введите текст страницы']) !!}
			</div>
			<div class="msg_error"></div>
		</li>
		
		@if(!isset($category->id) || (isset($category->id) && $category->id != 5 && $category->id != 8 && $category->id != 1))
		<li class="text_field">
			<label for="name_contact_us">
				<span class="label">Категория:</span>
				<br />
				<span class="sublabel">Категория материала</span><br />
			</label>
			<div class="input_prepend">
				{!! Form::select('parent_id', $categories,isset($category->parent_id) ? $category->parent_id  : '') !!}
			 </div>
			 
		</li>	
		@endif
		@if(isset($category->id))
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
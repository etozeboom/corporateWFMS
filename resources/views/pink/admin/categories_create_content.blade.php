<div id="content-page" class="content group">
				            <div class="hentry group">

{!! Form::open(['url' => (isset($category->id)) ? route('admin.catskazki.update',['id' => $category->id]) : route('admin.catskazki.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}
  
	<ul>
		<li class="text-field">
			<label for="name-contact-us">
				<span class="label">Название:</span>
				<br />
				<span class="sublabel">Заголовок материала</span><br />
			</label>
			<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
			{!! Form::text('title',isset($category->title) ? $category->title  : old('title'), ['placeholder'=>'Введите название страницы']) !!}
			 </div>
		 </li>
		 
		 <li class="text-field">
			<label for="name-contact-us">
				<span class="label">Ключевые слова:</span>
				<br />
				<span class="sublabel">Ключевые слова</span><br />
			</label>
			<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
			{!! Form::text('keywords', isset($category->keywords) ? $category->keywords  : old('keywords'), ['placeholder'=>'Введите название страницы']) !!}
			 </div>
		 </li>
		 
		 <li class="text-field">
			<label for="name-contact-us">
				<span class="label">Мета описание:</span>
				<br />
				<span class="sublabel">Мета описание</span><br />
			</label>
			<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
			{!! Form::text('meta_desc', isset($category->meta_desc) ? $category->meta_desc  : old('meta_desc'), ['placeholder'=>'Введите название страницы']) !!}
			 </div>
		 </li>
		 
		 <li class="text-field">
			<label for="name-contact-us">
				<span class="label">Псевдоним:</span>
				<br />
				<span class="sublabel">введите псевдоним</span><br />
			</label>
			<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
			{!! Form::text('alias', isset($category->alias) ? $category->alias  : old('alias'), ['placeholder'=>'Введите псевдоним страницы']) !!}
			 </div>
		 </li>

		 <li class="text-field">
			<label for="name-contact-us">
				<span class="label">meta_title:</span>
				<br />
				<span class="sublabel">введите meta_title</span><br />
			</label>
			<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
			{!! Form::text('meta_title', isset($category->meta_title) ? $category->meta_title  : old('meta_title'), ['placeholder'=>'Введите meta_title']) !!}
			 </div>
		 </li>

		
		<li class="textarea-field">
			<label for="message-contact-us">
				 <span class="label">Описание1:</span>
			</label>
			<div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span>
			{!! Form::textarea('text1', isset($category->text1) ? $category->text1  : old('text1'), ['id'=>'editor','class' => 'form-control','placeholder'=>'Введите текст страницы']) !!}
			</div>
			<div class="msg-error"></div>
		</li>

		<li class="textarea-field">
			<label for="message-contact-us">
				 <span class="label">Описание2:</span>
			</label>
			<div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span>
			{!! Form::textarea('text2', isset($category->text2) ? $category->text2  : old('text2'), ['id'=>'editor2','class' => 'form-control','placeholder'=>'Введите текст страницы']) !!}
			</div>
			<div class="msg-error"></div>
		</li>
 
		
		@if(isset($category->id))
			<input type="hidden" name="_method" value="PUT">		
		
		@endif

		<li class="submit-button"> 
			{!! Form::button('Сохранить', ['class' => 'btn btn-the-salmon-dance-3','type'=>'submit']) !!}			
		</li>
		 
	</ul>
	
    
    
    
    
{!! Form::close() !!}

 <script>
	CKEDITOR.replace( 'editor' );
	CKEDITOR.replace( 'editor2' );
</script>
</div>
</div>
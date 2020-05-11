<div id="content_page" class="content">
				            <div class="">

{!! Form::open(['url' => (isset($category->id)) ? route('admin.catskazki.update',['id' => $category->id]) : route('admin.catskazki.store'),'class'=>'artcl_form','method'=>'POST','enctype'=>'multipart/form-data']) !!}
  
	<ul>
		<li class="text_field">
			<label for="name_contact_us">
				<span class="label">Название:</span>
				<br />
				<span class="sublabel">Название раздела</span><br />
			</label>
			<div class="input_prepend">
			{!! Form::text('title',isset($category->title) ? $category->title  : old('title'), ['placeholder'=>'Введите название раздела']) !!}
			 </div>
		 </li>
		 
		 
		 <li class="text_field">
			<label for="name_contact_us">
				<span class="label">meta_title:</span>
				<br />
				<span class="sublabel">введите meta_title страницы</span><br />
			</label>
			<div class="input_prepend">
			{!! Form::text('meta_title', isset($category->meta_title) ? $category->meta_title  : old('meta_title'), ['placeholder'=>'Введите title страницы']) !!}
			 </div>
		 </li>

		 <li class="text_field">
			<label for="name_contact_us">
				<span class="label">Ключевые слова:</span>
				<br />
				<span class="sublabel">keywords</span><br />
			</label>
			<div class="input_prepend">
			{!! Form::text('keywords', isset($category->keywords) ? $category->keywords  : old('keywords'), ['placeholder'=>'Введите keywords']) !!}
			 </div>
		 </li>
		 

		 
		 <li class="text_field">
			<label for="name_contact_us">
				<span class="label">Псевдоним:</span>
				<br />
				<span class="sublabel">url</span><br />
			</label>
			<div class="input_prepend">
			{!! Form::text('alias', isset($category->alias) ? $category->alias  : old('alias'), ['placeholder'=>'Введите псевдоним страницы']) !!}
			 </div>
		 </li>

		 <li class="text_field li_meta_desc">
			<label for="name_contact_us">
				<span class="label">Мета описание:</span>
				<br />
				<span class="sublabel">meta_desc</span><br />
			</label>
			<div class="input_prepend">
			{!! Form::text('meta_desc', isset($category->meta_desc) ? $category->meta_desc  : old('meta_desc'), ['placeholder'=>'Введите meta_desc страницы']) !!}
			 </div>
		 </li>
		
		<li class="textarea_field">
			<label for="message_contact_us">
				 <span class="label">Описание1:</span>
			</label>
			<div class="input_prepend">
			{!! Form::textarea('text1', isset($category->text1) ? $category->text1  : old('text1'), ['id'=>'editor','class' => 'form-control','placeholder'=>'Введите текст страницы']) !!}
			</div>
			<div class="msg_error"></div>
		</li>

		<li class="textarea_field">
			<label for="message_contact_us">
				 <span class="label">Описание2:</span>
			</label>
			<div class="input_prepend">
			{!! Form::textarea('text2', isset($category->text2) ? $category->text2  : old('text2'), ['id'=>'editor2','class' => 'form-control','placeholder'=>'Введите текст страницы']) !!}
			</div>
			<div class="msg_error"></div>
		</li>
		
		@if(!isset($category->id) || (isset($category->id) && $category->id != config('settings.ssid') && $category->id != config('settings.zaid') && $category->id != config('settings.raid') && $category->id != config('settings.zid') && $category->id != config('settings.vozrastid') && $category->id != config('settings.zvsid')))
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
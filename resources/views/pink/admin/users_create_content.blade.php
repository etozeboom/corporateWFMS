<div id="content_page" class="content group">
				            <div class="hentry group">

{!! Form::open(['url' => (isset($user->id)) ? route('admin.users.update',['users'=>$user->id]) :route('admin.users.store'),'class'=>'contact_form','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    
	<ul>
		<li class="text_field">
			<label for="name_contact_us">
				<span class="label">Имя:</span>
				<br />
				<span class="sublabel">Имя</span><br />
			</label>
			<div class="input_prepend"><span class="add_on"><i class="icon_user"></i></span>
			{!! Form::text('name',isset($user->name) ? $user->name  : old('name'), ['placeholder'=>'Введите название страницы']) !!}
			 </div>
		 </li>
		 
		 <li class="text_field">
			<label for="name_contact_us">
				<span class="label">Логин:</span>
				<br />
				<span class="sublabel">Логин</span><br />
			</label>
			<div class="input_prepend"><span class="add_on"><i class="icon_user"></i></span>
			{!! Form::text('login',isset($user->login) ? $user->login  : old('login'), ['placeholder'=>'Введите название страницы']) !!}
			 </div>
		 </li>
		 
		  <li class="text_field">
			<label for="name_contact_us">
				<span class="label">Email:</span>
				<br />
				<span class="sublabel">Email</span><br />
			</label>
			<div class="input_prepend"><span class="add_on"><i class="icon_user"></i></span>
			{!! Form::text('email',isset($user->email) ? $user->email  : old('email'), ['placeholder'=>'Введите название страницы']) !!}
			 </div>
		 </li>
		 
		 <li class="text_field">
			<label for="name_contact_us">
				<span class="label">Пароль:</span>
				<br />
				<span class="sublabel">Пароль</span><br />
			</label>
			<div class="input_prepend"><span class="add_on"><i class="icon_user"></i></span>
			{!! Form::password('password') !!}
			 </div>
		 </li>
		 
		 <li class="text_field">
			<label for="name_contact_us">
				<span class="label">Повтор пароля:</span>
				<br />
				<span class="sublabel">Повтор пароля</span><br />
			</label>
			<div class="input_prepend"><span class="add_on"><i class="icon_user"></i></span>
			{!! Form::password('password_confirmation') !!}
			 </div>
		 </li>
		 
		 <li class="text_field">
			<label for="name_contact_us">
				<span class="label">Роль:</span>
				<br />
				<span class="sublabel">Роль</span><br />
			</label>
			<div class="input_prepend">
			
				{!! Form::select('role_id', $roles, (isset($user)) ? $user->roles()->first()->id : null) !!}
			 </div>
			 
		</li>	
		 
		 
		 
		 	 
		
		@if(isset($user->id))
			<input type="hidden" name="_method" value="PUT">		
		
		@endif

		<li class="submit_button"> 
			{!! Form::button('Сохранить', ['class' => 'btn btn_the_salmon_dance_3','type'=>'submit']) !!}			
		</li>
		 
	</ul>
	
    
    
    
    
{!! Form::close() !!}

</div>
</div>

				            
	<div class="homeText">
		<h3>Привет!</h3>
		<p>В гостях у кота Баюна. Волшебные сказки</p>
	</div>
				            
	@if($categories)

		<div class="block_cats">
			@foreach($categories as $category)
				
				<div class="block_cat">
					<div class="text">
						<a href="{{ route('skazkiCat',['cat_alias'=>$category->alias]) }}" class="title">{{ $category->title }}</a>
					</div>
				</div>
				
			@endforeach
		</div>
	@endif
				            
				        
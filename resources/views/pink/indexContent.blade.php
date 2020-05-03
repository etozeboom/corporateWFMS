
				            
	<div class="homeText">
		<h3>Привет!</h3>
		<p>В гостях у кота Баюна. Волшебные сказки</p>
	</div>
				            
	@if($categorys)

		<div class="block_cats">
			@foreach($categorys as $category)
				
				<div class="block_cat">
					<div class="text">
						<a href="{{ route('skazkiCat',['cat_alias'=>$category->alias]) }}" class="title">{{ $category->title }}</a>
					</div>
				</div>
				
			@endforeach
		</div>
	@endif
				            
				        
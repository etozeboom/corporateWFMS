
				            

				            
	@if($categorys)
		<h3>text</h3>
		<div class="recent_post group">
		
			@foreach($categorys as $category)
				
				<div class="hentry_post group">
					<div class="text">
						<a href="{{ route('skazkiCat',['cat_alias'=>$category->alias]) }}" class="title">{{ $category->title }}</a>
					</div>
				</div>
				
			@endforeach
		
		</div>
	@endif

	<div class="widget_last widget text_image">

	</div>
				            
				        
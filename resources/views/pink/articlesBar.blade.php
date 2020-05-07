

@if($categories)
<div class="left_menu">		
	<ul class="menul">
		@foreach($categories as $category)
		
		@if($category->id != 12)
			<li class="p_menu {{ ($category->id == 5 || $category->id == 8 || $category->id == 11) ? 'sub' : ''}}"><a href="{{ route('skazkiCat',['cat_alias' => $category->alias]) }}">{{ $category->title }} </a>
				@if($category->id == 5)
					<ul class="v_menu">
					@foreach($zar as $z)
						<li><a href="{{ route('skazkiCat',['cat_alias' => $z->alias]) }}">{{ $z->title }}</a></li>
					@endforeach
					</ul>
				@endif
				@if($category->id == 8)
					<ul class="v_menu">
					@foreach($rus as $r)
						<li><a href="{{ route('skazkiCat',['cat_alias' => $r->alias]) }}">{{ $r->title }}</a></li>
					@endforeach
					</ul>
				@endif
				@if($category->id == 11)
					<ul class="v_menu">
					@foreach($ziv as $z)
						<li><a href="{{ route('skazkiCat',['cat_alias' => $z->alias]) }}">{{ $z->title }}</a></li>
					@endforeach
					</ul>
				@endif
			</li>
		@endif

		@if($category->id == 12)
			<div class="vozrast">
				@foreach($vozrast as $v)
					<li p_menu><a href="{{ route('skazkiCat',['cat_alias' => $v->alias]) }}">{{ $v->title }}</a></li>
				@endforeach
			</div>
		@endif

			
		@endforeach
	</ul>
	</div>   
@endif
 
				            
				            
				        
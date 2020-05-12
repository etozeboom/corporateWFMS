

@if($categories)
<div class="left_menu">		
	<ul class="menul">
		@foreach($categories as $category)
		
		@if($category->id != config('settings.vozrastid'))
			<li class="p_menu {{ ($category->id == config('settings.ssid') || $category->id == config('settings.zaid') || $category->id == config('settings.raid') || $category->id == config('settings.zid') || $category->id == config('settings.zvsid')) ? 'sub' : ''}}">
				<a href="{{ route('skazkiCat',['cat_alias' => $category->alias]) }}">{{ $category->title }} </a>
				@if($category->id == config('settings.ssid'))
					<ul class="v_menu">
					@foreach($ssid as $z)
						<li><a href="{{ route('skazkiCat',['cat_alias' => $z->alias]) }}">{{ $z->title }}</a></li>
					@endforeach
					</ul>
				@endif
				@if($category->id == config('settings.zaid'))
					<ul class="v_menu">
					@foreach($zar as $z)
						<li><a href="{{ route('skazkiCat',['cat_alias' => $z->alias]) }}">{{ $z->title }}</a></li>
					@endforeach
					</ul>
				@endif
				@if($category->id == config('settings.raid'))
					<ul class="v_menu">
					@foreach($rus as $r)
						<li><a href="{{ route('skazkiCat',['cat_alias' => $r->alias]) }}">{{ $r->title }}</a></li>
					@endforeach
					</ul>
				@endif
				@if($category->id == config('settings.zid'))
					<ul class="v_menu">
					@foreach($ziv as $z)
						<li><a href="{{ route('skazkiCat',['cat_alias' => $z->alias]) }}">{{ $z->title }}</a></li>
					@endforeach
					</ul>
				@endif
				@if($category->id == config('settings.zvsid'))
					<ul class="v_menu">
					@foreach($zvsid as $z)
						<li><a href="{{ route('skazkiCat',['cat_alias' => $z->alias]) }}">{{ $z->title }}</a></li>
					@endforeach
					</ul>
				@endif
			</li>
		@endif



			
		@endforeach


		<div class="vozrast">
			@foreach($vozrast as $v)
				<li p_menu><a href="{{ route('skazkiCat',['cat_alias' => $v->alias]) }}">{{ $v->title }}</a></li>
			@endforeach
		</div>
	</ul>
	</div>   
@endif
 
				            
				            
				        
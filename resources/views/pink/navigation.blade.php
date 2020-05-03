@if($menu)
	<div class="menu classic ">
		<ul id="nav" class="flexWrap">
			@include(config('settings.theme').'.customMenuItems',['items'=>$menu])
		</ul>
	</div>
@endif

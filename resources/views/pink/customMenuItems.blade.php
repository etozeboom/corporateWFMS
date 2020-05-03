@foreach($items as $item)
	<li {{ (Request::path() ==  $item->path) ? "class=active" : '' }} >
		<a href="{{route('home')}}/{{ $item->path }}">{{ $item->title }}</a>
	</li>
@endforeach
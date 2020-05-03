@foreach($items as $item)
	<li {{ (Request::path() ==  $item->path) ? "class=active" : '' }} >
		<a href="{{ $item->path }}">{{ $item->title }}</a>
	</li>
@endforeach
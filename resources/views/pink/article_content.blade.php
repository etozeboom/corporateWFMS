<div id="content_skazka" class="content content_skazka">
	@if($article)
		<div class="breadcrumb">
			<a href="{{ route('skazki.index') }}">Сказки</a> -><a href="{{ route('skazki.show',['alias'=>$cat->alias]) }}">{{$cat->title}}</a>
		</div>
	@endif

	@if($article)
		@if($article->img_plaha > 0)
			<div class="post_img">
				<img alt="" src="{{route('home')}}/public/skaz/{{$article->id}}/img_mini.jpg" />
			</div>
		@endif

		<div class="">
			<h1 class="post_title">{{ $article->title }}</h1>
		</div>

		<div class="the_content">
			<p>{!! $article->text !!}</p>
		</div>
			
	@endif
		
	@if($randArticles)
	
		<div class="randSkazkiTitle">Читать ещё</div>
		<div class="randSkazki">
			@foreach($randArticles as $randArticle)
				<a href="{{ route('skazki.show',['alias'=>$randArticle->alias]) }}" class="randSkazka" style="background: url({{route('home')}}/public/skaz/{{$randArticle->id}}/img_mini.jpg) no-repeat;">
					<div class="plahka {{$randArticle->img_plaha == 1 ? 'dark_p' : 'white_p'}}">
						<div class="plahka_title">
						{{ $randArticle->title }}
						</div>
					</div>
				</a>
			@endforeach	
		</div>
	@endif
</div>
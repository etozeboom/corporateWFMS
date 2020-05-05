<div id="content_blog" class="content content_skazki">
	@if($cat)
		<div class="textCat">
		@if(isset($cat->text1))
			{!! $cat->text1 !!}
		@endif
		</div>
	@endif
	@if($authors)
					

		<div class="short_table">
			<table id="tableSkazki" class="" style="width: 100%" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th>Автор</th>
						<th>Количество</th>
					</tr>
				</thead>
				<tbody>
				

					@foreach($authors as $author)
					<tr>
						<td class="align_left"><a href="{{ route('skazki.show',['alias'=>$author->alias]) }}">{{ $author->title }}</a></td>
						<td>{{$author->articles_count}}</td>
						</tr>	
					@endforeach	
					
				</tbody>
			</table>
		</div>
	@else
		{!! Lang::get('ru.articles_no') !!}
	@endif	 
			
	@if($cat)
		<div class="textCat">
		@if(isset($cat->text2))
			{!! $cat->text2 !!}
		@endif
		</div>
	@endif
</div>
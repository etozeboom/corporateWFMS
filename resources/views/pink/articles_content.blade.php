<div id="content_blog" class="content group content_skazki">
@if($cat)
	<div class="">
	@if(isset($cat->text1))
		{!! $cat->text1 !!}
	@endif
	</div>
@endif
				            @if($articles)
				            	            

				            <div class="short_table white">
				                    <table id="tableSkazki" class="display" style="width: 100%" cellspacing="0" cellpadding="0">
				                        <thead>
				                            <tr>
				                                <th><div class="plahka">Название</div></th>
				                                <th><div class="plahka">Автор</div></th>
				                                <th><div class="plahka">Время</div></th>
				                            </tr>
				                        </thead>
				                        <tbody>
										

											@foreach($articles as $article)
											<tr>
				                                <td class="align_left"><a href="{{ route('skazki.show',['alias'=>$article->alias]) }}">{{ $article->title }}</a></td>
				                                <td class="align_left"> {{isset($article->author) ? $article->author  : $article->cat}}</td>
				                                <td>{{$article->reading_time}}</td>
											 </tr>	
											@endforeach	
				                           
				                        </tbody>
				                    </table>
				                </div>
								

			@else
			
				{!! Lang::get('ru.articles_no') !!}
			
			@endif	 
			
			@if($cat)
	<div class="">
	@if(isset($cat->text2))
		{!! $cat->text2 !!}
	@endif
	</div>
@endif
				        </div>
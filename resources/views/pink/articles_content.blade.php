<div id="content-blog" class="content group">
				            @if($articles)
				            	            

				            <div class="short-table white">
				                    <table id="tableSkazki" class="display" style="width: 100%" cellspacing="0" cellpadding="0">
				                        <thead>
				                            <tr>
				                                <th>Название</th>
				                                <th>Автор</th>
				                                <th>Время</th>
				                            </tr>
				                        </thead>
				                        <tbody>
										

											@foreach($articles as $article)
											<tr>
				                                <td class="align-left"><a href="{{ route('skazki.show',['alias'=>$article->alias]) }}">{{ $article->title }}</a></td>
				                                <td class="align-left"> {{isset($article->author) ? $article->author  : $article->cat}}</td>
				                                <td>{{$article->reading_time}}</td>
											 </tr>	
											@endforeach	
				                           
				                        </tbody>
				                    </table>
				                </div>
								

			@else
			
				{!! Lang::get('ru.articles_no') !!}
			
			@endif	            
				        </div>
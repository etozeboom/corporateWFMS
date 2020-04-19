<div id="content-blog" class="content group">
				            @if($articles)
				            
				            @foreach($articles as $article)
				            
					            <div class="sticky hentry hentry-post blog-big group">
					                <!-- post featured & title -->
					                <div class="thumbnail">
					                    <!-- post title -->
					                    <h2 class="post-title"><a href="{{ route('skazki.show',['alias'=>$article->alias]) }}">{{ $article->title }}</a></h2>
					                </div>
					            </div>
				            
				            @endforeach
				            
				            

				            <div class="general-pagination group">
				            
				            	@if($articles->lastPage() > 1) 
				            		
				            		@if($articles->currentPage() !== 1)
				            			<a href="{{ $articles->url(($articles->currentPage() - 1)) }}">«</a>
				            		@endif
				            		
				            		@for($i = 1; $i <= $articles->lastPage(); $i++)
				            			@if($articles->currentPage() == $i)
				            				<a class="selected disabled">{{ $i }}</a>
				            			@else
				            				<a href="{{ $articles->url($i) }}">{{ $i }}</a>
				            			@endif		
				            		@endfor
				            		
				            		@if($articles->currentPage() !== $articles->lastPage())
				            			<a href="{{ $articles->url(($articles->currentPage() + 1)) }}">»</a>
				            		@endif
				            		
				            	
				            	@endif
				           
				            </div>
			@else
			
				{!! Lang::get('ru.articles_no') !!}
			
			@endif	            
				        </div>
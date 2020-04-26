
				            
				            
				            <div class="widget_first widget recent_posts">
				            
				            @if($articles)
				             	<h3>{{ trans('ru.from_blog') }}</h3>
				             	<div class="recent_post group">
				            	
				            		@foreach($articles as $article)
				            			
				            			<div class="hentry_post group">
					                        <div class="text">
					                            <a href="{{ route('skazki.show',['alias'=>$article->alias]) }}" title="Section shortcodes &amp; sticky posts!" class="title">{{ $article->title }}</a>

					                            <p class="post-date">{{ $article->created_at->format('F d, Y') }}</p>
					                        </div>
					                    </div>
				            			
				            		@endforeach
				            	
				            	</div>
				            @endif

				            <div class="widget_last widget text_image">
				                <h3>Customer support</h3>
				                <div class="text_image" style="text-align:left"><img src="{{asset(config('settings.theme'))}}/images/callus.gif" alt="Customer support" /></div>
				                <p>Proin porttitor dolor eu nibh lacinia at ultrices lorem venenatis. Sed volutpat scelerisque vulputate. </p>
				            </div>
				            
				        
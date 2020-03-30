
				            
				            <div class="widget-first widget recent-posts">
				           
				            
				            @if(!$comments->isEmpty())
				            <div class="widget-last widget recent-comments">
				                <h3>{{ Lang::get('ru.latest_comments') }}</h3>
				            	<div class="recent-post recent-comments group">
				            	
				            	@foreach($comments as $comment)
				            	
				            		<div class="the-post group">
				                        <div class="avatar">
				                        	@set($hash, ($comment->email) ? md5($comment->email) : $comment->user->email)
				                            <img alt="" src="https://www.gravatar.com/avatar/{{$hash}}?d=mm&s=55" class="avatar" />   
				                        </div>
				                        <span class="author"><strong><a href="#">{{ isset($comment->user) ? $comment->user->name : $comment->name}}</a></strong> in</span> 
				                        <a class="title" href="{{ route('articles.show',['alias' => $comment->article->alias]) }}">{{ $comment->article->title }}</a>
				                        <p class="comment">
                                            {{ $comment->text }} <a class="goto" href="{{ route('articles.show',['alias' => $comment->article->alias]) }}">&#187;</a>
                                        </p>
				                    </div> 
				            	
				            	@endforeach
				            	
				            	</div>
				             </div>   
				            @endif
 
				            
				            
				        
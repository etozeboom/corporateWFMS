
				            
				            <div class="widget-first widget recent-posts">
				           
				            @if($categorys)
				            <div class="widget-last widget recent-comments">
				                <h3>{{ Lang::get('ru.latest_comments') }}</h3>
				            	<div class="recent-post recent-comments group">
				            	
				            	@foreach($categorys as $category)
				            	
				            		<div class="the-post group">
				                        
				                        <span class="author"><a href="{{ route('skazkiCat',['cat_alias' => $category->alias]) }}">{{ $category->title }}</a></span> 
				                        
				                    </div> 
				            	
				            	@endforeach
				            	
				            	</div>
				             </div>   
				            @endif
 
				            
				            
				        
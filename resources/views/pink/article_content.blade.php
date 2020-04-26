<div id="content_single" class="content group">
				            <div class="hentry hentry_post blog_big group ">
				                <!-- post featured & title -->
				                
				                @if($article)
				                
				                <div class="thumbnail">
				                    <!-- post title -->
				                    <h1 class="post_title"><a href="#">{{ $article->title }}</a></h1>
				                    <!-- post featured -->

				                    <p class="date">
				                        <span class="month">{{ $article->created_at->format('M') }}</span>
				                        <span class="day">{{ $article->created_at->format('d') }}</span>
				                    </p>
				                </div>
				                <!-- post meta -->
				                <div class="meta group">
				                    <p class="categories"><span>In: <a href="{{ route('skazkiCat',['cat_alias'=>$article->category->alias]) }}" title="View all posts in {{ $article->category->title }}" rel="category tag">{{ $article->category->title }}</a></p>
				                </div>
				                <!-- post content -->
				                <div class="the_content single group">
				                    <p>{!! $article->text !!}</p>
				                </div>
				                <!-- <p class="tags">Tags: <a href="#" rel="tag">book</a>, <a href="#" rel="tag">css</a>, <a href="#" rel="tag">design</a>, <a href="#" rel="tag">inspiration</a></p> -->
				                <div class="clear"></div>
				            </div>
				           			            
				            @endif
				        </div>
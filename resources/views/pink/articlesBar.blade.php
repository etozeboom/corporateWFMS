
				            
				            <div class="widget-first widget recent-posts">
				           
				            @if($categorys)
				            <div class="left_menu">		
								<ul class="menul">
									@foreach($categorys as $category)
									
									<li class="p_menu"><a href="{{ route('skazkiCat',['cat_alias' => $category->alias]) }}">{{ $category->title }} </a>
										@if($category->id == 5)
											<ul class="v_menu">
											@foreach($zar as $z)
												<li><a href="{{ route('skazkiCat',['cat_alias' => $z->alias]) }}">{{ $z->title }}</a></li>
											@endforeach
											</ul>
										@endif
										@if($category->id == 8)
											<ul class="v_menu">
											@foreach($rus as $r)
												<li><a href="{{ route('skazkiCat',['cat_alias' => $r->alias]) }}">{{ $r->title }}</a></li>
											@endforeach
											</ul>
										@endif
									</li>
										
									@endforeach
								</ul>
				             </div>   
				            @endif
 
				            
				            
				        
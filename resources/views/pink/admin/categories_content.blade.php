@if($categories)
	<div id="content_page" class="content group">
				            <div class="hentry group">
								<h2>изменение раздела</h2>

								{!! Html::link(route('admin.catskazki.create'),'Добавить  материал',['class' => 'btn btn_the_salmon_dance_3']) !!}

				                <div class="short_table white">
				                    <table style="width: 100%" cellspacing="0" cellpadding="0">
				                        <thead>
				                            <tr>
				                                <th class="align_left">ID</th>
				                                <th>Заголовок</th>
				                                <th>Псевдоним</th>
				                            </tr>
				                        </thead>
				                        <tbody>
				                            
											@foreach($categories as $category)
											<tr>
				                                <td class="align_left">{{$category->id}}</td>
				                                <td class="align_left">{!! Html::link(route('admin.catskazki.edit',['id' => $category->id,'categories'=>$category->alias]),$category->title) !!}</td>
				                                <td>{{$category->alias}}</td>
				                             
											 </tr>	
											@endforeach	
				                           
				                        </tbody>
				                    </table>
				                </div>
								
								
                                
				                
				            </div>
				            <!-- START COMMENTS -->
				            <div id="comments">
				            </div>
				            <!-- END COMMENTS -->
				        </div>
@endif
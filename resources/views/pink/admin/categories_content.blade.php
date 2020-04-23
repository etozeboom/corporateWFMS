@if($categories)
	<div id="content-page" class="content group">
				            <div class="hentry group">
								<h2>изменение раздела</h2>

								{!! Html::link(route('admin.catskazki.create'),'Добавить  материал',['class' => 'btn btn-the-salmon-dance-3']) !!}

				                <div class="short-table white">
				                    <table style="width: 100%" cellspacing="0" cellpadding="0">
				                        <thead>
				                            <tr>
				                                <th class="align-left">ID</th>
				                                <th>Заголовок</th>
				                                <th>Псевдоним</th>
				                            </tr>
				                        </thead>
				                        <tbody>
				                            
											@foreach($categories as $category)
											<tr>
				                                <td class="align-left">{{$category->id}}</td>
				                                <td class="align-left">{!! Html::link(route('admin.catskazki.edit',['id' => $category->id,'categories'=>$category->alias]),$category->title) !!}</td>
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
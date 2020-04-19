@if($articles)
	<div id="content-page" class="content group">
				            <div class="hentry group">
								<h2>Добавленные статьи</h2>

								{!! Html::link(route('admin.skazki.create'),'Добавить  материал',['class' => 'btn btn-the-salmon-dance-3']) !!}

				                <div class="short-table white">
				                    <table style="width: 100%" cellspacing="0" cellpadding="0">
				                        <thead>
				                            <tr>
				                                <th class="align-left">ID</th>
				                                <th>Заголовок</th>
				                                <th>Текст</th>
				                                <th>Категория</th>
				                                <th>Псевдоним</th>
				                                <th>Дествие</th>
				                            </tr>
				                        </thead>
				                        <tbody>
				                            
											@foreach($articles as $article)
											<tr>
				                                <td class="align-left">{{$article->id}}</td>
				                                <td class="align-left">{!! Html::link(route('admin.skazki.edit',['id' => $article->id,'articles'=>$article->alias]),$article->title) !!}</td>
				                                <!-- <td class="align-left"><a href="{{route('admin.skazki.edit', ['id' => $article->id, 'article' => $article->alias])}}">{{$article->title}}</a></td> -->
				                                <td class="align-left">{{str_limit($article->text,200)}}</td>
				                                <td>{{$article->category->title}}</td>
				                                <td>{{$article->alias}}</td>
				                                <td>
												{!! Form::open(['url' => route('admin.skazki.destroy',['id' => $article->id, 'articles'=>$article->alias]),'class'=>'form-horizontal','method'=>'POST']) !!}
												    {{ method_field('DELETE') }}
												    {!! Form::button('Удалить', ['class' => 'btn btn-french-5','type'=>'submit']) !!}
												{!! Form::close() !!}
												</td>
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
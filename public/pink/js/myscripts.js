jQuery(document).ready(function($) {
	
	$('.commentlist li').each(function(i) {
		
		$(this).find('div.commentNumber').text('#' + (i + 1));
		
	});
	
	$('#commentform').on('click','#submit',function(e) {
		
		e.preventDefault();
		
		var comParent = $(this);
		
		$('.wrap_result').
					css('color','green').
					text('Сохранение комментария').
					fadeIn(500,function() {
						
						var data = $('#commentform').serializeArray();
						
						$.ajax({
							
							url:$('#commentform').attr('action'),
							data:data,
							headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
							type:'POST',
							datatype:'JSON',
							success: function(html) {
								if(html.error) {
									$('.wrap_result').css('color','red').append('<br /><strond>Ошибка: </strong>' + html.error.join('<br />'));
									$('.wrap_result').delay(2000).fadeOut(500);
								}
								else if(html.success) {
									$('.wrap_result')
													.append('<br /><strong>Сохранено!</strong>')
													.delay(2000)
													.fadeOut(500,function() {
														
														if(html.data.parent_id > 0) {
															comParent.parents('div#respond').prev().after('<ul class="children">' + html.comment + '</ul>');
														}
														else {
															if($.contains('#comments','ol.commentlist')) {
																$('ol.commentlist').append(html.comment);
															}
															else {
																
																$('#respond').before('<ol class="commentlist group">' + html.comment + '</ol>');
																
															}
														}
														
														
														
														
														$('#cancel-comment-reply-link').click();
													})
													
								}
								
								
							},
							error:function() {
								$('.wrap_result').css('color','red').append('<br /><strond>Ошибка: </strong>');
								$('.wrap_result').delay(2000).fadeOut(500, function() {
									$('#cancel-comment-reply-link').click();
								});
								
							}
							
						});
					});
		
	});

	$('#tableSkazki').DataTable(
		{
			language: {
				"processing": "Подождите...",
				"search": "Поиск:",
				"lengthMenu": "Показать _MENU_ записей",
				"info": "Записи с _START_ до _END_ из _TOTAL_ записей",
				"infoEmpty": "Записи с 0 до 0 из 0 записей",
				"infoFiltered": "(отфильтровано из _MAX_ записей)",
				"infoPostFix": "",
				"loadingRecords": "Загрузка записей...",
				"zeroRecords": "Записи отсутствуют.",
				"emptyTable": "В таблице отсутствуют данные",
				"paginate": {
				"first": "Первая",
				"previous": "Предыдущая",
				"next": "Следующая",
				"last": "Последняя"
				},
				"aria": {
				"sortAscending": ": активировать для сортировки столбца по возрастанию",
				"sortDescending": ": активировать для сортировки столбца по убыванию"
				}
			},
			stateSave: true
		}
	);


});
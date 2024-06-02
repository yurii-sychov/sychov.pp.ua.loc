function getRights() {
	const promise = $.ajax(
		{
			url: "/admin/users/get_rights",
			type: "post"
		});
	return promise;
}

const promise = getRights();
promise.then((data) => {
	rights = data.rights;
	dataTable(rights)
})


function dataTable(rights) {

	var icon_edit = rights.right_update == 1 ? '<a href="javascript:void(0);" class="text-success edit" data-handler="getDataForEdit" title="Редактировать"><i class="fas fa-edit"></i></a>' : '<a href="javascript:void(0);" class="text-secondary" title="Редактировать"><i class="fas fa-edit"></i></a>';
	var icon_view = '<a href="javascript:void(0);" class="text-primary view" data-handler="viewRow" title="Больше информации"><i class="fas fa-eye"></i></a>';
	var icon_delete = rights.right_delete == 1 ? '<a href="javascript:void(0);" class="text-danger edit" data-handler="deleteRow" title="Удалить"><i class="fas fa-trash-alt"></i></a>' : '<a href="javascript:void(0);" class="text-secondary" title="Удалить"><i class="fas fa-trash-alt"></i></a>';
	var select_checkbox = '<input type="checkbox" class="checkbox" ata-handler="selectCheckbox" />';

	var table = $("#DataTable").on("processing.dt", function (e, settings, processing) {
		if (processing == true) {
			$(".overlay").show();
		}
		else {
			$(".overlay").hide();
		}
	}).DataTable({
		"pagingType": "full_numbers",
		"ajax": {
			"url": "/admin/" + page + "/get_data",
			"type": "POST",
			"data": { "icon_edit": icon_edit, "icon_view": icon_view, "icon_delete": icon_delete, "select_checkbox": select_checkbox }
		},

		// DataTables - Features
		// "scrollX": true,
		"autoWidth": table_features.autoWidth === true ? table_features.autoWidth : false,
		"deferRender": table_features.deferRender === false ? table_features.deferRender : true,

		"info": table_features.info === false ? table_features.info : true,
		"stateSave": table_features.stateSave === true ? table_features.stateSave : false,
		"serverSide": table_features.serverSide === true ? table_features.serverSide : false,
		// "lengthChange": table_features.lengthChange === false ? table_features.lengthChange : true,
		// "ordering": table_features.ordering === false ? table_features.ordering : true,
		// "paging": table_features.paging === false ? table_features.paging : true,
		// "processing": table_features.processing === false ? table_features.processing : true,

		// DataTables - Options
		"dom": "<'row'<'col-sm-12 col-md-2 text-left'l><'col-sm-12 col-md-8 text-center'B><'col-sm-12 col-md-2 text-right'f>>" +
			"<'row'<'table-responsive'<'col-sm-12'tr>>>" +
			"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 text-center'p>>",
		"pageLength": table_options.pageLength ? table_options.pageLength : 5,
		"lengthMenu": table_options.lengthMenu ? table_options.lengthMenu : [[5, 10, 25, 50, 100, -1], ["Показать 5 записей", "Показать 10 записей", "Показать 25 записей", "Показать 50 записей", "Показать 100 записей", "Показать все записи"]],


		// DataTables - Internationalisation
		"language": {
			"infoFiltered": "(отфильтровано с _MAX_ строк)",
			"paginate": {
				"first": '«',
				"previous": '‹',
				"next": '›',
				"last": '»'
			},
			"info": "Показана с _START_ по _END_ запись из _TOTAL_",
			"search": "_INPUT_",
			"searchPlaceholder": "Поиск...",
			"lengthMenu": "_MENU_ ",
			"zeroRecords": "Нет записей для отображения",
			"emptyTable": "Данные отсутствуют в таблице"


		},

		buttons: {
			dom: {
				container: {
					tag: 'aside'
				},
			},
			"buttons": [
				// {
				// 	extend: 'colvisRestore',
				// 	text: 'Восстановить колонки'
				// },
				{
					extend: 'excel',
					text: '<i class="fas fa-file-excel"></i>',
					className: 'mb-2 btn-success',
					exportOptions: {
						columns: ':not(".edit, .view, .delete")' + ':visible'
					},
					attr: {
						id: 'ButtonExcel',
						title: 'Экспорт в Excel'
					},
					init: function (e, dt, node, config) {
						dt.removeClass('btn-secondary')
					}
				},
				{
					extend: 'csv',
					text: '<i class="fas fa-file-csv"></i>',
					className: 'mb-2 btn-success',
					exportOptions: {
						columns: ':not(".edit, .view, .delete")' + ':visible'
					},
					attr: {
						id: 'ButtonCsv',
						title: 'Экспорт в CSV'
					},
					init: function (e, dt, node, config) {
						dt.removeClass('btn-secondary')
					}
				},
				{
					extend: 'pdf',
					text: '<i class="fas fa-file-pdf"></i>',
					className: 'mb-2 btn-danger',
					orientation: 'landscape',
					pageSize: 'LEGAL',
					download: 'open',
					exportOptions: {
						columns: ':not(".edit, .view, .delete")' + ':visible'
					},
					attr: {
						id: 'ButtonPdf',
						title: 'Экспорт в PDF'
					},
					init: function (e, dt, node, config) {
						dt.removeClass('btn-secondary')
					}
				},
				{
					extend: 'colvis',
					text: '<i class="fas fa-list"></i>',
					className: 'mb-2 btn-primary',
					attr: {
						id: 'ButtonColvis',
						title: 'Управление колонками'
					},
					collectionLayout: 'fixed four-column',
					columns: ':not(".noVis")',
					init: function (e, dt, node, config) {
						dt.removeClass('btn-secondary')
					},
					columnText: function (dt, idx, title) {
						if (dt.settings()[0].aoColumns[idx].name) {
							return dt.settings()[0].aoColumns[idx].name;
						}
						else {
							return dt.settings()[0].aoColumns[idx].title;
						}
					}
				},
				{
					extend: 'copy',
					text: '<i class="fas fa-copy"></i>',
					className: 'mb-2 btn-warning',
					exportOptions: {
						columns: ':not(".edit, .view, .delete")'
					},
					attr: {
						id: 'ButtonCopy',
						title: 'Копировать'
					},
					init: function (e, dt, node, config) {
						dt.removeClass('btn-secondary')
					}
				},
				{
					extend: 'print',
					text: '<i class="fas fa-print"></i>',
					className: 'mb-2 btn btn-danger',
					attr: {
						id: 'ButtonPrint',
						title: 'Печатать'
					},
					init: function (e, dt, node, config) {
						dt.removeClass('btn-secondary')
					},
					// autoPrint: false,
					exportOptions: {
						columns: ':visible'
						// format: {
						// 	header: function ( data, columnIdx, th) {
						// 		return columnIdx +': '+ data;
						// 	}
						// }
					}
				},
				{
					text: '<i class="fas fa-sync-alt"></i>',
					className: 'mb-2 btn-info',
					attr: {
						id: 'ButtonRefresh',
						title: 'Обновить'
					},
					action: function (e, dt, node, config) {
						dt.ajax.reload();
					},
					init: function (e, dt, node, config) {
						dt.removeClass('btn-secondary')
					}
				},
				// {
				// 	text: 'Изменить всё',
				// 	className: 'mb-2',
				// 	attr:  {
				// 		'id': 'updateAllRows',
				// 		'type': 'submit',
				// 		'disabled': 'disabled',
				// 	}
				// },
			]
		},

		// DataTables - Columns
		"columns": columns_options,

		// DataTables - Callbacks
		"createdRow": function (row, data, dataIndex, cells) {
			// console.log('createdRow');
			$(row).attr('data-id', data.id);
			$(row).css('cursor', 'pointer');
			typeof (createdRow) === 'function' ? createdRow(row, data, dataIndex, cells) : null;
		},

		"drawCallback": function (settings) {
			// console.log('drawCallback', settings);
			// var api = this.api();
			typeof (drawCallback) === 'function' ? drawCallback(settings) : null;
		},

		"footerCallback": function (tfoot, data, start, end, display) {
			// console.log('footerCallback');
			typeof (footerCallback) === 'function' ? footerCallback(tfoot, data, start, end, display) : null;
		},

		"headerCallback": function (thead, data, start, end, display) {
			// console.log('headerCallback');
			typeof (headerCallback) === 'function' ? headerCallback(thead, data, start, end, display) : null;
		},

		"initComplete": function (settings, json) {
			$('#DataTable_wrapper .dt-buttons').removeClass('btn-group');
			// console.log('initComplete');
			settingColumnsVisible(settings);
			typeof (initComplete) === 'function' ? initComplete(settings, json) : null;
		},

		"rowCallback": function (row, data) {
			// console.log('rowCallback');
			typeof (rowCallback) === 'function' ? rowCallback(row, data) : null;
		},

		"stateLoadParams": function (settings, data) {
			// console.log('stateLoadParams');
			typeof (stateLoadParams) === 'function' ? stateLoadParams(settings, data) : null;
		}
	});

	window.table = table;

	let buttons = table.buttons();
	for (let i = 0; i < buttons.length; i++) {
		if ($(buttons[i].node).hasClass('buttons-columnVisibility')) {
			$(buttons[i].node).parent().css({ 'padding': '10px' });
			$(buttons[i].node).removeClass('dt-button');
			$(buttons[i].node).addClass('mb-1 btn btn-success btn-block text-center');

		}
	}

	// Сортирорвка по умолчанию
	if (table.state() == null) {
		table.column(".order-default").order("asc").draw();
	}
}

// dataTable();

function settingColumnsVisible(settings) {
	$('#CardFields').parents('.row').show();
	for (i = 0; i < settings.aoColumns.length; i++) {
		// console.log(settings.aoColumns[i].name); 
		if (settings.aoColumns[i].bVisible === true) {
			var btn_class = 'btn-primary';
		}
		else {
			var btn_class = 'btn-light';
		}
		$('#CardBodyFields div div').append('<button type="button" class="btn ' + btn_class + ' mr-2 mt-2" data-column="' + i + '" data-handler="visibleColumn">' + (settings.aoColumns[i].name === undefined ? settings.aoColumns[i].title : settings.aoColumns[i].name) + '</button>');
	}
}

function visibleColumn(event) {
	if (event.currentTarget.classList.contains('btn-primary') === true) {
		event.currentTarget.classList.remove('btn-primary');
		event.currentTarget.classList.add('btn-light');
	}
	else {
		event.currentTarget.classList.remove('btn-light');
		event.currentTarget.classList.add('btn-primary');
	}
	var column = table.column(event.currentTarget.dataset.column);
	column.visible(!column.visible());
}

/**
* [viewRow Открытие подстроки с большим количеством информацией]
* @param  {[type]} event [description]
* @return {[type]}       [description]
*/
function viewRow(event) {
	var tr = $(event.currentTarget).closest("tr");
	var row = table.row(tr);

	if (row.child.isShown()) {
		// This row is already open - close it
		row.child.hide();
		tr.removeClass("shown");
	}
	else {
		// Open this row
		// $("tr.child").prev().removeClass("shown");
		// $("tr.child").remove();
		row.child(format(row.data())).show();
		// $(table.row( tr ).node()).next().addClass("child");
		tr.addClass("shown");
	}
}

/**
* [refreshTable Обновление данных]
* @param  {[type]} event [description]
* @return {[type]}       [description]
*/
function refreshTable(event) {
	table.ajax.reload(function (data) {

	}, false);
}

function createRow(event) {
	var form = $("#Form").serializeArray();

	$.ajax(
		{
			url: "/admin/" + page + "/create",
			type: "post",
			data: form,
			success: function (data, textStatus, jqXHR) {
				if (data.status == 'SUCCESS') {
					toastr.success(data.message).css({ "width": "auto", "max-width": "100em" });
					table.ajax.reload(function (data) { }, false);
					$("#Form")[0].reset();
				}
				if (data.status == 'ERROR') {
					toastr.error(data.message).css({ "width": "auto", "max-width": "100em" });
					$("[name=" + data.name + "]").focus()//.addClass("is-invalid");  
				}
			}
		});
}

function editRow(event) {

	var id = $(event.currentTarget).parents(".card").find("form [name='id']").val();
	var form = $("#Form").serializeArray();
	$.ajax({
		url: "/admin/" + page + "/update",
		type: "post",
		data: form,
		success: function (data, textStatus, jqXHR) {
			if (data.status == 'SUCCESS') {
				toastr.success(data.message).css({ "width": "auto", "max-width": "100em" });
				table.ajax.reload(function (data) { }, false);
			}
			if (data.status == 'ERROR') {
				toastr.error(data.message).css({ "width": "auto", "max-width": "100em" });
				$("[name=" + data.name + "]").focus();
			}
		}
	});
}

function deleteRow(event) {
	if (confirm("Realy delete?") === false) {
		return;
	}
	var id = $(event.currentTarget).parents("tr").data("id");
	$.ajax({
		url: "/admin/" + page + "/delete",
		type: "post",
		data: { "id": id },
		success: function (data, textStatus, jqXHR) {
			if (data.status == 'SUCCESS') {
				toastr.success(data.message).css({ "width": "auto", "max-width": "100em" });
				collapseForm();
				$(event.currentTarget).parents("tr").remove();
				// table.ajax.reload(function(data) {}, false);
			}
			if (data.status == 'ERROR') {
				toastr.error(data.message).css({ "width": "auto", "max-width": "100em" });
			}
		}
	});
}

function getDataForEdit(event) {
	var id = $(event.currentTarget).parents("tr").data("id");
	$.ajax({
		url: "/admin/" + page + "/get_data_for_update",
		type: "post",
		data: { "id": id },
		success: function (data, textStatus, jqXHR) {
			if (data.status == 'SUCCESS') {
				$("#Form").find("[name='image']").closest(".form-group").show();
				$("#Form").parents(".card").removeClass("card-primary").addClass("card-success");
				$("#Form").parents(".card").find(".card-footer button[data-handler='editRow'], .card-footer button[data-handler='clearForm']").show();
				$("#Form").parents(".card").find(".card-footer button[data-handler='createRow']").hide();
				$("#Form").parents(".card").removeClass("collapsed-card");
				$("#Form").parents(".card .card-body").css("display", "block").next().css("display", "block");
				$("#Form").parents(".card").find(".card-header .fa-plus").removeClass("fa-plus").addClass("fa-minus");
				$("#Form").find("[name='id']").remove();

				fillForm(data.data);
			}
			if (data.status == 'ERROR') {
			}
		}
	});
}

function clearForm(event) {
	collapseForm();
}

function uploadImage(event) {
	formData = new FormData($("#Form").get(0));
	console.log(formData)
	$.ajax(
		{
			url: "/admin/" + page + "/upload_file",
			type: "POST",
			contentType: false, // важно - убираем форматирование данных по умолчанию
			processData: false, // важно - убираем преобразование строк по умолчанию
			dataType: "json",
			data: formData,
			success: function (data, textStatus, jqXHR) {
				if (data.status == 'SUCCESS') {
					toastr.success(data.message).css({ "width": "auto", "max-width": "100em" });;
					table.ajax.reload(function (data) { }, false);
				}
				if (data.status == 'ERROR') {
					toastr.error(data.message).css({ "width": "auto", "max-width": "100em" });;
				}
			}
		});
}

function collapseForm(event) {
	$("#Form").find("[name='image']").closest(".form-group").hide();
	$("#Form").parents(".card").removeClass("card-success").addClass("card-primary");
	$("#Form").parents(".card").find(".card-footer button[data-handler='editRow'], .card-footer button[data-handler='clearForm']").hide();
	$("#Form").parents(".card").find(".card-footer button[data-handler='createRow']").show();
	$("#Form").parents(".card").addClass("collapsed-card");
	$("#Form").parents(".card .card-body").css("display", "none").next().css("display", "none");
	$("#Form").parents(".card").find(".card-header .fa-minus").removeClass("fa-minus").addClass("fa-plus");
	$("#Form").find("[name='id']").remove();
	$("#Form")[0].reset();
}

function expandForm(event) {

}

function changeField(event) {
	const id = $(event.currentTarget).parents("tr").data("id");
	const name_field = $(event.currentTarget).data("name_field");
	const status = $(event.currentTarget).data("status");
	$.ajax({
		url: "/admin/" + page + "/change_field",
		type: "post",
		data: { "id": id, "name_field": name_field, "status": status },
		success: function (data, textStatus, jqXHR) {
			if (data.status == 'SUCCESS') {
				toastr.success(data.message).css({ "width": "auto", "max-width": "100em" });
				table.ajax.reload(function (data) {

				}, false);
			}
			if (data.status == 'ERROR') {
				toastr.error(data.message).css({ "width": "auto", "max-width": "100em" });
			}
		}
	});
}

function createField(event) {
	$(event.currentTarget).removeAttr('data-handler');
	const type = event.currentTarget.dataset.type;
	const value = String(event.currentTarget.dataset.value);
	const maxlength = String(event.currentTarget.dataset.maxlength);

	if (type === 'text') {
		$(event.currentTarget).html('<input type="' + type + '" class="form-control" value="' + value + '" maxlength="' + maxlength + '" /><i class=\"fas fa-check text-success pr-2\" data-handler="updateField"></i><i class=\"fas fa-times text-danger pr-2\" data-handler="cancelUpdateField"></i>');
	}
	if (type === 'number') {
		$(event.currentTarget).html('<input type="' + type + '" class="form-control" value="' + value + '" maxlength="' + maxlength + '" min="1" max="12" /><i class=\"fas fa-check text-success pr-2\" data-handler="updateField"></i><i class=\"fas fa-times text-danger pr-2\" data-handler="cancelUpdateField"></i>');
	}
	if (type === 'email') {
		$(event.currentTarget).html('<input type="' + type + '" class="form-control" value="' + value + '" maxlength="' + maxlength + '" /><i class=\"fas fa-check text-success pr-2\" data-handler="updateField"></i><i class=\"fas fa-times text-danger pr-2\" data-handler="cancelUpdateField"></i>');
	}
	if (type === 'select') {
		$(event.currentTarget).html('<select class="form-control"></select><i class=\"fas fa-check text-success pr-2\" data-handler="updateField"></i><i class=\"fas fa-times text-danger pr-2\" data-handler="cancelUpdateField"></i>');
	}

	$('#DataTable').find('td.datetimepicker input').datetimepicker({
		timepicker: false,
		format: 'Y-m-d',
	});
}

function updateField(event) {
	const id = $(event.currentTarget).parents('tr').data('id');
	const value = $(event.currentTarget).prev().val();
	const name_field = $(event.currentTarget).parents('td').data('name');

	$.ajax({
		url: "/admin/" + page + "/change_field_text",
		type: "post",
		data: { "id": id, "name_field": name_field, "value": value },
		success: function (data, textStatus, jqXHR) {
			if (data.status == 'SUCCESS') {
				toastr.success(data.message).css({ "width": "auto", "max-width": "100em" });
				table.ajax.reload(function (data) {

				}, false);
				$(event.currentTarget).parents('td').attr('data-value', value);
				// Пересчитываем данные в таблице
				// data_calculation(event);
				$(event.currentTarget).parents('td').attr('data-handler', 'createField');
				$(event.currentTarget).parents('td').html('<strong>' + value + '</strong>');
				$(event.currentTarget).parents('td').attr({ 'data-handler': 'createField' });

			}
			if (data.status == 'ERROR') {
				toastr.error(data.message).css({ "width": "auto", "max-width": "100em" });
			}
		}
	});
}

function cancelUpdateField(event) {
	const value = $(event.currentTarget).parents('td').data('value');
	// console.log("cancel", value)
	$(event.currentTarget).parents('td').attr('data-handler', 'createField');
	$(event.currentTarget).parents('td').html('<strong>' + value + '</strong>');
}

function updateModeAllRows(event) {
	$('#updateAllRows').attr('data-handler', 'updateAllRows').removeAttr('disabled');
	const td = $('#DataTable').find('[data-type="text"], [data-type="select"], [data-type="email"], [data-type="number"]');
	td.removeAttr('data-handler');
	for (i = 0; i < td.length; i++) {
		const id = $(td[i]).parents('tr').data('id');
		const value = td[i].dataset.value;
		const type = td[i].dataset.type;
		const maxlength = td[i].dataset.maxlength;
		const name = td[i].dataset.name;

		if (type === 'text') {
			$(td[i]).html('<input type="' + type + '" class="form-control" value="' + value + '" maxlength="' + maxlength + '" />');
		}
		if (type === 'number') {
			$(td[i]).html('<input type="' + type + '" class="form-control" value="' + value + '" maxlength="' + maxlength + '" min="1" max="12" />');
		}
		if (type === 'email') {
			$(td[i]).html('<input type="' + type + '" class="form-control" value="' + value + '" maxlength="' + maxlength + '" />');
		}
		if (type === 'select') {
			$(td[i]).html('<select class="form-control"></select>');
		}
	}
	$('#DataTable').find('td.datetimepicker input').datetimepicker({
		timepicker: false,
		format: 'Y-m-d',
	});
}

function updateAllRows(event) {
	const data = getDataForUpdateAllRows();
	sendDataForUpdateAllRows(data);
}

function sendDataForUpdateAllRows(data) {
	$.ajax({
		url: "/admin/" + page + "/update_all_rows",
		type: "post",
		data: { 'data': data },
		success: function (data, textStatus, jqXHR) {
			if (data.status == 'SUCCESS') {
				toastr.success(data.message);
				$('#updateAllRows').removeAttr('data-handler').attr('disabled', 'disabled');
				table.ajax.reload(function (data) {

				}, false);
			}
			if (data.status == 'ERROR') {
				toastr.error(data.message);
			}
		}
	});
}






// Формируем данные для таблицы

// Название страницы
const page = 'logs';

// DataTables - Features
// Добавляем значения если хотим изменить характеристики таблицы
const table_features = {
	"stateSave": true,
	"serverSide": false,
};

// DataTables - Options
// Добавляем значения если хотим изменить опции таблицы
const table_options = {
	"pageLength": 5,
};

// DataTables - Columns
// Формируем колонки для таблиц
const columns_options = [
	{
		data: "id",
		title: "#",
		name: "ID",
		orderable: true,
		searchable: true,
		visible: true,
		width: "5%",
		className: "id text-center noVis",
	},

	{
		data: "surname",
		title: "Фамилия",
		name: "Фамилия",
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "surname order-default",
	},

	{
		data: "name",
		title: "Имя",
		name: "Имя",
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "name",
	},

	{
		data: "patronymic",
		title: "Отчество",
		name: "Отчество",
		orderable: true,
		searchable: true,
		visible: false,
		width: "auto",
		className: "patronymic",
	},

	{
		data: "link",
		title: "Страница",
		name: "Страница",
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "link",
	},

	{
		data: "action",
		title: "Действие",
		name: "Действие",
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "action",
	},

	{
		data: "short_action",
		title: "Действие",
		name: "Действие",
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "short_action text-center",
		createdCell: function (td, cellData, rowData, row, col) {
			if (cellData === 'select') {
				$(td).html('<span class="badge badge-warning">Select</span>');
			}
			else if (cellData === 'create') {
				$(td).html('<span class="badge badge-primary">Create</span>');
			}
			else if (cellData === 'update') {
				$(td).html('<span class="badge badge-success">Update</span>');
			}
			else if (cellData === 'delete') {
				$(td).html('<span class="badge badge-danger">Delete</span>');
			}
		},
	},

	{
		data: "data",
		title: "Данные",
		name: "Данные",
		orderable: true,
		searchable: true,
		visible: false,
		width: "20%",
		className: "data noVis",
	},

	{
		data: "browser",
		title: "Браузер",
		name: "Браузер",
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "browser",
	},

	{
		data: "ip",
		title: "IP адрес",
		name: "IP адрес",
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "ip",
	},

	{
		data: "time",
		title: "Дата и время",
		name: "Дата и время",
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "time text-center",
	},

	{
		data: "importance",
		title: "Важность",
		name: "Важность",
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "importance text-center",
		createdCell: function (td, cellData, rowData, row, col) {
			if (cellData == 0) {
				$(td).html('<span class="badge badge-success">Низкий</span>');
			}
			else if (cellData == 1) {
				$(td).html('<span class="badge badge-warning">Средний</span>');
			}
			else if (cellData == 2) {
				$(td).html('<span class="badge badge-danger">Высокий</span>');
			}
		},
	},

	// {
	// 	data: "edit",
	// 	title: "<i class=\"fas fa-edit\"></i>",
	// 	name: "Редактировать <i class=\"fas fa-edit\"></i>",
	// 	orderable: false,
	// 	searchable: false,
	// 	visible: true,
	// 	width: "5%",
	// 	className: "edit text-center noVis",
	// },

	{
		data: "view",
		title: "<i class=\"fas fa-eye\"></i>",
		name: "Просмотреть <i class=\"fas fa-eye\"></i>",
		orderable: false,
		searchable: false,
		visible: true,
		width: "5%",
		className: "view text-center noVis",
	},

	// {
	// 	data: "delete",
	// 	title: "<i class=\"fas fa-trash-alt\"></i>",
	// 	name: "Удалить <i class=\"fas fa-trash-alt\"></i>",
	// 	orderable: false,
	// 	searchable: false,
	// 	visible: true,
	// 	width: "5%",
	// 	className: "delete text-center noVis",
	// },	
];

// function fillForm(data) {
// 	// $("#Form").parents(".card").find(".card-header .card-title").text("Форма редактирования данных по электросчётчику");
// 	$("#Form").prepend("<input name="+'id'+" value="+data.id+" type="+'hidden'+">");
// 	$("[name='user']").val(data.user_id);
// 	$("[name='page']").val(data.page_id);
// 	$("[name='right_create']").prop("checked", data.right_create == 1 ? true : false);
// 	$("[name='right_read']").prop("checked", data.right_read == 1 ? true : false);
// 	$("[name='right_update']").prop("checked", data.right_update == 1 ? true : false);
// 	$("[name='right_delete']").prop("checked", data.right_delete == 1 ? true : false);
// }

// Форматирование открытой подстроки
function format (d) {
	// `d` is the original data object for the row
	return '<h3 class="text-center">Больше информации</h3>'+
	'<table class="table table-bordered table-hover">'+
		'<tr>'+
			'<th>Данные</th>'+
			'<td>'+d.data+'</td>'+
		'</tr>'+
	'</table>';
}

// function stateLoadParams(settings, data) {
// 	for(i=0; i<settings.aoColumns.length; i++) {
		
// 		if (settings.aoColumns[i].data === 'filial') {
// 			$('#FilterFilial').val(data.columns[i].search.search);
// 		}
// 		if (settings.aoColumns[i].data === 'stantion') {
// 			$('#FilterStantion').val(data.columns[i].search.search);
// 		}
// 	}
// }

// function filterFilial(event) {
// 	table.columns('.filial').search(event.target.value).draw();
// }

// function filterStantion(event) {
// 	table.columns('.stantion').search(event.target.value).draw();
// }

// function resetFilters(event) {
// 	$('#FilterFilial').val('');
// 	table.columns('.filial').search('').draw();
// 	$('#FilterStantion').val('');
// 	table.columns('.stantion').search('').draw();
// 	$('#FilterTypeNeeds').val('');
// 	table.columns('.type_needs').search('').draw(); 
// }
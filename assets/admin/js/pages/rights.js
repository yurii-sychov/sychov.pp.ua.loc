// Формируем данные для таблицы

// Название страницы
const page = 'rights';

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
		className: "surname",
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
		data: "page_name",
		title: "Страница",
		name: "Страница",
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "page_name",
	},

	{
		data: "right_create",
		title: "Создавать",
		name: "Создавать",
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "right_create text-center",
	},

	{
		data: "right_read",
		title: "Читать",
		name: "Читать",
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "right_read text-center",
	},

	{
		data: "right_update",
		title: "Обновлять",
		name: "Обновлять",
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "right_update text-center",
	},

	{
		data: "right_delete",
		title: "Удалять",
		name: "Удалять",
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "right_delete text-center",
	},

	{
		data: "created_at",
		title: "Дата создания записи",
		name: "Дата создания записи",
		orderable: true,
		searchable: true,
		visible: false,
		width: "auto",
		className: "created_at",
	},

	{
		data: "created_by",
		title: "Кто создал запись",
		name: "Кто создал запись",
		orderable: true,
		searchable: true,
		visible: false,
		width: "auto",
		className: "created_by",
	},

	{
		data: "updated_at",
		title: "Дата изменения записи",
		name: "Дата изменения записи",
		orderable: true,
		searchable: true,
		visible: false,
		width: "auto",
		className: "updated_at",
	},

	{
		data: "updated_by",
		title: "Кто изменил запись",
		name: "Кто изменил запись",
		orderable: true,
		searchable: true,
		visible: false,
		width: "auto",
		className: "updated_by",
	},

	{
		data: "edit",
		title: "<i class=\"fas fa-edit\"></i>",
		name: "Редактировать <i class=\"fas fa-edit\"></i>",
		orderable: false,
		searchable: false,
		visible: true,
		width: "5%",
		className: "edit text-center noVis",
	},

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

	{
		data: "delete",
		title: "<i class=\"fas fa-trash-alt\"></i>",
		name: "Удалить <i class=\"fas fa-trash-alt\"></i>",
		orderable: false,
		searchable: false,
		visible: true,
		width: "5%",
		className: "delete text-center noVis",
	},	
];

function fillForm(data) {
	// $("#Form").parents(".card").find(".card-header .card-title").text("Форма редактирования данных по электросчётчику");
	$("#Form").prepend("<input name="+'id'+" value="+data.id+" type="+'hidden'+">");
	$("[name='user']").val(data.user_id);
	$("[name='page']").val(data.page_id);
	$("[name='right_create']").prop("checked", data.right_create == 1 ? true : false);
	$("[name='right_read']").prop("checked", data.right_read == 1 ? true : false);
	$("[name='right_update']").prop("checked", data.right_update == 1 ? true : false);
	$("[name='right_delete']").prop("checked", data.right_delete == 1 ? true : false);
}

// Форматирование открытой подстроки
function format (d) {
	// `d` is the original data object for the row
	return '<h3 class="text-center">Больше информации об электросчётчике</h3>'+
	'<table class="table table-bordered table-hover">'+
		'<tr>'+
			'<th>Подразделение</th>'+
			'<td>'+d.filial+'</td>'+
		'</tr>'+
		'<tr>'+
			'<th>Подстанция</th>'+
			'<td>'+d.stantion+'</td>'+
		'</tr>'+
		'<tr>'+
			'<th>Наименование здания или сооружения</th>'+
			'<td>'+d.name+'</td>'+
		'</tr>'+
		'<tr>'+
			'<th>Площадь здания или сооружения</th>'+
			'<td>'+d.square+'</td>'+
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

function resetFilters(event) {
	$('#FilterFilial').val('');
	table.columns('.filial').search('').draw();
	$('#FilterStantion').val('');
	table.columns('.stantion').search('').draw();
	$('#FilterTypeNeeds').val('');
	table.columns('.type_needs').search('').draw(); 
}

// $(function () {
// 	$('body .summernote').summernote({
// 	    height: 150,
// 	})
// });
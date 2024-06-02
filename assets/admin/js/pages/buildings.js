// Формируем данные для таблицы

// Название страницы
const page = 'buildings';

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
		data: "filial",
		title: "Подразделение",
		name: 'Подразделение',
		orderable: true,
		searchable: true,
		visible: false,
		width: "auto",
		className: "filial select",
	},

	{
		data: "stantion",
		title: "Подстанция",
		name: 'Подстанция',
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "stantion input",
	},

	{
		data: "name",
		title: "Наименование здания или сооружения",
		name: 'Наименование здания или сооружения',
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "name",
	},

	{
		data: "square",
		title: "Площадь здания или сооружения",
		name: 'Площадь здания или сооружения',
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "square",
	},

	{
		data: "created_at",
		title: "Дата создания записи",
		name: 'Дата создания записи',
		orderable: true,
		searchable: true,
		visible: false,
		width: "auto",
		className: "created_at",
	},

	{
		data: "created_by",
		title: "Кто создал запись",
		name: 'Кто создал запись',
		orderable: true,
		searchable: true,
		visible: false,
		width: "auto",
		className: "created_by",
	},

	{
		data: "updated_at",
		title: "Дата изменения записи",
		name: 'Дата изменения записи',
		orderable: true,
		searchable: true,
		visible: false,
		width: "auto",
		className: "updated_at",
	},

	{
		data: "updated_by",
		title: "Кто изменил запись",
		name: 'Кто изменил запись',
		orderable: true,
		searchable: true,
		visible: false,
		width: "auto",
		className: "updated_by",
	},

	{
		data: "edit",
		title: "<i class=\"fas fa-edit\"></i>",
		name: 'Редактировать <i class=\"fas fa-edit\"></i>',
		orderable: false,
		searchable: false,
		visible: true,
		width: "5%",
		className: "edit text-center noVis",
	},

	{
		data: "view",
		title: "<i class=\"fas fa-eye\"></i>",
		name: 'Просмотреть <i class=\"fas fa-eye\"></i>',
		orderable: false,
		searchable: false,
		visible: true,
		width: "5%",
		className: "view text-center noVis",
	},

	{
		data: "delete",
		title: "<i class=\"fas fa-trash-alt\"></i>",
		name: 'Удалить <i class=\"fas fa-trash-alt\"></i>',
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
	$("[name='filial']").val(data.filial_id);
	$("[name='stantion']").val(data.stantion_id);
	$("[name='name']").val(data.name);
	$("[name='square']").val(data.square);
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

function stateLoadParams(settings, data) {
	for(i=0; i<settings.aoColumns.length; i++) {
		
		if (settings.aoColumns[i].data === 'filial') {
			$('#FilterFilial').val(data.columns[i].search.search);
		}
		if (settings.aoColumns[i].data === 'stantion') {
			$('#FilterStantion').val(data.columns[i].search.search);
		}
	}
}

function filterFilial(event) {
	table.columns('.filial').search(event.target.value).draw();
}

function filterStantion(event) {
	table.columns('.stantion').search(event.target.value).draw();
}

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
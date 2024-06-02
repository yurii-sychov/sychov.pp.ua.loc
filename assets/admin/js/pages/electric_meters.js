// Формируем данные для таблицы

// Название страницы
const page = 'electric_meters';

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
		data: "type",
		title: "Тип",
		name: 'Тип',
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "type",
	},

	{
		data: "factory_number",
		title: "Заводской №",
		name: 'Заводской №',
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "factory-number",
	},

	{
		data: "year_made",
		title: "Год выпуска",
		name: 'Год выпуска',
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "year_made",
	},

	{
		data: "connection",
		title: "Присоединение",
		name: 'Присоединение',
		orderable: true,
		searchable: true,
		visible: false,
		width: "auto",
		className: "connection",
	},

	{
		data: "installation_location",
		title: "Место установки",
		name: 'Место установки',
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "installation_location",
	},

	{
		data: "coefficient",
		title: "Коэффициент",
		name: 'Коэффициент',
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "coefficient",
	},

	{
		data: "type_needs",
		title: "Тип нужд",
		name: 'Тип нужд',
		orderable: true,
		searchable: true,
		visible: false,
		width: "auto",
		className: "type_needs",
		createdCell: function (td, cellData, rowData, row, col) {
			if (cellData == 1) {
				$(td).html('Собственные нужды');
			}
			else {
				$(td).html('Хозяйственные нужды');
			}
		},
	},

	{
		data: "image",
		title: "<div style=\"display: none;\">Картинка</div><i class=\"fas fa-image\"></i>",
		orderable: false,
		seachable: false,
		visible: true,
		width: "5%",
		className: "image text-center",
		createdCell: function (td, cellData, rowData, row, col) {
			if (cellData === '') {
				$(td).html('<a href="/assets/admin/images/avatar.png" target="_blank"><img src="/assets/admin/images/avatar.png" width="30" height="30" /></a>');
			}
			else {
				$(td).html('<a href="/assets/admin/uploads/'+page+'/'+cellData+'" target="_blank"><img src="/assets/admin/uploads/'+page+'/'+cellData+'" width="30" height="30" /></a>');
			}
		},

	},

	{
		data: "status",
		title: "<div style=\"display: none;\">Статус</div><i class=\"fas fa-check\">",
		name: 'Статус <i class=\"fas fa-check\">',
		orderable: false,
		seachable: true,
		visible: true,
		width: "5%",
		className: "status text-center",
		createdCell: function (td, cellData, rowData, row, col) {
			if (cellData == 1) {
				const icon = rights.right_update == 1
				? 
				'<i class="fas fa-check text-success" style="cursor:pointer" data-handler="changeField" data-name_field="status" data-status="'+cellData+'" title="Статус"></i>'
				:
				'<i class="fas fa-check text-success" style="cursor:pointer" title="Статус"></i>'
				$(td).html(icon);
			}
			else {
				const icon = rights.right_update == 1
				?
				'<i class="fas fa-check text-danger" style="cursor:pointer" data-handler="changeField" data-name_field="status" data-status="'+cellData+'" title="Статус"></i>'
				:
				'<i class="fas fa-check text-danger" style="cursor:pointer" title="Статус"></i>'
				$(td).html(icon);
			}
		},
	},

	{
		data: "history",
		title: "История электросчётчика",
		name: 'История электросчётчика',
		orderable: false,
		searchable: false,
		visible: false,
		width: "auto",
		className: "history noVis",
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
	$("[name='type']").val(data.type);
	$("[name='factory_number']").val(data.factory_number);
	$("[name='year_made']").val(data.year_made);
	$("[name='connection']").val(data.connection);
	$("[name='installation_location']").val(data.installation_location);
	$("[name='coefficient']").val(data.coefficient);
	$("[name='type_needs']").val(data.type_needs);
	$("[name='status']").prop("checked", data.status == 1 ? true : false);
	$("[name='history']").val(data.history);
	$(".note-editable").html(data.history);
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
			'<th>Тип</th>'+
			'<td>'+d.type+'</td>'+
		'</tr>'+
		'<tr>'+
			'<th>Заводской №</th>'+
			'<td>'+d.factory_number+'</td>'+
		'</tr>'+
		'<tr>'+
			'<th>Год выпуска</th>'+
			'<td>'+d.year_made+'</td>'+
		'</tr>'+
		'<tr>'+
			'<th>Присоединение</th>'+
			'<td>'+d.connection+'</td>'+
		'</tr>'+
		'<tr>'+
			'<th>Местоустановки</th>'+
			'<td>'+d.installation_location+'</td>'+
		'</tr>'+
		'<tr>'+
			'<th>Коэффициент</th>'+
			'<td>'+d.coefficient+'</td>'+
		'</tr>'+
		'<tr>'+
			'<th>Тип нужд</th>'+
			'<td>'+d.type_needs+'</td>'+
		'</tr>'+
		'<tr>'+
			'<th>Статус</th>'+
			'<td>'+d.status+'</td>'+
		'</tr>'+
		'<tr>'+
			'<th>История</th>'+
			'<td>'+d.history+'</td>'+
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
		if (settings.aoColumns[i].data === 'type_needs') {
			$('#FilterTypeNeeds').val(data.columns[i].search.search);
		}
	}
}

function filterFilial(event) {
	table.columns('.filial').search(event.target.value).draw();
}

function filterStantion(event) {
	table.columns('.stantion').search(event.target.value).draw();
}

function filterTypeNeeds(event) {
	table.columns('.type_needs').search(event.target.value).draw();
}

function resetFilters(event) {
	$('#FilterFilial').val('');
	table.columns('.filial').search('').draw();
	$('#FilterStantion').val('');
	table.columns('.stantion').search('').draw();
	$('#FilterTypeNeeds').val('');
	table.columns('.type_needs').search('').draw(); 
}

$(function () {
	$('body .summernote').summernote({
	    height: 150,
	})

	$('#InputYearMade').datetimepicker({
		timepicker:false,
		format:'Y-m-d',
	});

	bsCustomFileInput.init();
});
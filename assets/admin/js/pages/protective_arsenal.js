// Формируем данные для таблицы

// Название страницы
const page = 'protective_arsenal';

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
		className: "id text-center",
	},

	{
		data: "filial",
		title: "Підрозділ",
		name: 'Підрозділ',
		orderable: true,
		searchable: true,
		visible: true,
		width: "20%",
		className: "filial select",
	},

	{
		data: "stantion",
		title: "Підстанція",
		name: 'Підстанція',
		orderable: true,
		searchable: true,
		visible: true,
		width: "20%",
		className: "stantion input",
	},

	{
		data: "name",
		title: "Назва захисного засобу",
		name: 'Назва захисного засобу',
		orderable: true,
		searchable: true,
		visible: true,
		width: "20%",
		className: "name order-default",
	},

	{
		data: "type",
		title: "Тип захисного засобу",
		name: 'Тип захисного засобу',
		orderable: true,
		searchable: true,
		visible: true,
		width: "20%",
		className: "type",
	},

	{
		data: "edit",
		title: "<i class=\"fas fa-edit\"></i>",
		name: 'Редагувати',
		orderable: false,
		searchable: false,
		visible: true,
		width: "5%",
		className: "edit text-center",
	},

	{
		data: "view",
		title: "<i class=\"fas fa-eye\"></i>",
		name: 'Більше інформації',
		orderable: false,
		searchable: false,
		visible: true,
		width: "5%",
		className: "view text-center",
	},

	{
		data: "delete",
		title: "<i class=\"fas fa-trash-alt\"></i>",
		name: 'Видалити',
		orderable: false,
		searchable: false,
		visible: true,
		width: "5%",
		className: "delete text-center",
	},	
];

function fillForm(data) {
	// $("#Form").parents(".card").find(".card-header .card-title").text("Edit Clients");
	$("#Form").prepend("<input name="+'id'+" value="+data.id+" type="+'hidden'+">");
	$("[name='filial']").val(data.filial_id);
	$("[name='stantion']").val(data.stantion_id);
	$("[name='name']").val(data.name);
	$("[name='type']").val(data.type);
}

// Форматирование открытой подстроки
function format (d) {
console.log("fffffffffff", d)
    // `d` is the original data object for the row
    return '<h3 class="text-center">Подробная информация</h3>'+
    '<table class="table table-bordered table-hover">'+
        '<tr>'+
            '<th>Филиал</th>'+
            '<td>'+d.filial+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>Подстанция</th>'+
            '<td>'+d.stantion+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>Диспетчерское имя</th>'+
            '<td>'+d.name+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>Тип</th>'+
            '<td>'+d.type+'</td>'+
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
}

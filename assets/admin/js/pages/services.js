// Формируем данные для таблицы

// Название страницы
var page = 'services';

// DataTables - Features
// Добавляем значения если хотим изменить характеристики таблицы
var table_features = {
	"stateSave": true,
};

// DataTables - Options
// Добавляем значения если хотим изменить опции таблицы
var table_options = {
	"pageLength": 5,
};

// DataTables - Columns
// Формируем колонки для таблиц
var columns_options = [
	{
		data: "id",
		title: "ID",
		orderable: true,
		seachable: true,
		visible: true,
		width: "5%",
		class: "id text-center",
	},

	{
		data: "name",
		title: "Name",
		orderable: true,
		seachable: true,
		visible: true,
		class: "name",
	},

	{
		data: "active",
		title: "<i class=\"fas fa-check\"></i>",
		orderable: true,
		seachable: true,
		visible: true,
		width: "5%",
		class: "active text-center",
		createdCell: function (td, cellData, rowData, row, col) {
			if (cellData == 1) {
				const icon = rights.right_update == 1
				?
				'<i class="fas fa-check text-success" style="cursor:pointer" data-handler="changeField" data-name_field="active" data-status="'+cellData+'"></i>'
				:
				'<i class="fas fa-check text-success" style="cursor:pointer"></i>'
				$(td).html(icon);
			}
			else {
				const icon = rights.right_update == 1
				?
				'<i class="fas fa-check text-danger" style="cursor:pointer" data-handler="changeField" data-name_field="active" data-status="'+cellData+'"></i>'
				:
				'<i class="fas fa-check text-danger" style="cursor:pointer"></i>'
				$(td).html(icon);
			}
		},
	},

	{
		data: "description",
		title: "Description",
		orderable: true,
		seachable: true,
		visible: false,
		class: "description",
	},

	{
		data: "edit",
		title: "<i class=\"fas fa-edit\"></i>",
		orderable: false,
		seachable: false,
		visible: true,
		width: "5%",
		className: "edit text-center",
	},

	{
		data: "view",
		title: "<i class=\"fas fa-eye\"></i>",
		orderable: false,
		seachable: false,
		visible: true,
		width: "5%",
		className: "view text-center",
	},

	{
		data: "delete",
		title: "<i class=\"fas fa-trash-alt\"></i>",
		orderable: false,
		seachable: false,
		visible: true,
		width: "5%",
		className: "delete text-center",
	},		
];

function fillForm(data) {
	// $("#Form").parents(".card").find(".card-header .card-title").text("Edit Clients");
	
	$("#Form").prepend("<input name="+'id'+" value="+data.id+" type="+'hidden'+">");
	$("[name='name']").val(data.name);
	$("[name='icon']").val(data.icon);
	$("[name='active']").prop("checked", data.active == 1 ? true : false);
	$("[name='description']").summernote("code", data.description);
}

// Форматирование открытой подстроки
function format (d) {
	if (d.gender == 1) {
		d.gender = 'Male';
	}
	else {
		d.gender = 'Female'; 
	}
    // `d` is the original data object for the row
    return '<h3 class="text-center">More informations</h3>'+
    '<table class="table table-bordered table-hover">'+
        '<tr>'+
            '<th>Name:</th>'+
            '<td>'+d.name+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>Description:</th>'+
            '<td>'+d.description+'</td>'+
        '</tr>'+
    '</table>';
}

$("#TextareaDescription").summernote({
	tabsize: 4,
	height: 200
});


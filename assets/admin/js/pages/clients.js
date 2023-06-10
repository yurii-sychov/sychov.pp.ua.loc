// Формируем данные для таблицы

// Название страницы
var page = 'clients';

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
		className: "id text-center",
	},

	{
		data: "name",
		title: "Name",
		orderable: true,
		seachable: true,
		visible: true,
		className: "name",
	},

	{
		data: "surname",
		title: "Surname",
		orderable: true,
		seachable: true,
		visible: true,
		className: "surname order-default",
	},

	{
		data: "email",
		title: "Email",
		orderable: true,
		seachable: true,
		visible: true,
		className: "email",
	},

	{
		data: "profession",
		title: "Profession",
		orderable: true,
		seachable: true,
		visible: true,
		className: "profession",
	},

	{
		data: "status",
		title: "<div style=\"display: none;\">Статус</div><i class=\"fas fa-check\"></i>",
		orderable: true,
		seachable: true,
		visible: true,
		width: "5%",
		className: "status text-center",
		createdCell: function (td, cellData, rowData, row, col) {
			if (cellData == 1) {
				const icon = rights.right_update == 1
				? 
				'<i class="fas fa-check text-success" style="cursor:pointer" data-handler="changeField" data-name_field="status" data-status="'+cellData+'"></i>'
				:
				'<i class="fas fa-check text-success" style="cursor:pointer"></i>'
				$(td).html(icon);
			}
			else {
				const icon = rights.right_update == 1
				?
				'<i class="fas fa-check text-danger" style="cursor:pointer" data-handler="changeField" data-name_field="status" data-status="'+cellData+'"></i>'
				:
				'<i class="fas fa-check text-danger" style="cursor:pointer"></i>'
				$(td).html(icon);
			}
		},
	},

	{
		data: "gender",
		title: "<div style=\"display: none;\">Пол</div><i class=\"fas fa-venus-mars\"></i>",
		orderable: true,
		seachable: true,
		visible: true,
		width: "5%",
		className: "gender text-center",
		createdCell: function (td, cellData, rowData, row, col) {
			if (cellData == 1) {
				const icon = rights.right_update == 1
				?
				'<i class="fas fa-male text-primary" style="cursor:pointer" data-handler="changeField" data-name_field="gender" data-status="'+cellData+'"></i>'
				:
				'<i class="fas fa-male text-primary" style="cursor:pointer"></i>'
				$(td).html(icon);
			}
			else {
				const icon = rights.right_update == 1
				?
				'<i class="fas fa-female text-danger" style="cursor:pointer" data-handler="changeField" data-name_field="gender" data-status="'+cellData+'"></i>'
				:
				'<i class="fas fa-female text-danger" style="cursor:pointer"></i>'
				$(td).html(icon);
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
		data: "feedback",
		title: "Feedback",
		orderable: true,
		seachable: true,
		visible: false,
		class: "feedback",
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
	$("[name='surname']").val(data.surname);
	$("[name='email']").val(data.email);
	$("[name='profession']").val(data.profession);
	$("[name='status']").prop("checked", data.status == 1 ? true : false);
	$("[name='gender']:first").prop("checked", data.gender == 1 ? true : false);
	$("[name='gender']:last").prop("checked", data.gender == 0 ? true : false);
	$("[name='feedback']").val(data.feedback);``
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
            '<th>Surname:</th>'+
            '<td>'+d.surname+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>Gender:</th>'+
            '<td>'+d.gender+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>Feedback:</th>'+
            '<td>'+d.feedback+'</td>'+
        '</tr>'+
    '</table>';
}

$(function () {
	bsCustomFileInput.init();
})


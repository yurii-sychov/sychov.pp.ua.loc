// Формируем данные для таблицы

// Название страницы
var page = 'users';

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
		data: "surname",
		title: "Surname",
		orderable: true,
		seachable: true,
		visible: true,
		class: "surname order-default",
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
		data: "patronymic",
		title: "Patronymic",
		orderable: true,
		seachable: true,
		visible: false,
		class: "patronymic",
	},

	{
		data: "password",
		title: "Password",
		orderable: true,
		seachable: true,
		visible: false,
		class: "password",
	},

	{
		data: "email",
		title: "Email",
		orderable: true,
		seachable: true,
		visible: true,
		class: "email",
	},

	{
		data: "education",
		title: "Education",
		orderable: true,
		seachable: true,
		visible: false,
		class: "education",
	},

	{
		data: "profession",
		title: "Profession",
		orderable: true,
		seachable: true,
		visible: false,
		class: "profession",
	},

	{
		data: "about",
		title: "About",
		orderable: true,
		seachable: true,
		visible: false,
		class: "about",
	},

	{
		data: "skills",
		title: "Skills",
		orderable: true,
		seachable: true,
		visible: false,
		class: "skills",
	},

	{
		data: "status",
		title: "<i class=\"fas fa-check\"></i>",
		orderable: true,
		seachable: true,
		visible: true,
		width: "5%",
		class: "status text-center",
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
		title: "<i class=\"fas fa-venus-mars\"></i>",
		orderable: true,
		seachable: true,
		visible: true,
		width: "5%",
		class: "gender text-center",
		createdCell: function (td, cellData, rowData, row, col) {
			if (cellData == 1) {
				const icon = rights.right_update == 1
				?
				'<i class="fas fa-mars text-primary" style="cursor:pointer" data-handler="changeField" data-name_field="gender" data-status="'+cellData+'"></i>'
				:
				'<i class="fas fa-mars text-primary" style="cursor:pointer"></i>'
				$(td).html(icon);
			}
			else {
				const icon = rights.right_update == 1
				?
				'<i class="fas fa-venus text-danger" style="cursor:pointer" data-handler="changeField" data-name_field="gender" data-status="'+cellData+'"></i>'
				:
				'<i class="fas fa-venus text-danger" style="cursor:pointer"></i>'
				$(td).html(icon);
			}
		},
	},

	{
		data: "image",
		title: "<i class=\"fas fa-image\"></i>",
		orderable: false,
		seachable: false,
		visible: true,
		width: "5%",
		class: "image text-center",
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
	$("[name='surname']").val(data.surname);
	$("[name='name']").val(data.name);
	$("[name='patronymic']").val(data.patronymic);
	
	$("[name='email']").val(data.email);
	$("[name='password']").val(data.password);

	$("[name='country']").val(data.country_id);
	$("[name='region']").val(data.region_id);
	$("[name='city']").val(data.city_id);
	$("[name='address']").val(data.address);
	$("[name='post']").val(data.post);

	$("[name='education']").val(data.education);
	$("[name='profession']").val(data.profession);
	$("[name='about']").val(data.about);
	$("[name='skills']").val(data.skills);
	$("[name='status']").prop("checked", data.status == 1 ? true : false);
	$("[name='gender']:first").prop("checked", data.gender == 1 ? true : false);
	$("[name='gender']:last").prop("checked", data.gender == 0 ? true : false);
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
            '<th>Surname:</th>'+
            '<td>'+d.surname+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>Name:</th>'+
            '<td>'+d.name+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>Patronymic:</th>'+
            '<td>'+d.patronymic+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>Password:</th>'+
            '<td>'+d.password+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>Education:</th>'+
            '<td>'+d.education+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>Profession:</th>'+
            '<td>'+d.profession+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>Gender:</th>'+
            '<td>'+d.gender+'</td>'+
        '</tr>'+
    '</table>';
}


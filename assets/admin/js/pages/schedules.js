// Формируем данные для таблицы

// Название страницы
var page = 'schedules';

// DataTables - Features
// Добавляем значения если хотим изменить характеристики таблицы
var table_features = {
	"stateSave": true,
	"serverSide": false,
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
		title: "#",
		name: 'ID',
		orderable: true,
		searchable: true,
		visible: true,
		width: "5%",
		className: "id text-center",
	},

	{
		data: "company",
		title: "Компанія",
		name: 'Компанія',
		orderable: false,
		searchable: false,
		visible: false,
		width: "0%",
		className: "company",
	},

	{
		data: "filial",
		title: "Підрозділ",
		name: 'Підрозділ',
		orderable: true,
		searchable: true,
		visible: false,
		width: "0%",
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
		className: "stantion input order-default",
	},

	{
		data: "equipment",
		title: "Обладнання",
		name: 'Обладнання',
		orderable: true,
		searchable: true,
		visible: false,
		width: "0%",
		className: "equipment",
	},

	{
		data: "disp",
		title: "Дисп. назва",
		name: 'Диспетчерська назва',
		orderable: true,
		searchable: true,
		visible: true,
		width: "10%",
		className: "disp text-center",
	},

	{
		data: "tip",
		title: "Тип",
		name: 'Тип обладнання', 
		orderable: true,
		searchable: true,
		visible: true,
		width: "20%",
		className: "tip text-center",
	},

	{
		data: "year_made",
		title: "Рік виготовлення",
		name: 'Рік виготовлення',
		orderable: true,
		searchable: true,
		visible: false,
		width: "10%",
		className: "year-made text-center",
	},

	{
		data: "tip_service",
		title: "Тип ремонту",
		name: 'Тип обслуговування',
		orderable: true,
		searchable: true,
		visible: true,
		className: "tip-service text-center",
		// createdCell: function (td, cellData, rowData, row, col) {
		// 	if (JSON.parse(localStorage.rights).right_update == 1) {
		// 		$(td).html('<strong>'+cellData+'</strong>');
		// 		$(td).attr({'data-type': 'select', 'data-value': cellData, 'data-handler': 'createField'});
		// 	}
		// },
	},

	{
		data: "date_service",
		title: "<i class=\"fas fa-calendar-alt\"></i>",
		name: 'Дата останього обслуговування',
		orderable: true,
		searchable: true,
		visible: true,
		width: "10%",
		className: "date-service text-center datetimepicker",
		createdCell: function (td, cellData, rowData, row, col) {
			if (JSON.parse(localStorage.rights).right_update == 1) {
				const date = new Date(cellData);
				const day = date.getDate() < 10 ? '0'+date.getDate() : date.getDate();
				const month = date.getMonth()+1;
				const month_new = month < 10 ? '0'+month : month;
				const year = date.getFullYear() ? date.getFullYear() : '????';
				$(td).html('<strong>'+cellData+'</strong>');
				// $(td).html('<strong>'+year+'</strong>').attr({'title': day+'-'+month_new+'-'+year});
				$(td).attr({'data-type': 'text', 'data-value': cellData, 'data-maxlength': 10, 'data-name': 'date_service', 'data-handler': 'createField'});
			}
		},
	},

	{
		data: "periodicity",
		title: "<i class=\"fas fa-wave-square\"></i>",
		name: 'Періодичність',
		orderable: true,
		searchable: true,
		visible: true,
		width: "5%",
		className: "periodicity text-center",
		createdCell: function (td, cellData, rowData, row, col) {
			if (JSON.parse(localStorage.rights).right_update == 1) {
				$(td).html('<strong>'+cellData+'</strong>');
				$(td).attr({'data-type': 'number', 'data-value': cellData, 'data-maxlength': 2, 'data-name': 'periodicity', 'data-handler': 'createField'});
			}
		},
	},

	{
		data: "date_next_service",
		title: "<i class=\"fas fa-calendar-plus\"></i>",
		name: 'Дата наступного обслуговування',
		orderable: true,
		searchable: true,
		visible: true,
		width: "5%",
		className: "date-next-service text-center",
		createdCell: function (td, cellData, rowData, row, col) {
			const date = new Date(cellData);
			const day = date.getDate() < 10 ? '0'+date.getDate() : date.getDate();
			const month = date.getMonth()+1;
			const month_new = month < 10 ? '0'+month : month;
			const year = date.getFullYear();
			// $(td).html(day+'-'+month_new+'-'+year);
			$(td).html(year).attr({'title': day+'-'+month_new+'-'+year});
		},
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

	// {
	// 	data: "delete",
	// 	title: "<i class=\"fas fa-trash-alt\"></i>",
	// 	name: 'Видалити',
	// 	orderable: false,
	// 	searchable: false,
	// 	visible: true,
	// 	width: "5%",
	// 	className: "delete text-center",
	// },

	// {
	// 	data: "select_checkbox",
	// 	title: "<input type=\"checkbox\" />",
	// 	name: 'Checkbox',
	// 	orderable: false,
	// 	searchable: false,
	// 	visible: true,
	// 	width: "5%",
	// 	className: "select-checkbox text-center",
	// },	
];

function fillForm(data) {
	// $("#Form").parents(".card").find(".card-header .card-title").text("Edit Clients");
	$("#Form").prepend("<input name="+'id'+" value="+data.id+" type="+'hidden'+">");
	$("[name='filial']").val(data.filial);
	$("[name='stantion']").val(data.stantion);
	$("[name='stantion']").val(data.stantion);
	$("[name='equipment']").val(data.equipment);
	$("[name='disp']").val(data.disp);
	$("[name='tip']").val(data.tip);
	$("[name='year_made']").val(data.year_made);
	$("[name='tip_service']").val(data.tip_service);
	$("[name='date_service']").val(data.date_service);
	$("[name='periodicity']").val(data.periodicity);
}

// Форматирование открытой подстроки
function format (d) {
	d.kap_rem = d.kap_rem == 1 ? 'Да' : 'Нет';
	d.tek_rem = d.tek_rem == 1 ? 'Да' : 'Нет';
	d.med_rem = d.med_rem == 1 ? 'Да' : 'Нет';

    // `d` is the original data object for the row
    return '<h3 class="text-center">Подробная информация</h3>'+
    '<table class="table table-bordered table-hover">'+
        '<tr>'+
            '<th>Компания</th>'+
            '<td>'+d.company+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>Филиал</th>'+
            '<td>'+d.filial+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>Подстанция</th>'+
            '<td>'+d.stantion+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>Оборудование</th>'+
            '<td>'+d.equipment+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>Диспетчерское имя</th>'+
            '<td>'+d.name+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>Тип</th>'+
            '<td>'+d.tip+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>Год выпуска</th>'+
            '<td>'+d.year_made+'</td>'+
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
		if (settings.aoColumns[i].data === 'equipment') {
			$('#FilterEquipment').val(data.columns[i].search.search);
		}
		if (settings.aoColumns[i].data === 'tip_service') {
			$('#FilterTipService').val(data.columns[i].search.search);
		}
	}
}

function filterFilial(event) {
	table.columns('.filial').search(event.target.value).draw();
}

function filterStantion(event) {
	table.columns('.stantion').search(event.target.value).draw();
}

function filterEquipment(event) {
	table.columns('.equipment').search(event.target.value).draw();
}

function filterTipService(event) {
	table.columns('.tip-service').search(event.target.value).draw();
}

function resetFilters(event) {
	$('#FilterFilial').val('');
	table.columns('.filial').search('').draw();
	$('#FilterStantion').val('');
	table.columns('.stantion').search('').draw();
	$('#FilterEquipment').val('');
	table.columns('.equipment').search('').draw();
	$('#FilterTipService').val('');
	table.columns('.tip-service').search('').draw();
}

/**
 * [getDataForUpdateAllRows !!!!!!!Метод получает данные с полей формы в таблице]
 * @param  {[type]} event [description]
 * @return {[type]} [Массив объектов данных формы таблицы]
 */
function getDataForUpdateAllRows() {
	const tr = $('#DataTable').find('tbody tr');
	var data = [];
	$.each(tr, function (index, tr) {
		const id = $(tr).data('id');
		const date_service = $(tr).find('td.date-service input').val();
		const periodicity = $(tr).find('td.periodicity input').val();
    	data.push({'id': id, 'date_service': date_service, 'periodicity': periodicity});
    	
	});
	return data;
}

function generateScheduleBigRepair(event) {
    $.ajax({
        url: "/admin/"+page+"/generate_schedule_big_repair",
        type: "post",
        data: {},
        success: function(data, textStatus, jqXHR) {
            if (data.status == 'SUCCESS') {
                toastr.success(data.message);
            }
            if (data.status == 'ERROR') {
                toastr.success(data.message);
            }
        } 
    });
}

function generateSchedulePermanentRepair(event) {
	$.ajax({
        url: "/admin/"+page+"/generate_schedule_permanent_repair",
        type: "post",
        data: {},
        success: function(data, textStatus, jqXHR) {
            if (data.status == 'SUCCESS') {
                toastr.info(data.message);
            }
            if (data.status == 'ERROR') {
                toastr.info(data.message);
            }
        } 
    });
}

function generateScheduleTechnicalService(event) {
	$.ajax({
        url: "/admin/"+page+"/generate_schedule_technical_service",
        type: "post",
        data: {},
        success: function(data, textStatus, jqXHR) {
            if (data.status == 'SUCCESS') {
                toastr.error(data.message);
            }
            if (data.status == 'ERROR') {
                toastr.error(data.message);
            }
        } 
    });
}

// function data_calculation(event) {
	
// 	const date_service = $(event.currentTarget).parents('tr').find('td.date-service').data('value');
// 	const periodicity = $(event.currentTarget).parents('tr').find('td.periodicity').data('value');
	
// 	var D = new Date(date_service);
// 	console.log( date_service, periodicity );
// 	D.setDate(D.getDate());
// 	D.setMonth(D.getMonth());
// 	D.setFullYear(D.getFullYear()+periodicity);
// 	if(D.getDate() < 10) var curr_date = "0" + D.getDate(); else var curr_date = D.getDate();
// 	if(D.getMonth() < 10) {
// 		var curr_month = D.getMonth()+1; curr_month = "0" + curr_month;
// 	} else {
// 		var curr_month = D.getMonth()+1;
// 	}
// 	var curr_year = D.getFullYear();
// 	var date_next_service = curr_year + "-" + curr_month + "-" + curr_date;
// 	$(event.currentTarget).parents('tr').find('td.date-next-service').text(curr_year);
	
// 	return date_next_service;
// 	// const tr = $('#DataTable').find('tbody tr');
// 	// var date_next_service = [];
// 	// $.each(tr, function(index, tr) {
// 	// 	const date_service = $(tr).find('td.date-service').data('value');
// 	// 	const periodicity = $(tr).find('td.periodicity').data('value');
// 	// 	const d = new Date(date_service);
// 	// 	d.setFullYear(d.getFullYear() + periodicity);
// 	// 	date_next_service.push(d);
// 	// });	
// }

$(document).ready(function() {

	$('#InputDateService').datetimepicker({
		timepicker:false,
		format:'Y-m-d',
	});

});

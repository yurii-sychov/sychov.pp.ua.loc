// Формируем данные для таблицы

// Название страницы
const page = 'disps';

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
		data: "company",
		title: "Компанія",
		name: 'Компанія',
		name: "",
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
		data: "name",
		title: "Дисп. назва",
		name: 'Диспетчерська назва',
		orderable: true,
		searchable: true,
		visible: true,
		width: "10%",
		className: "name",
	},

	{
		data: "tip",
		title: "Тип",
		name: 'Тип обладнання',
		orderable: true,
		searchable: true,
		visible: true,
		width: "20%",
		className: "tip",
	},

	{
		data: "year_made",
		title: "Рік виготовлення",
		name: 'Рік виготовлення',
		orderable: true,
		searchable: true,
		visible: true,
		width: "10%",
		className: "year-made",
	},

	{
		data: "big_repair",
		title: "КР",
		name: "Капітальний ремонт",
		orderable: false,
		seachable: true,
		visible: true,
		width: "5%",
		class: "kap-rem text-center",
		createdCell: function (td, cellData, rowData, row, col) {
			if (cellData == 1) {
				const icon = rights.right_update == 1
				?
				'<i class="fas fa-check text-success" style="cursor:pointer" data-handler="changeField" data-name_field="big_repair" data-status="'+cellData+'" title="Удалить с графика"></i>'
				:
				'<i class="fas fa-check text-success" style="cursor:pointer"></i>'
				$(td).html(icon);
			}
			else {
				const icon = rights.right_update == 1
				?
				'<i class="fas fa-check text-danger" style="cursor:pointer" data-handler="changeField" data-name_field="big_repair" data-status="'+cellData+'" title="Добавить в график"></i>'
				:
				'<i class="fas fa-check text-danger" style="cursor:pointer"></i>'
				$(td).html(icon);
			}
		},
	},

	{
		data: "permanent_repair",
		title: "ПР",
		name: "Поточний ремонт",
		orderable: false,
		seachable: true,
		visible: true,
		width: "5%",
		className: "tek-rem text-center",
		createdCell: function (td, cellData, rowData, row, col) {
			if (cellData == 1) {
				const icon = rights.right_update == 1
				?
				'<i class="fas fa-check text-success" style="cursor:pointer" data-handler="changeField" data-name_field="permanent_repair" data-status="'+cellData+'" title="Удалить с графика"></i>'
				:
				'<i class="fas fa-check text-success" style="cursor:pointer"></i>'
				$(td).html(icon);
			}
			else {
				const icon = rights.right_update == 1
				?
				'<i class="fas fa-check text-danger" style="cursor:pointer" data-handler="changeField" data-name_field="permanent_repair" data-status="'+cellData+'" title="Добавить в график"></i>'
				:
				'<i class="fas fa-check text-danger" style="cursor:pointer"></i>'
				$(td).html(icon);
			}
		},
	},

	{
		data: "technical_service",
		title: "ТО",
		name: "Технічне обслуговування",
		orderable: false,
		seachable: true,
		visible: true,
		width: "5%",
		className: "med-rem text-center",
		createdCell: function (td, cellData, rowData, row, col) {
			if (cellData == 1) {
				const icon = rights.right_update == 1
				?
				'<i class="fas fa-check text-success" style="cursor:pointer" data-handler="changeField" data-name_field="technical_service" data-status="'+cellData+'" title="Удалить с графика"></i>'
				:
				'<i class="fas fa-check text-success" style="cursor:pointer"></i>'
				$(td).html(icon);
			}
			else {
				const icon = rights.right_update == 1
				?
				'<i class="fas fa-check text-danger" style="cursor:pointer" data-handler="changeField" data-name_field="technical_service" data-status="'+cellData+'" title="Добавить в график"></i>'
				:
				'<i class="fas fa-check text-danger" style="cursor:pointer"></i>'
				$(td).html(icon);
			}
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

	// {
	// 	data: "select_checkbox",
	// 	title: "<input type=\"checkbox\" />",
	// 	name: 'Вибір',
	// 	orderable: false,
	// 	searchable: false,
	// 	visible: true,
	// 	width: "5%",
	// 	className: "select-checkbox text-center",
	// },	
];

// const selectCheckboxButton

function fillForm(data) {
	// $("#Form").parents(".card").find(".card-header .card-title").text("Edit Clients");
	$("#Form").prepend("<input name="+'id'+" value="+data.id+" type="+'hidden'+">");
	$("[name='filial']").val(data.filial_id);
	$("[name='stantion']").val(data.stantion_id);
	$("[name='equipment']").val(data.equipment_id);
	$("[name='name']").val(data.name);
	$("[name='tip']").val(data.tip);
	$("[name='year_made']").val(data.year_made);
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
        '<tr>'+
            '<th>Капитальный ремонт / Дата ремонта</th>'+
            '<td>'+d.kap_rem+' / '+d.date_kap_rem+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>Текущий ремонт / Дата ремонта</th>'+
            '<td>'+d.tek_rem+' / '+d.date_tek_rem+'</td>'+
        '</tr>'+
        '<tr>'+
            '<th>Средний ремонт / Дата ремонта</th>'+
            '<td>'+d.med_rem+' / '+d.date_med_rem+'</td>'+
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

function resetFilters(event) {
	$('#FilterFilial').val('');
	table.columns('.filial').search('').draw();
	$('#FilterStantion').val('');
	table.columns('.stantion').search('').draw();
	$('#FilterEquipment').val('');
	table.columns('.equipment').search('').draw();
}

function generateSchedules(event) {
    $.ajax({
        url: "/admin/"+page+"/generate_schedules",
        type: "post",
        data: {},
        success: function(data, textStatus, jqXHR) {
            if (data.status == 'SUCCESS') {
                toastr.success(data.message);
                table.ajax.reload(function(data) {

                }, false);
            }
            if (data.status == 'ERROR') {
                toastr.error(data.message);
            }
        } 
    });
}

$(document).ready(function() {
	$('#InputYearMade').datetimepicker({
		timepicker:false,
		format:'Y-m-d',
	});
});

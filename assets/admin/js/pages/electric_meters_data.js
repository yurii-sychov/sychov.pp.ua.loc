// Формируем данные для таблицы

// Название страницы
const page = 'electric_meters_data';

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
		className: "align-middle text-center",
	},

	{
		data: "filial",
		title: "Подразделение",
		name: "Подразделение",
		orderable: true,
		searchable: true,
		visible: false,
		width: "auto",
		className: "align-middle filial select",
	},

	{
		data: "stantion",
		title: "Подстанция",
		name: "Подстанция",
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "align-middle stantion input",
	},

	{
		data: "type",
		title: "Тип",
		name: "Тип",
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "align-middle type",
	},

	{
		data: "factory_number",
		title: "Номер счётчика",
		name: "Номер счётчика",
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "align-middle factory-number",
	},

	{
		data: "connection",
		title: "Присоединение",
		name: "Присоединение",
		orderable: true,
		searchable: true,
		visible: false,
		width: "auto",
		className: "align-middle connection",
	},

	{
		data: "installation_location",
		title: "Место установки",
		name: "Место установки",
		orderable: true,
		searchable: true,
		visible: false,
		width: "auto",
		className: "align-middle installation_location",
	},

	{
		data: "coefficient",
		title: "Коэффициент",
		name: "Коэффициент",
		orderable: true,
		searchable: true,
		visible: false,
		width: "auto",
		className: "align-middle text-center coefficient",
	},

	{
		data: "type_needs",
		title: "Тип нужд",
		name: "Тип нужд",
		orderable: true,
		searchable: true,
		visible: false,
		width: "auto",
		className: "align-middle type_needs",
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
		data: "date_of_reading",
		title: "Дата снятия<br />показаний",
		name: "Дата снятия показаний",
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "align-middle text-center date_of_reading",
	},

	{
		data: "current",
		title: "Текущие<br />показания",
		name: "Текущие показания",
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "align-middle text-center current",
	},

	{
		data: "previous",
		title: "Предыдущие<br />показания",
		name: "Предыдущие показания",
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "align-middle text-center previous",
	},

	{
		data: "difference",
		title: "Разница<br />показаний",
		name: "Разница показаний",
		orderable: true,
		searchable: true,
		visible: true,
		width: "auto",
		className: "align-middle text-center difference",
	},

	// {
	//  data: "edit",
	//  title: "<i class=\"fas fa-edit\"></i>",
	//  name: "Редактировать <i class=\"fas fa-edit\"></i>",
	//  orderable: false,
	//  searchable: false,
	//  visible: true,
	//  width: "5%",
	//  className: "align-middle edit text-center",
	// },

	{
		data: "view",
		title: "<i class=\"fas fa-eye\"></i>",
		name: "Просмотреть <i class=\"fas fa-eye\"></i>",
		orderable: false,
		searchable: false,
		visible: true,
		width: "5%",
		className: "align-middle view text-center",
	},

	// {
	//  data: "delete",
	//  title: "<i class=\"fas fa-trash-alt\"></i>",
	//  name: "Удалить <i class=\"fas fa-trash-alt\"></i>",
	//  orderable: false,
	//  searchable: false,
	//  visible: true,
	//  width: "5%",
	//  className: "align-middle delete text-center",
	// },   
];

function fillForm(data) {
	// $("#Form").parents(".card").find(".card-header .card-title").text("Форма редактирования данных по электросчётчику");
	$("#Form").prepend("<input name="+'id'+" value="+data.id+" type="+'hidden'+">");
	$("[name='filial']").val(data.filial_id);
	$("[name='stantion']").val(data.stantion_id);
	$("[name='type']").val(data.type);
	$("[name='factory_number']").val(data.factory_number);
	$("[name='connection']").val(data.connection);
	$("[name='installation_location']").val(data.installation_location);
	$("[name='coefficient']").val(data.coefficient);
	$("[name='type_needs']").val(data.type_needs);
	$("[name='status']").prop("checked", data.status == 1 ? true : false);
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

// Добавление показаний счётчиков в таблицу
function addMetersData(event) {
	const form = $('#Form').serializeArray();
	$.ajax({
		url: "/admin/electric_meters_data/create_batch",
		type: "post",
		data: form,
		success: (data, textStatus, jqXHR) => {
			if (data.status == 'SUCCESS') {
				let current = $('[name="current[]"]');
				let date_of_reading = $('[name="date_of_reading[]"]');

				current.removeClass('is-invalid')
				current.each(function( index ) {
					if ($(this).val()) {
						$(this).addClass('is-valid');
					}
				});

				date_of_reading.removeClass('is-invalid')
				date_of_reading.each(function( index ) {
					if ($(this).val()) {
						$(this).addClass('is-valid');
					}
				});

				toastr.success(data.message).css({ "width":"500px", "max-width":"100em" });
				setTimeout(() => {
					location.href = '/admin/electric_meters_data';
				},2000);
				
			}
			if (data.status == 'ERROR') {
				let current = $('[name="current[]"]');
				let date_of_reading = $('[name="date_of_reading[]"]');

				current.removeClass('is-invalid')
				current.each(function( index ) {
					if ( !$(this).val()) {
						$(this).addClass('is-invalid');
					}
				});

				date_of_reading.removeClass('is-invalid')
				date_of_reading.each(function( index ) {
					if ( !$(this).val()) {
						$(this).addClass('is-invalid');
					}
				});
				
				toastr.error(data.message).css({ "width":"500px", "max-width":"100em" });
			}
		}
	});
}

// Поиск счётчиков
function searchElectricMeters(event) {
	event.preventDefault();

	let name = event.target.name;
	let value = event.target.value;

	if (name === 'stantion') {
		$('#FilterFactoryNumber').val('');
	}

	if (name === 'stantion') {
		$('#FilterStantion').val('');
	}

	$.ajax({
		url: "/admin/electric_meters_data/search_electric_meters",
		type: "post",
		data: { name, value },
		success: (data, textStatus, jqXHR) => {
			if (data.status == 'SUCCESS') {
				let tr = '';

				var today = new Date();
				var dd = String(today.getDate()).padStart(2, '0');
				var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
				var yyyy = today.getFullYear();

				today = yyyy+'-'+mm+'-'+dd;

				for (let i=0; i<data.data.length; i++) {
					tr +=
					`
						<tr>
							<td class="text-center">
								${data.data[i].id}
								<input class="text-center" type="hidden" name="id[]" style="width: 100%;" value="${data.data[i].id}" />
							</td>

							<td>${data.data[i].stantion}</td>

							<td>${data.data[i].connection}</td>

							<td class="text-center">${data.data[i].factory_number}</td>

							<td class="text-center">
								${data.data[i].coefficient}
								<input class="text-center" type="hidden" name="coefficient[]" style="width: 100%;" value="${data.data[i].coefficient}" />
							</td>

							<td><input class="text-center form-control" type="text" name="date_of_reading[]";" value="${today}" /></td>
							
							<td><input class="text-center form-control" type="text" name="current[]"" onKeyup="calcDifference(event)" onChange="calcDifference(event)" /></td>
							
							<td class="text-center">
								${data.data[i].previous.current ? data.data[i].previous.current : 'Нет данных'}
								<input class="text-center" type="hidden" name="previous[]" style="width: 100%;" value="${data.data[i].previous.current}" />
							</td>

							<td class="text-center difference"></td>
							
							<td class="text-center">
								${data.data[i].previous.created_at ? data.data[i].previous.created_at : 'Нет данных'}
							</td>

						</tr>
					`
				}
				$('#Form table tbody').html(tr);
				$('input[name="date_of_reading[]"]').inputmask("9999-99-99",{ "placeholder": "yyyy-mm-dd" });
				$('input[name="current[]"]').inputmask({
					alias: 'numeric', 
					allowMinus: false,  
					digits: 2, 
					max: 99999999.99
				});
				$('input[name="date_of_reading[]"]').datetimepicker({
					timepicker:false,
					format:'Y-m-d',
				});
				// toastr.success(data.message).css({ "width":"500px", "max-width":"100em" });
				
			}
			if (data.status == 'ERROR') {
				toastr.error(data.message).css({ "width":"500px", "max-width":"100em" });

			}
		}
	});
}

function calcDifference(event) {
	let current = event.target.value;
	let previous = $(event.target).parents('tr').find('[name="previous[]"]').val();
	let coefficient = $(event.target).parents('tr').find('[name="coefficient[]"]').val();


	let result = (current * coefficient) - previous;
	
	if (result <= 0) {
		$(event.target).parents('tr').find('.difference').text(result).css({'color': 'red', 'font-weight': 'bold'});
	}
	else {
		$(event.target).parents('tr').find('.difference').text(result).css({'color': 'green', 'font-weight': 'bold'});
	}
	console.log( result );
}

$(function() {
	$('input[name="date_of_reading[]"]').inputmask("9999-99-99",{ "placeholder": "yyyy-mm-dd" });
	$('input[name="current[]"]').inputmask({
		alias: 'numeric', 
		allowMinus: false,  
		digits: 2, 
		max: 99999999.99
	});
	$('input[name="date_of_reading[]"]').datetimepicker({
		timepicker:false,
		format:'Y-m-d',
	});
	// $('input[name="date_of_reading[]"]').daterangepicker({
	//  singleDatePicker: true,
	//  locale: {
	//      format: 'YYYY-MM-DD'
	//  }
	// });
});
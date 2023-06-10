// $.ajax(
// {
// 	url: "/admin/users/get_session",
// 	type: "post",
// 	success: function(json, textStatus, jqXHR) {
// 		const user = {
// 			'id': json.data.id,
// 			'right_create': json.data.right_create,
// 			'right_read': json.data.right_read,
// 			'right_update': json.data.right_update,
// 			'right_delete': json.data.right_delete,
// 			'group': json.data.group,
// 		}
// 		const rights = {
// 			'right_create': json.rights.right_create,
// 			'right_read': json.rights.right_read,
// 			'right_update': json.rights.right_update,
// 			'right_delete': json.rights.right_delete,
// 		}
// 		localStorage.setItem('user', JSON.stringify(user));
// 		localStorage.setItem('rights', JSON.stringify(rights));
// 	}
// })

// const p = new Promise((resolve, reject) => {
//     $.ajax(
//     {
//     	url: "/admin/users/get_session",
//     	type: "post",
//     	success: function(json, textStatus, jqXHR) {
//     		const user = {
//     			'id': json.data.id,
//     			'right_create': json.data.right_create,
//     			'right_read': json.data.right_read,
//     			'right_update': json.data.right_update,
//     			'right_delete': json.data.right_delete,
//     			'group': json.data.group,
//     		}
//     		const rights = {
//     			'right_create': json.rights.right_create,
//     			'right_read': json.rights.right_read,
//     			'right_update': json.rights.right_update,
//     			'right_delete': json.rights.right_delete,
//     		}
//     		localStorage.setItem('user', JSON.stringify(user));
//     		localStorage.setItem('rights', JSON.stringify(rights))
    		 
//     		resolve( localStorage.rights );
//     	}
//     }) 
// });


// const user = localStorage.user ? JSON.parse(localStorage.user) : null;

$(document).ready(function() {
	// Событие вызывающее функцию обработчик
	$("body").on("click change keyup", "[data-handler]", function(event) {
		event.preventDefault();
		let handler = this.dataset.handler;
		if (window[handler] && typeof(window[handler]) == 'function') {
			window[handler](event);
		}
		else {
			alert("Вы пытаетесь вызвать функцию "+handler+"().", "Для этого нажатия функция не определена! Определите функцию в файле custom.js", "success", 5000);
		}
	});
});

$(function () {
	$('[data-toggle="tooltip"]').tooltip({ boundary: 'window' });
	$('aside.main-sidebar nav li a.active').parents('li').addClass('menu-open');
	$('aside.main-sidebar nav li a.active').parents('li').children('a').addClass('active');

	$('#toggle-button').on('expanded.controlsidebar', function() {

	});
});
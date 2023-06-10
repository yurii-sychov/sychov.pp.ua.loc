$(document).ready(function() {
	// Событие вызывающее функцию обработчик
    $("body").on("click change keyup", "[data-handler]", function(event) {
        event.preventDefault();
        let handler = this.dataset.handler;
        if (window[handler] && typeof(window[handler]) == 'function') {
            window[handler](event, userdata = false);
        }
        else {
            alert("Вы пытаетесь вызвать функцию "+handler+"().", "Для этого нажатия функция не определена! Определите функцию в файле custom.js", "success", 5000);
        }
    });
});

/**
 * [SendMessage Метод отправки письма ajax способом]
 * @param {[type]} event [description]
 */
function sendMessage(event) {
	event.preventDefault();
	var form = $("#FormSendMessage").serializeArray();

	$.ajax(
	{
		url: "/landing/send_message_ajax",
		type: "post",
		data: form,
		success: function(data, textStatus, jqXHR) {
			if (data.status == 'SUCCESS') {
				alert(data.message);
				$("#FormSendMessage")[0].reset();
			}
			if (data.status == 'ERROR') {
				alert(data.message);
				$("[name="+data.name+"]").focus();	
			}
		}
	});	
}

/**
 * [SendMessage Метод создания комментария ajax способом]
 * @param {[type]} event [description]
 */
function sendComment(event) {
	var form = $("#FormSendComment").serializeArray();

	$.ajax(
	{
		url: "/blog/send_comment_ajax",
		type: "post",
		data: form,
		success: function(data, textStatus, jqXHR) {
			if (data.status == 'SUCCESS') {
				alert(data.message);
				$("#FormSendComment")[0].reset();
			}
			if (data.status == 'ERROR') {
				alert(data.message);
				$("[name="+data.name+"]").focus();	
			}
		}
	});
}
/**
 * [SendMessage Метод отправки письма ajax способом]
 * @param {[type]} event [description]
 */
function sendMessage(event) {
	event.preventDefault();
	let form = $("#FormSendMessage").serializeArray();

	$.ajax(
	{
		url: "/admin/contact/send_message_ajax",
		type: "post",
		data: form,
		success: function(data, textStatus, jqXHR) {
			if (data.status == 'SUCCESS') {
				toastr.success(data.message).css({ "width":"500px", "max-width":"100em" });
				$("#FormSendMessage")[0].reset();
				$('.note-editable').text('');
			}
			if (data.status == 'ERROR') {
				toastr.error(data.message).css({ "width":"500px", "max-width":"100em" });
				$("[name="+data.name+"]").focus();	
			}
		}
	});	
}

$(function () {
	$('body .summernote').summernote({
		height: 150,
	})
});
const email = document.querySelector('#inputEmail');
const password = document.querySelector('#inputPassword');

const btnSignin = document.querySelector('#btnSignin');



function signinHandler() {
	event.preventDefault();

	let data = {};
	data.email = email.value;
	data.password = password.value;
    
	$.ajax({
        url: '/admin/authorization/signin',
        type: 'POST',
        data: data,
        success: function(data, textStatus, jqXHR) {
            if (data.status == 'SUCCESS') {
                location.href = '/admin/profile';
            }
            if (data.status == 'ERROR') {
            	alert(data.message);
            }
        } 
    });
}

btnSignin.addEventListener('click', signinHandler);
const email = document.querySelector('#InputEmail');
const password = document.querySelector('#InputPassword');
const retypePassword = document.querySelector('#InputRetypePassword');

const btnSignup = document.querySelector('#BtnSignup');

const blockError = document.querySelector('#BlockError');

function signup() {
	event.preventDefault();

	let data = {};
	data.email = email.value;
	data.password = password.value;
	data.retypePassword = retypePassword.value;

	console.table(data);
	$.ajax({
        url: "/admin/authorization/signup",
        type: "post",
        data: data,
        success: function(data, textStatus, jqXHR) {
            if (data.status == 'SUCCESS') {
                blockError.setAttribute('style', 'display: block');
                blockError.classList.remove('alert-danger');
                blockError.classList.add('alert-success');
                blockError.innerHTML = data.message;
                setTimeout(location.href = '/admin/authorization/signin', 3000);
            }
            if (data.status == 'ERROR') {
                blockError.setAttribute('style', 'display: block');
                blockError.innerHTML = data.message;
            	if (data.name === 'email') {
                    email.focus();
                }

                if (data.name === 'password') {
                    password.focus();                   
                }

                if (data.name === 'retypePassword') {
                    retypePassword.focus();
                }
            }
        } 
    });
}

// function comparePasswords() {
//     if (password.value === retypePassword.value && password.value !== '' && retypePassword.value !== '') {
//         password.classList.remove('is-invalid');
//         retypePassword.classList.remove('is-invalid');
//         password.classList.add('is-valid');
//         retypePassword.classList.add('is-valid');
//     }
//     else {
//         password.classList.remove('is-valid');
//         retypePassword.classList.remove('is-valid');
//         password.classList.add('is-invalid');
//         retypePassword.classList.add('is-invalid');
//     }
// }

// function getEmail() {
//     let data = {};
//     data.email = email.value;

//     $.ajax({
//         url: "/admin/authorization/get_email",
//         type: "post",
//         data: data,
//         success: function(data, textStatus, jqXHR) {
//             console.log(data.status)
//             if (data.status == 'SUCCESS') {
//                 console.log(data)
//             }
//             if (data.status == 'ERROR') {
//                 email.classList.remove('is-valid');
//                 email.classList.add('is-invalid');
//                 alert('Пользователь с таким почтовым ящиком уже зарегистрирован!');
//             }
//         } 
//     });
// }

btnSignup.addEventListener('click', signup);

// email.addEventListener('keyup', getEmail);

// password.addEventListener('keyup', comparePasswords);

// retypePassword.addEventListener('keyup', comparePasswords);


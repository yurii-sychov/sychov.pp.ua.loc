const id = document.querySelector('#InputId');
const surname = document.querySelector('#InputSurname');
const name = document.querySelector('#InputName');
const patronymic = document.querySelector('#InputPatronymic');
const email = document.querySelector('#InputEmail');
// const password = document.querySelector('#InputPassword');
const countries = document.querySelector('#SelectCountry');
const regions = document.querySelector('#SelectRegion');
const cities = document.querySelector('#SelectCity');
const address = document.querySelector('#InputAddress');
const post = document.querySelector('#InputPost');
const education = document.querySelector('#InputEducation');
const profession = document.querySelector('#InputProfession');
const about = document.querySelector('#InputAbout');
const skills = document.querySelector('#InputSkills');
// const status = document.querySelector('#CheckboxStatus');
const gender = document.querySelectorAll('[name="gender"]')

const btnSubmit = document.querySelector('#ButtonSubmit');

const oldPassword = document.querySelector('#InputOldPassword');
const newPassword = document.querySelector('#InputNewPassword');
const repeatNewPassword = document.querySelector('#InputRepeatNewPassword');

const btnPasswordSubmit = document.querySelector('#ButtonPasswordSubmit');

function editHandler() {
	event.preventDefault();
    
    let data = {};

    data.id = id.value;
    data.surname = surname.value;
    data.name = name.value;
    data.patronymic = patronymic.value;
    data.email = email.value;
    // data.password = password.value;
    data.country = countries.value;
    data.region = regions.value;
    data.city = cities.value;
    data.address = address.value;
    data.post = post.value;
    data.education = education.value;
    data.profession = profession.value;
    data.about = about.value;
    data.skills = skills.value;
    // data.status = status.value;
    data.gender = gender[0].checked === true ? 1 : 0;

	$.ajax({
        url: "/admin/profile/update",
        type: "post",
        data: data,
        success: function(data, textStatus, jqXHR) {
            if (data.status == 'SUCCESS') {
                toastr.success(data.message);
                document.querySelector('#aboutEducation').innerHTML = data.data.education;
                document.querySelector('#aboutLocation').innerHTML = data.data.country_id+ ', ' +data.data.city_id+ ', ' +data.data.address+ ', ' +data.data.post;
            }
            if (data.status == 'ERROR') {
            	toastr.error(data.message);
            }
        } 
    });
}

// Изменяем пароль
function updatePasswordHandler() {
    event.preventDefault();

    // Получаем результат сравнения введённых паролей
    resultComparePasswords = comparePasswordsHandler();

    if (resultComparePasswords === true) {
        newPassword.classList.remove('is-invalid');
        repeatNewPassword.classList.remove('is-invalid');
        newPassword.classList.add('is-valid');
        repeatNewPassword.classList.add('is-valid');

        // Создаём ajax запрос на сервер на изменение пароля
        let data = {};
        data.id = id.value;
        data.password = newPassword.value;
        $.ajax({
            url: "/admin/profile/update_password",
            type: "post",
            data: data,
            success: function(data, textStatus, jqXHR) {
                if (data.status == 'SUCCESS') {
                    toastr.success(data.message);
                    setTimeout(() => location.href = '/admin/authorization/signin', 3000);
                }
                if (data.status == 'ERROR') {
                    toastr.error(data.message);
                }
            } 
        });
    }
    else {
        toastr.error('Пароли не равны или не введены!');
        newPassword.classList.remove('is-valid');
        repeatNewPassword.classList.remove('is-valid');
        newPassword.classList.add('is-invalid');
        repeatNewPassword.classList.add('is-invalid');
    }
}

// Сравниваем пароли
function comparePasswordsHandler() {
    if (newPassword.value === repeatNewPassword.value && newPassword.value !== '' && repeatNewPassword.value !== '') {
        return true;
    }
    return false;
}

// Получаем старый пароль с базы данных
function getPasswordHandler() {

    let data = {};
    data.id = id.value;
    data.password = oldPassword.value;
    $.ajax({
        url: "/admin/profile/get_password",
        type: "post",
        data: data,
        success: function(data, textStatus, jqXHR) {
            if (data.status == 'SUCCESS') {
                toastr.success(data.message);
                oldPassword.classList.remove('is-invalid');
                oldPassword.classList.add('is-valid');
                newPassword.removeAttribute('disabled');
                repeatNewPassword.removeAttribute('disabled');
                btnPasswordSubmit.removeAttribute('disabled');
                btnPasswordSubmit.removeEventListener('click', ban);
                btnPasswordSubmit.addEventListener('click', updatePasswordHandler);
            }
            if (data.status == 'ERROR') {
                // toastr.error(data.message);
                oldPassword.classList.remove('is-valid');
                oldPassword.classList.add('is-invalid');
                newPassword.setAttribute('disabled', 'disabled');
                repeatNewPassword.setAttribute('disabled', 'disabled');
                btnPasswordSubmit.setAttribute('disabled', 'disabled');
                btnPasswordSubmit.removeEventListener('click', updatePasswordHandler);
                btnPasswordSubmit.addEventListener('click', ban);
            }
        } 
    });
}

// Открытие или скрытие пароля
function togglePasswordHandler() {
    event.currentTarget.innerHTML = event.currentTarget.firstChild.classList.contains('fa-eye-slash') ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
    event.currentTarget.parentNode.previousElementSibling.type = event.currentTarget.firstChild.classList.contains('fa-eye-slash') ? 'password' : 'text';
}

// Получение регионов
function getRegions() {
    let data = {};
    data.country_id = countries.value;
    $.ajax({
        url: "/admin/profile/get_regions",
        type: "post",
        data: data,
        success: function(data, textStatus, jqXHR) {
            if (data.status == 'SUCCESS') {
                regions.innerHTML = "";               
                let options = '<option value="">Select Region</option>';
                for (i=0; i<data.data.length; i++) {
                    options += '<option value="'+data.data[i].id+'">'+data.data[i].name+'</option>';
                }
                regions.innerHTML = options;
                regions.removeAttribute('disabled');
            }
            if (data.status == 'ERROR') {
                regions.innerHTML = "";
                let options = '<option value="">Select Region</option>';
                regions.innerHTML = options;
                regions.setAttribute('disabled', 'disabled');
                options = '<option value="">Select City</option>';
                cities.innerHTML = options;
                cities.setAttribute('disabled', 'disabled');
            }
        }
    });
}

// Получение городов
function getCities() {
    let data = {};
    data.country_id = countries.value;
    data.region_id = regions.value;
    $.ajax({
        url: "/admin/profile/get_cities",
        type: "post",
        data: data,
        success: function(data, textStatus, jqXHR) {
            if (data.status == 'SUCCESS') {
                cities.innerHTML = "";               
                let options = '<option value="">Select City</option>';
                for (i=0; i<data.data.length; i++) {
                    options += '<option value="'+data.data[i].id+'">'+data.data[i].name+'</option>';
                }
                cities.innerHTML = options;
                cities.removeAttribute('disabled');
            }
            if (data.status == 'ERROR') {
                cities.innerHTML = "";
                let options = '<option value="">Select City</option>';
                cities.innerHTML = options;
                cities.setAttribute('disabled', 'disabled');
            }
        }
    });
}

// Баним кнопку отправки формы
function ban() {
    event.preventDefault();
}

// События
btnSubmit.addEventListener('click', editHandler);

btnPasswordSubmit.addEventListener('click', ban);

oldPassword.addEventListener('keyup', getPasswordHandler);

const tp = document.querySelectorAll('#changePassword .toggle-password');
for (i=0; i<tp.length; i++) {
    tp[i].addEventListener('click', togglePasswordHandler);
}

SelectCountry.addEventListener('change', getRegions);
SelectRegion.addEventListener('change', getCities);

//Initialize Select2 Elements
// $('.select2').select2();



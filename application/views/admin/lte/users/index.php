<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

?>

<?php if (isset($rights) && $rights->right_create == 1): ?>
<div class="row">
	<div class="col-12">
		<div class="card card-primary collapsed-card">
			<div class="card-header">
				<h3 class="card-title">Form</h3>
				<div class="card-tools">
					<!-- <button type="button" class="btn btn-tool" data-widget="maximize" data-card-widget="maximize"><i class="fas fa-expand"></i></button> -->
					<button type="button" class="btn btn-tool" data-widget="collapse" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
					<!-- <button type="button" class="btn btn-tool" data-widget="remove" data-card-widget="remove"><i class="fas fa-times"></i></button> -->
				</div>
			</div>
			<div class="card-body">
				<form id="Form">			
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-6 col-xs-12">
								<label for="InputSurname">Фамилия</label>
								<input type="text" class="form-control" id="InputSurname" placeholder="Введите фамилию" name="surname">
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<label for="InputName">Имя</label>
								<input type="text" class="form-control" id="InputName" placeholder="Введите имя" name="name">
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<label for="InputPatronymic">Отчество</label>
								<input type="text" class="form-control" id="InputPatronymic" placeholder="Введите отчество" name="patronymic">
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<label for="InputEmail">Email</label>
								<input type="email" class="form-control" id="InputEmail" placeholder="Введите почтовый ящик" name="email">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-6 col-xs-12">
								<label for="InputPassword">Пароль</label>
								<input type="password" class="form-control" id="InputPassword" placeholder="Введите пароль" name="password" disabled>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<label for="InputCountry">Страна</label>
								<input type="text" class="form-control" id="InputCountry" placeholder="Enter country" name="country" readonly="readonly">
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<label for="InputRegion">Регион</label>
								<input type="text" class="form-control" id="InputRegion" placeholder="Enter region" name="region" readonly="readonly">
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<label for="InputCity">Город</label>
								<input type="text" class="form-control" id="InputCity" placeholder="Enter city" name="city" readonly="readonly">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">							
							<div class="col-md-3 col-sm-6 col-xs-12">
								<label for="InputAddress">Адрес</label>
								<input type="text" class="form-control" id="InputAddress" placeholder="Введите адрес" name="address">
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<label for="InputPost">Почтовый индекс</label>
								<input type="text" class="form-control" id="InputPost" placeholder="Введите почтовый индекс" name="post">
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<label for="InputEducation">Образование</label>
								<input type="text" class="form-control" id="InputEducation" placeholder="Введите образование" name="education">
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<label for="InputProfession">Профессия</label>
								<input type="text" class="form-control" id="InputProfession" placeholder="Введите профессию" name="profession">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-6 col-xs-12">
								<label for="InputSkills">Навыки</label>
								<input type="text" class="form-control" id="InputSkills" placeholder="Введите навыки через запятую" name="skills">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="icheck-primary d-inline">
									<input type="checkbox" id="CheckboxStatus" name="status">
									<label for="CheckboxStatus">Статус</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="icheck-primary d-inline">
									<input type="radio" name="gender" value="1" id="RadioMale" checked>
									<label for="RadioMale">Мужчина</label>
								</div>
								<div class="icheck-primary d-inline">
									<input type="radio" name="gender" value="0" id="RadioFemale">
									<label for="RadioFemale">Женщина</label>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<label for="InputAbout">О себе</label>
								<textarea cols="30" rows="4" class="form-control" id="InputAbout" placeholder="Расскажите о себе" name="about"></textarea>
							</div>
						</div>
					</div>				

					<div class="form-group" style="display: none;">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<label for="InputFile">Загрузить файл</label>
								<div class="input-group">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="InputFile" name="image" placeholder="fff">
										<label class="custom-file-label" for="InputFile">Выбрать файл</label>
									</div>
									<div class="input-group-append">
										<span class="input-group-text" data-handler="uploadImage">Загрузить на сервер</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="card-footer text-right">
				<button type="submit" class="btn btn-info mb-2" data-handler="clearForm" style="display: none;">Очистить и закрыть форму</button>
				<button type="submit" class="btn btn-success mb-2" data-handler="editRow" style="display: none;">Редактировать данные</button>
				<button type="submit" class="btn btn-primary mb-2" data-handler="createRow">Добавить данные</button>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>

<div class="row" hidden>
	<div class="col-12">
		<div class="card card-success card-outline" id="CardFields">
			<div class="card-header">
				<h3 class="card-title">Поля</h3>
			</div>
			<div class="card-body" id="CardBodyFields">
				<div class="row">
					<div class="col-md-12"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<h3 class="card-title"><?php echo $title_page; ?></h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-widget="maximize" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
					<div class="btn-group">
						<button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
							<i class="fas fa-wrench"></i>
						</button>
						<div class="dropdown-menu dropdown-menu-right" role="menu">
							<a href="#" class="dropdown-item" data-handler="selectRows">Select</a>
							<a href="#" class="dropdown-item" data-handler="updateRows">Update</a>
							<a href="#" class="dropdown-item" data-handler="deleteRows">Delete</a>
							<a class="dropdown-divider"></a>
							<a href="#" class="dropdown-item" data-handler="refreshTable">Refresh</a>
						</div>
					</div>
					<button type="button" class="btn btn-tool" data-widget="collapse" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
					<!-- <button type="button" class="btn btn-tool" data-widget="remove" data-card-widget="remove"><i class="fas fa-times"></i></button> -->
				</div>
			</div>
			<div class="card-body">
				<table id="DataTable" class="table table-bordered table-hover"></table>
			</div>
			<div class="card-footer"></div>
			<div class="overlay dark">
				<i class="fas fa-2x fa-sync-alt fa-spin"></i>
			</div>
		</div>
	</div>
</div>


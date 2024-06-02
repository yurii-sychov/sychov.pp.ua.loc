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
				<h3 class="card-title">Форма</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-widget="maximize" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
					<button type="button" class="btn btn-tool" data-widget="collapse" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
					<!-- <button type="button" class="btn btn-tool" data-widget="remove" data-card-widget="remove"><i class="fas fa-times"></i></button> -->
				</div>
			</div>
			<div class="card-body">
				<form id="Form">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-6 col-xs-12">
								<label for="SelectFilial">Филиал</label>
								<select class="form-control" id="SelectFilial" name="filial" style="width: 100%;">
									<option value="">Выберите филиал</option>
									<?php foreach ($filials as $filial): ?>
										<option value="<?php echo $filial->id; ?>"><?php echo $filial->name; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<label for="SelectStantion">Подстанция</label>
								<select class="form-control" id="SelectStantion" name="stantion" style="width: 100%;">
									<option value="">Выберите подстанцию</option>
									<?php foreach ($stantions as $stantion): ?>
										<option value="<?php echo $stantion->id; ?>"><?php echo $stantion->name; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<label for="InputType">Тип</label>
								<input type="text" class="form-control" id="InputType" placeholder="Введите тип" name="type">
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<label for="InputFactoryNumber">Заводской №</label>
								<input type="text" class="form-control" id="InputFactoryNumber" placeholder="Введите заводской №" name="factory_number">
							</div>

							<div class="col-md-12 col-sm-12 col-xs-12">
								<label for="InputConnection">Присоединение</label>
								<input type="text" class="form-control" id="InputConnection" placeholder="Введите присоединение" name="connection">
							</div>

							<div class="col-md-3 col-sm-6 col-xs-12">
							    <label for="InputInstallationLocation">Место установки</label>
								<input type="text" class="form-control" id="InputInstallationLocation" placeholder="Введите место установки" name="installation_location">
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<label for="InputCoefficient">Коэффициент трансформации</label>
								<input type="number" class="form-control" id="InputCoefficient" placeholder="Введите коэффициент трансформации" name="coefficient">
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<label for="SelectTypeNeeds">Тип нужд</label>
								<select class="form-control" id="SelectTypeNeeds" name="type_needs" style="width: 100%;">
									<option value="">Выберите тип нужд</option>
									<option value="1">Собственные нужды</option>
									<option value="2">Хозяйственные нужды</option>
								</select>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<label for="InputYearMade">Год выпуска</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
									</div>
									<input type="text" class="form-control" id="InputYearMade" placeholder="Enter Year Made" name="year_made" maxlength="10" autocomplete="off">
								</div>
							</div>
							
							<div class="form-group col-md-12 col-sm-12 col-xs-12" style="display: none;">
								<label for="InputFile">Фото</label>
								<div class="input-group">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="InputFile" name="image">
										<label class="custom-file-label" for="InputFile">Выберите фото</label>
									</div>
									<div class="input-group-append">
										<span class="input-group-text" data-handler="uploadImage">Upload</span>
									</div>
								</div>
							</div>

							<div class="col-md-3 col-sm-6 col-xs-12" hidden>
								<div class="icheck-primary d-inline">
									<input type="checkbox" id="CheckboxStatus" name="status" checked>
									<label for="CheckboxStatus">В работе счётчик</label>
								</div>
							</div>

							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="check-primary d-inline">
									<label for="TextareaHistory">История электросчётчика</label>
									<textarea id="TextareaHistory" name="history" class="form-control summernote" style="resize: vertical;" rows="10"></textarea>
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

<div class="row">
	<div class="col-12">
		<div class="card card-warning card-outline" id="CardFilter">
			<div class="card-header">
				<h3 class="card-title">Фильтр</h3>
			</div>
			<div class="card-body" id="CardBodyFilter">
				<div class="row">
					<!-- <div class="col-md-2 pb-2">
						<select class="form-control" id="FilterFilial" data-handler="filterFilial">
							<option value="">Select Filial</option>
							<?php foreach ($filials as $filial): ?>
								<option value="<?php echo htmlspecialchars($filial->name); ?>"><?php echo $filial->name; ?></option>
							<?php endforeach; ?>
						</select>
					</div> -->
					<div class="col-md-2 mb-2">
						<select class="form-control" id="FilterStantion" data-handler="filterStantion">
							<option value="">Выберите подстанцию</option>
							<?php foreach ($stantions as $stantion): ?>
								<option value="<?php echo htmlspecialchars($stantion->name); ?>"><?php echo $stantion->name; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-2 mb-2">
						<select class="form-control" id="FilterTypeNeeds" data-handler="filterTypeNeeds">
							<option value="">Выберите тип нужд</option>
							<option value="1">Собственные нужды</option>
							<option value="2">Хозяйственные нужды</option>
						</select>
					</div>
					<div class="col-md-2 mb-2">
						<button type="button" class="btn btn-block btn-danger" data-handler="resetFilters">Сбросить фильтры</button>
					</div>
					<div class="col-md-2 mb-2">
						<a href="/admin/electric_meters_data/add" class="btn btn-block btn-success">Добавить показания</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row" style="display: none;">
	<div class="col-12" style="display: none;">
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
							<a href="#" class="dropdown-item" data-handler="selectRows">Выбрать</a>
							<a href="#" class="dropdown-item" data-handler="updateRows">Изменить</a>
							<a href="#" class="dropdown-item" data-handler="deleteRows">Удалить</a>
							<a class="dropdown-divider"></a>
							<a href="#" class="dropdown-item" data-handler="refreshTable">Обновить</a>
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


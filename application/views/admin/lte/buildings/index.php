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
				</div>
			</div>
			<div class="card-body">
				<form id="Form">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-6 col-xs-12">
								<label for="SelectFilial">Филиал</label>
								<select class="form-control disabled" id="SelectFilial" name="filial" style="width: 100%;">
									<option value="">Выберите филиал</option>
									<?php foreach ($filials as $filial): ?>
										<option value="<?php echo $filial->id; ?>" <?php echo $filial->id ? 'selected' : null; ?>><?php echo $filial->name; ?></option>
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
								<label for="InputName">Наименование здания или сооружения</label>
								<input type="text" class="form-control" id="InputName" placeholder="Введите наименование здания или сооружения" name="name">
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<label for="InputSquare">Площадь здания или сооружения</label>
								<input type="text" class="form-control" id="InputSquare" placeholder="Введите площадь здания или сооружения" name="square">
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
					<div class="col-md-2 mb-2">
						<select class="form-control" id="FilterFilial" data-handler="filterFilial" disabled="disabled">
							<option value="">Выберите филиал</option>
							<?php foreach ($filials as $filial): ?>
								<option value="<?php echo htmlspecialchars($filial->name); ?>"><?php echo $filial->name; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-2 mb-2">
						<select class="form-control" id="FilterStantion" data-handler="filterStantion">
							<option value="">Выберите подстанцию</option>
							<?php foreach ($stantions as $stantion): ?>
								<option value="<?php echo htmlspecialchars($stantion->name); ?>"><?php echo $stantion->name; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-2 mb-2">
						<button type="button" class="btn btn-block btn-danger" data-handler="resetFilters">Сбросить фильтры</button>
					</div>
					<div class="col-md-2 mb-2">
						<a href="/admin/building/info?field=stantion&sort=asc" class="btn btn-block btn-success">Информация</a>
					</div>
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

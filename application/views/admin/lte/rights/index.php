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
							<div class="col-md-6 col-sm-6 col-xs-12">
								<label for="SelectUser">Пользователь</label>
								<select class="form-control disabled" id="SelectUser" name="user" style="width: 100%;">
									<option value="">Выберите пользователя</option>
									<?php foreach ($users as $user): ?>
										<option value="<?php echo $user->id; ?>"><?php echo $user->surname. ' '.$user->name. ' '.$user->patronymic; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<label for="SelectPage">Страница</label>
								<select class="form-control" id="SelectPage" name="page" style="width: 100%;">
									<option value="">Выберите страницу</option>
									<?php foreach ($pages as $page): ?>
										<option value="<?php echo $page->id; ?>"><?php echo $page->page_name; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="icheck-primary d-inline">
									<input type="checkbox" id="CheckboxRightsCreate" name="right_create">
									<label for="CheckboxRightsCreate">Право создавать</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="icheck-primary d-inline">
									<input type="checkbox" id="CheckboxRightsRead" name="right_read">
									<label for="CheckboxRightsRead">Право читать</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="icheck-primary d-inline">
									<input type="checkbox" id="CheckboxRightsUpdate" name="right_update">
									<label for="CheckboxRightsUpdate">Право изменять</label>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="icheck-primary d-inline">
									<input type="checkbox" id="CheckboxRightsDelete" name="right_delete">
									<label for="CheckboxRightsDelete">Право удалять</label>
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

<div class="row" hidden >
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

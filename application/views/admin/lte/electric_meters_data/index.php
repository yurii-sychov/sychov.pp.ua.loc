<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

?>

<?php if (isset($rights) && $rights->right_create == 1): ?>
<div class="row" style="display: none;">
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

				</form>
			</div>
			<div class="card-footer text-right">
				<button type="submit" class="btn btn-info" data-handler="clearForm" style="display: none;">Очистить и закрыть форму</button>
				<button type="submit" class="btn btn-success" data-handler="editRow" style="display: none;">Редактировать данные</button>
				<button type="submit" class="btn btn-primary" data-handler="addMetersData">Добавить показания</button>
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
					<div class="col-md-2 pb-2">
						<select class="form-control" id="FilterStantion" data-handler="filterStantion">
							<option value="">Выберите подстанцию</option>
							<?php foreach ($stantions as $stantion): ?>
								<option value="<?php echo htmlspecialchars($stantion->name); ?>"><?php echo $stantion->name; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-2 pb-2">
						<select class="form-control" id="FilterTypeNeeds" data-handler="filterTypeNeeds">
							<option value="">Выберите тип нужд</option>
							<option value="1">Собственные нужды</option>
							<option value="2">Хозяйственные нужды</option>
						</select>
					</div>
					<div class="col-md-2 pb-2">
						<button type="button" class="btn btn-block btn-danger" data-handler="resetFilters">Сбросить фильтры</button>
					</div>
					<div class="col-md-2 pb-2">
						<a href="/admin/electric_meters_data/add" class="btn btn-block btn-success">Добавить показания</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row" style="display: none;">
	<div class="col-12" hidden>
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
					<!-- <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i></button> -->
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


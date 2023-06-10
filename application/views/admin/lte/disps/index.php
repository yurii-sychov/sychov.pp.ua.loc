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
		<div class="card card-primary collapsed-card" id="CardForm">
			<div class="card-header">
				<h3 class="card-title">Form</h3>
				<div class="card-tools">
					<!-- <button type="button" class="btn btn-tool" data-widget="maximize" data-card-widget="maximize"><i class="fas fa-expand"></i></button> -->
					<button type="button" class="btn btn-tool" data-widget="collapse" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
					<!-- <button type="button" class="btn btn-tool" data-widget="remove" data-card-widget="remove"><i class="fas fa-times"></i></button> -->
				</div>
			</div>
			<div class="card-body" id="CardBodyForm">
				<form id="Form">			
					<div class="form-group">
						<label for="SelectFilial">Filial</label>
						<select class="form-control" id="SelectFilial" name="filial" style="width: 100%;">
							<option value="">Select Filial</option>
							<?php foreach ($filials as $filial): ?>
								<option value="<?php echo $filial->id; ?>"><?php echo $filial->name; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="SelectStantion">Stantion</label>
						<select class="form-control" id="SelectStantion" name="stantion" style="width: 100%;">
							<option value="">Select Stantion</option>
							<?php foreach ($stantions as $stantion): ?>
								<option value="<?php echo $stantion->id; ?>"><?php echo $stantion->name; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="SelectEquipment">Equipment</label>
						<select class="form-control" id="SelectEquipment" name="equipment" style="width: 100%;">
							<option value="">Select Equipment</option>
							<?php foreach ($equipments as $equipment): ?>
								<option value="<?php echo $equipment->id; ?>"><?php echo $equipment->name; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="InputName">Name</label>
						<input type="text" class="form-control" id="InputName" placeholder="Enter name" name="name">
					</div>
					<div class="form-group">
						<label for="InputTip">Tip</label>
						<input type="text" class="form-control" id="InputTip" placeholder="Enter tip" name="tip">
					</div>
					<div class="form-group">
						<label for="InputYearMade">Year Made</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
							</div>
							<input type="text" class="form-control" id="InputYearMade" placeholder="Enter Year Made" name="year_made" maxlength="10" autocomplete="off">
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
						<select class="form-control" id="FilterFilial" data-handler="filterFilial">
							<option value="">Select Filial</option>
							<?php foreach ($filials as $filial): ?>
								<option value="<?php echo htmlspecialchars($filial->name); ?>"><?php echo $filial->name; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-2 mb-2">
						<select class="form-control" id="FilterStantion" data-handler="filterStantion">
							<option value="">Select Stantion</option>
							<?php foreach ($stantions as $stantion): ?>
								<option value="<?php echo htmlspecialchars($stantion->name); ?>"><?php echo $stantion->name; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-2 mb-2">
						<select class="form-control" id="FilterEquipment" data-handler="filterEquipment">
							<option value="">Select Equipment</option>
							<?php foreach ($equipments as $equipment): ?>
								<option value="<?php echo htmlspecialchars($equipment->name); ?>"><?php echo $equipment->name; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-2 mb-2">
						<button type="button" class="btn btn-block btn-primary" data-handler="generateSchedules">Сгенерировать чудо</button>
					</div>
					<div class="col-md-2 mb-2">
						<button type="button" class="btn btn-block btn-danger" data-handler="resetFilters">Сбросить фильтры</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

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


<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

?>

<?php if ($this->session->userdata('user')->group === 'root_admin' || $this->session->userdata('user')->group === 'super_admin'): ?>
<div class="row">
	<div class="col-12">
		<div class="card card-warning" id="CardGenerateSchedules">
			<div class="card-header">
				<h3 class="card-title">Генерування графіків</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-widget="collapse" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
				</div>
			</div>
			<div class="card-body" id="CardBodyGenerateSchedules">
				<?php if ($this->session->userdata('user')->group === 'root_admin' || $this->session->userdata('user')->group === 'super_admin'): ?>				
					<ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link <?php echo $this->session->userdata('user')->subdivision_id == 1 ? 'active' : null; ?>" id="SpContent-tab" data-toggle="pill" href="#SpContent" role="tab" aria-controls="SpContent" aria-selected="true">СП</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php echo $this->session->userdata('user')->subdivision_id == 2 ? 'active' : null; ?>" id="SdzpContent-tab" data-toggle="pill" href="#SdzpContent" role="tab" aria-controls="SdzpContent" aria-selected="false">СДЗП</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php echo $this->session->userdata('user')->subdivision_id == 3 ? 'active' : null; ?>" id="SrzaContent-tab" data-toggle="pill" href="#SrzaContent" role="tab" aria-controls="SrzaContent-tab" aria-selected="false">СРЗА</a>
						</li>
					</ul>
						<div class="tab-content" id="TabContent">
							<div class="tab-pane fade <?php echo $this->session->userdata('user')->subdivision_id == 1 ? 'show active' : null; ?>" id="SpContent" role="tabpanel" aria-labelledby="SpContent-tab">
								<div class="row">
									<div class="col-md-4 pb-2 pt-2">
										<button type="button" class="btn btn-block btn-success" data-handler="generateScheduleBigRepair"><i class="far fa-calendar-alt"></i> Сгенерувати</button>
										<p class="text-center"><strong>Графік капітальних ремонтів<br/> на <?php echo date('Y')+1; ?> рік</strong></p>
									</div>
									<div class="col-md-4 pb-2 pt-2">
										<button type="button" class="btn btn-block btn-info" data-handler="generateSchedulePermanentRepair"><i class="far fa-calendar-alt"></i> Сгенерувати</button>
										<p class="text-center"><strong>Графік поточних ремонтів<br/> на <?php echo date('Y')+1; ?> рік</strong></p>
									</div>
									<div class="col-md-4 pb-2 pt-2">
										<button type="button" class="btn btn-block btn-danger" data-handler="generateScheduleTechnicalService"><i class="far fa-calendar-alt"></i> Сгенерувати</button>
										<p class="text-center"><strong>Графік технічного обслуговування<br/> на <?php echo date('Y')+1; ?> рік</strong></p>
									</div>
								</div>
							</div>
							<div class="tab-pane fade <?php echo $this->session->userdata('user')->subdivision_id == 2 ? 'show active' : null; ?>" id="SdzpContent" role="tabpanel" aria-labelledby="SdzpContent-tab">
								<div class="row">	
									<div class="col-md-4 pb-2 pt-2">
										<button type="button" class="btn btn-block btn-secondary" disabled data-handler="generateScheduleIsp"><i class="far fa-calendar-alt"></i> Сгенерувати</button>
										<p class="text-center"><strong>Графік профілактичних в/в випробувань<br/> на <?php echo date('Y')+1; ?> рік</strong></p>
									</div>
									<div class="col-md-4 pb-2 pt-2">
										<button type="button" class="btn btn-block btn-secondary" disabled data-handler="generateScheduleIspAfterKapService"><i class="far fa-calendar-alt"></i> Сгенерувати</button>
										<p class="text-center"><strong>Графік в/в випробувань після КР<br/> на <?php echo date('Y')+1; ?> рік</strong></p>
									</div>
									<div class="col-md-4 pb-2 pt-2">
										<button type="button" class="btn btn-block btn-secondary" disabled data-handler="generateScheduleIspAfterKompleksKapService"><i class="far fa-calendar-alt"></i> Сгенерувати</button>
										<p class="text-center"><strong>Графік в/в випробувань після ККР<br/> на <?php echo date('Y')+1; ?> рік</strong></p>
									</div>
								</div>
							</div>
							<div class="tab-pane fade <?php echo $this->session->userdata('user')->subdivision_id == 3 ? 'show active' : null; ?>" id="SrzaContent" role="tabpanel" aria-labelledby="SrzaContent-tab">
								<div class="row">
									<div class="col-md-4 pb-2 pt-2">
										<button type="button" class="btn btn-block btn-secondary" disabled data-handler="generateScheduleRza"><i class="far fa-calendar-alt"></i> Сгенерувати</button>
										<p class="text-center"><strong>Графік перевірки РЗА<br/> на <?php echo date('Y')+1; ?> рік</strong></p>
									</div>
								</div>
							</div>
						</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>

<?php if ($this->session->userdata('user')->right_create == 1 AND $this->session->userdata('user')->right_update == 1): ?>
<div class="row">
	<div class="col-12">
		<div class="card card-primary collapsed-card" id="CardForm">
			<div class="card-header">
				<h3 class="card-title">Форма</h3>
				<div class="card-tools">
					<!-- <button type="button" class="btn btn-tool" data-widget="maximize" data-card-widget="maximize"><i class="fas fa-expand"></i></button> -->
					<button type="button" class="btn btn-tool" data-widget="collapse" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
					<!-- <button type="button" class="btn btn-tool" data-widget="remove" data-card-widget="remove"><i class="fas fa-times"></i></button> -->
				</div>
			</div>
			<div class="card-body" id="CardBodyForm">
				<form id="Form">			
					<div class="form-group">
						<label for="InputFilial">Підрозділ</label>
						<input type="text" class="form-control" id="InputFilial" placeholder="Enter filial" name="filial" disabled>
					</div>
					<div class="form-group">
						<label for="InputStantion">Підстанція</label>
						<input type="text" class="form-control" id="InputStantion" placeholder="Enter stantion" name="stantion" disabled>
					</div>
					<div class="form-group">
						<label for="InputEquipment">Обладнання</label>
						<input type="text" class="form-control" id="InputEquipment" placeholder="Enter equipment" name="equipment" disabled>
					</div>
					<div class="form-group">
						<label for="InputDisp">Диспеичерська назва</label>
						<input type="text" class="form-control" id="InputDisp" placeholder="Enter disp" name="disp" disabled>
					</div>
					<div class="form-group">
						<label for="InputTip">Тип</label>
						<input type="text" class="form-control" id="InputTip" placeholder="Enter tip" name="tip" disabled>
					</div>
					<div class="form-group">
						<label for="InputYearMade">Рік виготовлення</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
							</div>
							<input type="text" class="form-control" id="InputYearMade" placeholder="Enter year made" name="year_made" autocomplete="off" disabled>
						</div>
					</div>
					<div class="form-group">
						<label for="InputTipService">Тип обслуговування</label>
						<input type="text" class="form-control" id="InputTipService" placeholder="Enter tip service" name="tip_service" disabled>
					</div>
					<div class="form-group">
						<label for="InputDateService">Дата останього обслуговування</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
							</div>
							<input type="text" class="form-control" id="InputDateService" placeholder="Enter date service" name="date_service" maxlength="10" autocomplete="off">
						</div>
					</div>
					<div class="form-group">
						<label for="InputPeriodicity">Періодичність</label>
						<input type="number" class="form-control" id="InputPeriodicity" placeholder="Enter Periodicity" name="periodicity" min=1 max="12" maxlength="2" autocomplete="off">
					</div>
				</form>
			</div>
			<div class="card-footer text-right">
				<button type="submit" class="btn btn-info mb-2" data-handler="clearForm" style="display: none;">Очистить и закрыть форму</button>
				<button type="submit" class="btn btn-success mb-2" data-handler="editRow" style="display: none;">Редактировать данные</button>
				<!-- <button type="submit" class="btn btn-primary mb-2" data-handler="createRow">Добавить данные</button> -->
			</div>
		</div>
	</div>
</div>
<?php endif; ?>

<div class="row">
	<div class="col-12">
		<div class="card card-info card-outline" id="CardFilter">
			<div class="card-header">
				<h3 class="card-title">Фільтри</h3>
			</div>
			<div class="card-body" id="CardBodyFilter">
				<div class="row">
					<div class="col-md-2 mb-2">
						<select class="form-control" id="FilterFilial" data-handler="filterFilial">
							<option value="">Виберіть підрозділ</option>
							<?php foreach ($filials as $filial): ?>
								<option value="<?php echo htmlspecialchars($filial->name); ?>"><?php echo $filial->name; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-2 mb-2">
						<select class="form-control" id="FilterStantion" data-handler="filterStantion">
							<option value="">Виберіть підстанцію</option>
							<?php foreach ($stantions as $stantion): ?>
								<option value="<?php echo htmlspecialchars($stantion->name); ?>"><?php echo $stantion->name; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-2 mb-2">
						<select class="form-control" id="FilterEquipment" data-handler="filterEquipment">
							<option value="">Виберіть обладнання</option>
							<?php foreach ($equipments as $equipment): ?>
								<option value="<?php echo htmlspecialchars($equipment->name); ?>"><?php echo $equipment->name; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-2 mb-2">
						<select class="form-control" id="FilterTipService" data-handler="filterTipService">
							<option value="">Виберіть тип обслуговування</option>
							<?php foreach ($tip_services as $tip_service): ?>
								<option value="<?php echo htmlspecialchars($tip_service->name); ?>"><?php echo $tip_service->name; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-2 mb-2">
						<button type="button" class="btn btn-block btn-danger" data-handler="resetFilters">Скинути фильтри</button>
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
				<h3 class="card-title">Колонки</h3>
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
							<?php if ($this->session->userdata('user')->right_update == 1): ?>
							<a href="#" class="dropdown-item" data-handler="updateModeAllRows">Режим оновлення</a>
							<?php endif; ?>
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


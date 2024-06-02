<div class="row">
	<div class="col-12">
		<div class="card card-warning card-outline" id="CardFilter">
			<div class="card-header">
				<h3 class="card-title">Фильтр</h3>
			</div>
			<div class="card-body" id="CardBodyFilter">
				<div class="row">
					<div class="col-md-2 pb-2">
						<label for="FilterStantion">По подстанции</label>
						<select class="form-control" id="FilterStantion" onChange="searchElectricMeters(event)" name="stantion">
							<option value="">Выберите подстанцию</option>
							<?php foreach ($stantions as $stantion): ?>
								<option value="<?php echo htmlspecialchars($stantion->name); ?>"><?php echo $stantion->name; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-2 pb-2">
						<label for="FilterFactoryNumber">По номеру</label>
						<input class="form-control" id="FilterFactoryNumber" name="factory_number" onKeyup="searchElectricMeters(event)" />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if (isset($rights) && $rights->right_create == 1): ?>
<div class="row">
	<div class="col-12">
		<div class="card card-primary collapsed-car">
			<div class="card-header">
				<h3 class="card-title">Форма добавления показаний собственных нужд</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-widget="maximize" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
					<button type="button" class="btn btn-tool" data-widget="collapse" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
					<!-- <button type="button" class="btn btn-tool" data-widget="remove" data-card-widget="remove"><i class="fas fa-times"></i></button> -->
				</div>
			</div>
			<div class="card-body">
				<form id="Form">	
					<div class="table-responsive">				
						<table class="table table-bordered table-hover">
							<thead>
								<tr class="text-center">
									<th class="align-middle" width="5%">#</th>
									<th class="align-middle" width="15%">Подстанция</th>
									<th class="align-middle" width="15%">Присоединение</th>
									<th class="align-middle" width="6%">Номер<br />счётчика</th>
									<th class="align-middle" width="6%">Ктр.</th>
									<th class="align-middle" width="10%">Дата снятия<br />текущих показаний</th>
									<th class="align-middle" width="6%">Текущие<br />показания</th>
									<th class="align-middle" width="6%">Предыдущие<br />показания</th>
									<th class="align-middle" width="6%">Разница<br />показаний</th>
									<th class="align-middle" width="10%">Дата добавления<br />предыдущих показаний</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($electric_meters as $item): ?>
								<tr>
									<td class="text-center">
										<?php echo $item->id; ?>
										<input class="text-center" type="hidden" name="id[]" style="width: 100%;" value="<?php echo $item->id; ?>" />
									</td>

									<td><?php echo $item->stantion; ?></td>

									<td><?php echo $item->connection; ?></td>

									<td class="text-center"><?php echo $item->factory_number; ?></td>

									<td class="text-center">
										<?php echo $item->coefficient; ?>
										<input class="text-center" type="hidden" name="coefficient[]" style="width: 100%;" value="<?php echo $item->coefficient; ?>" />
									</td>

									<td><input class="text-center form-control" type="text" name="date_of_reading[]" value="<?php echo date('Y-m-d') ?>" /></td>

									<td><input class="text-center form-control" type="text" name="current[]" onKeyup="calcDifference(event)" onChange="calcDifference(event)" /></td>
									
									<td class="text-center">
										<?php echo isset($item->previous) ? $item->previous : 'Нет данных'; ?>
										<input class="text-center" type="hidden" name="previous[]" style="width: 100%;" value="<?php echo isset($item->previous) ? $item->previous: 0; ?>" />
									</td>

									<td class="text-center difference"></td>

									<td class="text-center"><?php echo isset($item->created_at) ? $item->created_at : 'Нет данных'; ?></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
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
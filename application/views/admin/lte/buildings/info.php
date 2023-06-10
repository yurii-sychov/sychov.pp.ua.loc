<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

?>

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
				<div class="table-responsive">				
					<table class="table table-bordered table-hover">
						<thead>
							<tr class="text-center">
								<th class="align-middle" width="5%">#</th>
								<th class="align-middle" width="45%"><a href="<?php echo ($this->input->get('field') === 'stantion' && $this->input->get('sort') === 'asc') ? '?field=stantion&sort=desc' : '?field=stantion&sort=asc'; ?>">Подстанция</a></th>
								<th class="align-middle" width="25%"><a href="<?php echo ($this->input->get('field') === 'full_square' && $this->input->get('sort') === 'asc') ? '?field=full_square&sort=desc' : '?field=full_square&sort=asc'; ?>">Общая площадь строений, м<sup>2</sup></a></th>
								<th class="align-middle" width="25%">Площадь электроустановки, м<sup>2</sup></th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; $sum=0; foreach ($full_squares as $item): ?>
							<tr>
								<td class="text-center"><?php echo $i ?></td>
								<td><?php echo $item->stantion; ?></td>
								<td class="text-center"><?php echo $item->full_square; ?></td>
								<td class="text-center"><?php echo "-" ?></td>
							</tr>
							<?php $i++; $sum+=$item->full_square; endforeach; ?>
                            <tr>
                                <th class="text-right" colspan="2">&#1048;&#1090;&#1086;&#1075;&#1086;:</th>
                                <th class="text-center"><?php echo $sum; ?></th>
                                <th></th>
                            </tr>
						</tbody>
					</table>
				</div>
			<div class="card-footer text-right">
					<a href="/admin/building" class="btn btn-success">Назад</a>
			</div>
		</div>
	</div>
</div>

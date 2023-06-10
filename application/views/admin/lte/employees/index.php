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
						<label for="InputName">Name</label>
						<input type="text" class="form-control" id="InputName" placeholder="Name" name="name">
					</div>
					<div class="form-group">
						<label for="InputSurname">Surname</label>
						<input type="text" class="form-control" id="InputSurname" placeholder="Surname" name="surname">
					</div>
					<div class="form-group">
						<label for="InputEmail">Email address</label>
						<input type="email" class="form-control" id="InputEmail" placeholder="Enter email" name="email">
					</div>
					<div class="form-group" style="display: none;">
						<label for="InputFile">File input</label>
						<div class="input-group">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="InputFile" name="image">
								<label class="custom-file-label" for="InputFile">Choose file</label>
							</div>
							<div class="input-group-append">
								<span class="input-group-text" data-handler="uploadImage">Upload</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="InputProfession">Profession</label>
						<input type="text" class="form-control" id="InputProfession" placeholder="Enter profession" name="profession">
					</div>
					<div class="form-group">
						<div class="icheck-primary d-inline">
							<input type="checkbox" id="CheckboxStatus" name="status">
							<label for="CheckboxStatus">Show on the main page</label>
						</div>
					</div>
					<div class="form-group">
						<div class="icheck-primary d-inline">
							<input type="radio" name="gender" value="1" id="RadioMale" checked>
							<label for="RadioMale">Male</label>
						</div>
						<div class="icheck-primary d-inline">
							<input type="radio" name="gender" value="0" id="RadioFemale">
							<label for="RadioFemale">Female</label>
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


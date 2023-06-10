<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo isset($title) ? $title : "SychovLib - AdminLTE"; ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Flag-icon-css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
	<!-- Toastr -->
	<link rel="stylesheet" href="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>plugins/toastr/toastr.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<?php if ($datatables): ?>
	<!-- Datatables -->
	<link rel="stylesheet" href="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<?php endif; ?>
	
	<?php if (isset($css)): ?>
		<!-- CSS -->
		<?php foreach ($css as $key => $value): ?>
			<?php echo "<!-- ".$key." -->\n"; ?>
			<link rel="stylesheet" href="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'.$value; ?>">
		<?php endforeach; ?>
	<?php endif; ?>

	<?php if (isset($css_cdn)): ?>
		<!-- CSS_CDN -->
		<?php foreach ($css_cdn as $key => $value): ?>
			<?php echo "<!-- ".$key." -->\n"; ?>
			<link rel="stylesheet" href="<?php echo $value; ?>">
		<?php endforeach; ?>
	<?php endif; ?>

	<?php if (isset($css_custom)): ?>
		<!-- CSS_Custom -->
		<?php foreach ($css_custom as $key => $value): ?>
			<?php echo "<!-- ".$key." -->\n"; ?>
			<link rel="stylesheet" href="<?php echo '/assets/admin/css/'.$value; ?>">
		<?php endforeach; ?>
	<?php endif; ?>
</head>
<body class="hold-transition sidebar-mini <?php echo json_decode($this->session->user->setting_site, true)['sidebar']; ?>">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="/admin/profile" class="nav-link">Главная</a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="/admin/contact" class="nav-link">Связаться с нами</a>
				</li>
			</ul>

			<!-- SEARCH FORM -->
			<form class="form-inline ml-3 d-none d-sm-inline-block">
				<div class="input-group input-group-sm">
					<input class="form-control form-control-navbar" type="search" placeholder="Поиск..." aria-label="Search">
					<div class="input-group-append">
						<button class="btn btn-navbar" type="submit">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			</form>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Messages Dropdown Menu -->
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-comments"></i>
						<span class="badge badge-danger navbar-badge">3</span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<a href="#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
								<div class="media-body">
									<h3 class="dropdown-item-title">
										Brad Diesel
										<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
									</h3>
									<p class="text-sm">Call me whenever you can...</p>
									<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
								<div class="media-body">
									<h3 class="dropdown-item-title">
										John Pierce
										<span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
									</h3>
									<p class="text-sm">I got your message bro</p>
									<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
								<div class="media-body">
									<h3 class="dropdown-item-title">
										Nora Silvester
										<span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
									</h3>
									<p class="text-sm">The subject goes here</p>
									<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
					</div>
				</li>
				<!-- Notifications Dropdown Menu -->
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-bell"></i>
						<span class="badge badge-warning navbar-badge">15</span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<span class="dropdown-item dropdown-header">15 Notifications</span>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-envelope mr-2"></i> 4 new messages
							<span class="float-right text-muted text-sm">3 mins</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-users mr-2"></i> 8 friend requests
							<span class="float-right text-muted text-sm">12 hours</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-file mr-2"></i> 3 new reports
							<span class="float-right text-muted text-sm">2 days</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
					</div>
				</li>
				<!-- User Dropdown Menu -->
				<li class="nav-item dropdown user-menu">
					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo (isset($this->session->user->image) AND $this->session->user->image !== '') ? '/assets/admin/uploads/users/'.$this->session->user->image : '/assets/admin/themes/'.$this->config->item('theme_admin').'/dist/img/user2-160x160.jpg' ?>" class="user-image img-circle elevation-2" alt="User Image">
						<span class="d-none d-md-inline"><?php echo ( isset($this->session->user->name) || isset($this->session->user->surname) ) ? $this->session->user->name. ' ' .$this->session->user->surname : 'Name Surname'; ?></span>
					</a>
					<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<!-- User image -->
						<li class="user-header bg-primary">
							<img src="<?php echo (isset($this->session->user->image) AND $this->session->user->image !== '') ? '/assets/admin/uploads/users/'.$this->session->user->image : '/assets/admin/themes/'.$this->config->item('theme_admin').'/dist/img/user2-160x160.jpg' ?>" class="img-circle elevation-2" alt="User Image">

							<p>
								<?php echo ( isset($this->session->user->name) || isset($this->session->user->surname) ) ? $this->session->user->name. ' ' .$this->session->user->surname : 'Name Surname'; ?> - <?php echo isset($this->session->user->profession) ? $this->session->user->profession : 'Профессия'; ?>
								<small>С нами с <?php echo date_format(date_create($this->session->user->created_at), 'd-M-Y'); ?></small>
							</p>
						</li>
						<!-- Menu Body -->
						<li class="user-body">
							<div class="row">
								<div class="col-4 text-center">
									<a href="#">Подписчики</a>
								</div>
								<div class="col-4 text-center">
									<a href="#">Продажи</a>
								</div>
								<div class="col-4 text-center">
									<a href="#">Друзья</a>
								</div>
							</div>
							<!-- /.row -->
						</li>
						<!-- Menu Footer-->
						<li class="user-footer">
							<a href="/admin/profile" class="btn btn-default btn-flat">Профиль</a>
							<a href="/admin/authorization/signout" class="btn btn-default btn-flat float-right">Выйти</a>
						</li>
					</ul>
				</li>
				<!-- Language Dropdown Menu -->
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="flag-icon flag-icon-us"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right p-0">
						<a href="#" class="dropdown-item active">
							<i class="flag-icon flag-icon-us mr-2"></i> English
						</a>
						<a href="#" class="dropdown-item">
							<i class="flag-icon flag-icon-de mr-2"></i> German
						</a>
						<a href="#" class="dropdown-item">
							<i class="flag-icon flag-icon-fr mr-2"></i> French
						</a>
						<a href="#" class="dropdown-item">
							<i class="flag-icon flag-icon-es mr-2"></i> Spanish
						</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
						<i class="fas fa-th-large"></i>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="/admin/profile" class="brand-link">
				<img src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>dist/img/AdminLTELogo.png"
				alt="AdminLTE Logo"
				class="brand-image img-circle elevation-3"
				style="opacity: .8">
				<span class="brand-text font-weight-light">SP<strong>Repair</strong></span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?php echo (isset($this->session->user->image) AND $this->session->user->image !== '') ? '/assets/admin/uploads/users/'.$this->session->user->image : '/assets/admin/themes/'.$this->config->item('theme_admin').'/dist/img/user2-160x160.jpg' ?>" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="/admin/profile" class="d-block"><?php echo (isset($this->session->user->name) || isset($this->session->user->surname) ) ? $this->session->user->name. ' ' .$this->session->user->surname : 'Имя Фамилия'; ?></a>
					</div>
				</div>

				<!-- SidebarSearch Form -->
				<form class="form-inline ml-3 d-sm-none d-sm-inline-bloc">
					<div class="form-inline">
						<div class="input-group" data-widget="sidebar-search">
							<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
							<div class="input-group-append">
								<button class="btn btn-sidebar">
									<i class="fas fa-search fa-fw"></i>
								</button>
							</div>
						</div>
					</div>
				</form>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<?php echo view_menu($menu); ?>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1><?php echo isset($title_page) ? $title_page : "Title Page"; ?></h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="">Home</a></li>
								<li class="breadcrumb-item active"><?php echo isset($title_page) ? $title_page : "Title Page"; ?></li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>

			<!-- Main content -->
			<section class="content">
				<noscript>
					<div class="alert alert-warning alert-dismissible">
						<h5><i class="icon fas fa-ban"></i> Alert!</h5>
						You need to enable JavaScript to run this app.
					</div>
				</noscript>
				<?php if (isset($content)): ?>
					<?php $this->load->view('admin/'.$this->config->item('theme_admin').'/'.$content); ?>
				<?php else: ?>
					<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h5><i class="icon fas fa-ban"></i> Alert!</h5>
						<strong>Need a view!</strong> Create a variable <strong>$data['content'] = '<?php echo $page_name.'/index'; ?>'</strong> in the controller!
					</div>
				<?php endif; ?>

			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				<b>Version</b> v3.1.0-rc
			</div>
			<strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
			reserved.
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
	<script src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>plugins/fastclick/fastclick.js"></script>
	<!-- Toastr -->
	<script src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>plugins/toastr/toastr.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>dist/js/demo.js"></script>

	<?php if ($datatables): ?>
	<!-- Datatables -->
	<script src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<script src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
	<script src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>plugins/jszip/jszip.min.js"></script>
	<script src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>plugins/pdfmake/pdfmake.min.js"></script>
	<script src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>plugins/pdfmake/vfs_fonts.js"></script>
	<script src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>plugins/datatables-buttons/js/buttons.flash.min.js"></script>
	<script src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
	<script src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
	<script src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'; ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
	<?php endif; ?>

	<!-- Custom custom.js -->
	<script src="/assets/admin/js/custom.js?<?php echo time(); ?>"></script>
	
	<?php if (isset($js)): ?>
		<!-- JS -->
		<?php foreach ($js as $key => $value): ?>
			<?php echo "<!-- ".$key." -->\n"; ?>
			<script src="<?php echo '/assets/admin/themes/'.$this->config->item('theme_admin').'/'.$value; ?>"></script>
		<?php endforeach; ?>
	<?php endif; ?>

	<?php if (isset($js_cdn)): ?>
		<!-- JS_CDN -->
		<?php foreach ($js_cdn as $key => $value): ?>
			<?php echo "<!-- ".$key." -->\n"; ?>
			<script src="<?php echo $value; ?>"></script>
		<?php endforeach; ?>
	<?php endif; ?>

	<?php if (isset($js_custom)): ?>
		<!-- Custom JS -->
		<?php foreach ($js_custom as $key => $value): ?>
			<?php echo "<!-- ".$key." -->\n"; ?>
			<script src="<?php echo '/assets/admin/js/'.$value.'?'.time(); ?>" charset="utf-8"></script>
		<?php endforeach; ?>
	<?php endif; ?>
	
	<?php if ($datatables): ?>
	<script src="<?php echo '/assets/admin/js/datatable_custom.js?'.time(); ?>" charset="utf-8"></script>
	<?php endif; ?>
</body>
</html>

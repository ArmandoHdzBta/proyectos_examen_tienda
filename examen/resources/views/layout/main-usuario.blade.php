<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @yield('titulo')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  @yield('css')
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
	<img class="animation__wobble" src="/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
	  <li class="nav-item">
		<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
	  </li>
	  <li class="nav-item d-none d-sm-inline-block">
		<a href="{{ route('usuario.home') }}" class="nav-link">Home</a>
	  </li>
	</ul>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
	  <!-- Messages Dropdown Menu -->
	  <li class="nav-item dropdown">
		<a class="nav-link" data-toggle="dropdown" href="#">
		  <i class="fas fa-sign-out-alt"></i>
		</a>
		<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
		  <a href="{{ route('usuario.cerrarSesion') }}" class="dropdown-item">
			<!-- Message Start -->
			<div class="media">
			  <div class="media-body">
				<h3 class="dropdown-item-title">
				  Salir
				</h3>
			  </div>
			</div>
			<!-- Message End -->
		  </a>
		</div>
	  </li>
	</ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="{{ route('usuario.home') }}" class="brand-link">
	  <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
	  <span class="brand-text font-weight-light">Usuario</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">

	  <!-- Sidebar Menu -->
	  <nav class="mt-2">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		  <!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->
		  <li class="nav-item menu-open">
			<a href="#" class="nav-link">
			  <i class="nav-icon fas fa-tachometer-alt"></i>
			  <p>
				Examen
				<i class="right fas fa-angle-left"></i>
			  </p>
			</a>
			<ul class="nav nav-treeview">
			  <li class="nav-item">
				<a href="{{ route('usuario.viewExamenAll') }}" class="nav-link">
				  <i class="far fa-circle nav-icon"></i>
				  <p>Ver examenes</p>
				</a>
			  </li>
			</ul>
		  </li>
		  <li class="nav-item">
			<a href="#" class="nav-link">
			  <i class="nav-icon fas fa-chart-pie"></i>
			  <p>
				Estadisticas
				<i class="right fas fa-angle-left"></i>
			  </p>
			</a>
			<ul class="nav nav-treeview">
			  <li class="nav-item">
				<a href="{{ route('usuario.misExamenes') }}" class="nav-link">
				  <i class="far fa-circle nav-icon"></i>
				  <p>Mis Examenes</p>
				</a>
			  </li>
			</ul>
		  </li>
		</ul>
	  </nav>
	  <!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<!-- Main content -->
	<section class="content">
	  <div class="container-fluid">
	  	@yield('contenido')
	  </div><!--/. container-fluid -->
	</section>
	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
	<strong>Copyright &copy; 2021 <b>Armando Hernández.</b></strong>
	All rights reserved.
	<div class="float-right d-none d-sm-inline-block">
	  <b>Version</b> 1.1.0
	</div>
  </footer>
</div>
<!-- ./wrapper -->



<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
@yield('script')
</body>
</html>


<!DOCTYPE html>
<html lang="id" class="dark-theme">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>@yield('title', 'Admin Dashboard')</title>
	<!--favicon-->
	<link rel="icon" href="{{asset('backend/assets/images/favicon-32x32.png')}}" type="image/png" />
	<!-- Vector CSS -->
	<link href="{{asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
	<!--plugins-->
	<link href="{{asset('backend/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('backend/assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('backend/assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap.min.css')}}" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="{{asset('backend/assets/css/icons.css')}}" />
	<!-- App CSS -->
	<link rel="stylesheet" href="{{asset('backend/assets/css/app.css')}}" />
	<link rel="stylesheet" href="{{asset('backend/assets/css/dark-sidebar.css')}}" />
	<link rel="stylesheet" href="{{asset('backend/assets/css/dark-theme.css')}}" />

	@yield('style')
	@livewireStyles
</head>

<body>
	<!-- wrapper -->
	<div class="wrapper">
		<!--sidebar-wrapper-->
		@include('layout.admin.sidebar')
		<!--end sidebar-wrapper-->
		<!--header-->
		<header class="top-header">
			@include('layout.admin.navbar')
		</header>
		<!--end header-->
		<!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
			<div class="page-content-wrapper">
				@include('layout.admin.error')
				@yield('content')
				{{$slot ?? ''}}
			</div>
			<!--end page-content-wrapper-->
		</div>
		<!--end page-wrapper-->
		<!--start overlay-->
		<div class="overlay toggle-btn-mobile"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<!--footer -->
		<div class="footer">
			@include('layout.admin.footer')
		</div>
		<!-- end footer -->
	</div>
	<!--start switcher-->
	{{-- <div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="custom-control custom-radio">
					<input type="radio" id="darkmode" name="customRadio" checked class="custom-control-input">
					<label class="custom-control-label" for="darkmode">Dark Mode</label>
				</div>
				<div class="custom-control custom-radio">
					<input type="radio" id="lightmode" name="customRadio" class="custom-control-input">
					<label class="custom-control-label" for="lightmode">Light Mode</label>
				</div>
			</div>
			<hr/>
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" id="DarkSidebar">
				<label class="custom-control-label" for="DarkSidebar">Dark Sidebar</label>
			</div>
			<hr/>
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" id="ColorLessIcons">
				<label class="custom-control-label" for="ColorLessIcons">Color Less Icons</label>
			</div>
		</div>
	</div> --}}
	<!--end switcher-->
	<!-- JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('backend/assets/js/popper.min.js')}}"></script>
	<script src="{{asset('backend/assets/js/bootstrap.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('backend/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<!-- Vector map JavaScript -->
	<script src="{{asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/vectormap/jquery-jvectormap-in-mill.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/vectormap/jquery-jvectormap-uk-mill-en.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/vectormap/jquery-jvectormap-au-mill.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
	<script src="{{asset('backend/assets/js/index2.js')}}"></script>
	<!--notification js -->
	<script src="{{asset('backend/assets/plugins/notifications/js/lobibox.min.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/notifications/js/notifications.min.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/notifications/js/notification-custom-script.js')}}"></script>
	<!-- App JS -->
	<script src="{{asset('backend/assets/js/app.js')}}"></script>

	@yield('scripts')
	@livewireScripts
</body>

</html>
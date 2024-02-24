<!DOCTYPE html>
<html lang="en">

<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<title>Admin | LMS</title>


		<script src="{{ asset('jquery/jquery.js') }}" crossorigin="anonymous"></script>

		{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> --}}
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
				integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		{{-- summernote --}}
		<link href="{{ asset('summernote/summernote-lite.css') }}" rel="stylesheet">
		<script src="{{ asset('summernote/summernote-lite.js') }}"></script>


		<!-- plugins:css -->
		<link rel="stylesheet" href="{{ asset('vendors') }}/feather/feather.css" />
		<link rel="stylesheet" href="{{ asset('vendors') }}/ti-icons/css/themify-icons.css" />
		<link rel="stylesheet" href="{{ asset('vendors') }}/css/vendor.bundle.base.css" />
		<!-- endinject -->
		<!-- Plugin css for this page -->
		<link rel="stylesheet" href="{{ asset('vendors') }}/datatables.net-bs4/dataTables.bootstrap4.css" />
		<link rel="stylesheet" href="{{ asset('vendors') }}/ti-icons/css/themify-icons.css" />
		{{-- <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css" /> --}}
		<!-- End plugin css for this page -->
		<!-- inject:css -->
		<link rel="stylesheet" href="{{ asset('css') }}/vertical-layout-light/style.css" />
		<!-- endinject -->
		<link rel="shortcut icon" href="{{ asset('images') }}/favicon.png" />
</head>

<body>
		{{-- sweet alert --}}
		@include('sweetalert::alert')

		<div class="container-scroller">
				<!-- partial:partials/_navbar.html -->
				@include('admin.layouts.partials.topbar')
				<!-- partial -->
				<div class="container-fluid page-body-wrapper">
						<!-- partial:partials/_settings-panel.html -->
						<div class="theme-setting-wrapper">
								<div id="settings-trigger"><i class="ti-settings"></i></div>
								<div id="theme-settings" class="settings-panel">
										<i class="settings-close ti-close"></i>
										<p class="settings-heading">CUSTOM SIDEBAR</p>
										<div class="sidebar-bg-options selected" id="sidebar-light-theme">
												<div class="img-ss rounded-circle bg-light mr-3 border"></div>
												Light
										</div>
										<div class="sidebar-bg-options" id="sidebar-dark-theme">
												<div class="img-ss rounded-circle bg-dark mr-3 border"></div>
												Dark
										</div>
										<p class="settings-heading mt-2">CUSTOM TOPBAR</p>
										<div class="color-tiles mx-0 px-4">
												<div class="tiles success"></div>
												<div class="tiles warning"></div>
												<div class="tiles danger"></div>
												<div class="tiles info"></div>
												<div class="tiles dark"></div>
												<div class="tiles default"></div>
										</div>
								</div>
						</div>
						<!-- partial -->
						<!-- partial:partials/_sidebar.html -->
						@include('admin.layouts.partials.sidebar')
						<!-- partial -->
						<div class="main-panel">
								<div class="content-wrapper">
										@yield('content')
								</div>
								<!-- content-wrapper ends -->
								<!-- partial:partials/_footer.html -->
								@include('admin.layouts.partials.footer')
								<!-- partial -->
						</div>
						<!-- main-panel ends -->
				</div>
				<!-- page-body-wrapper ends -->
		</div>
		<!-- container-scroller -->

		<!-- plugins:js -->
		<script src="{{ asset('vendors') }}/js/vendor.bundle.base.js"></script>
		<!-- endinject -->
		<!-- Plugin js for this page -->
		<script src="{{ asset('vendors') }}/chart.js/Chart.min.js"></script>
		<script src="{{ asset('vendors') }}/datatables.net/jquery.dataTables.js"></script>
		<script src="{{ asset('vendors') }}/datatables.net-bs4/dataTables.bootstrap4.js"></script>
		<script src="{{ asset('js') }}/dataTables.select.min.js"></script>

		<!-- End plugin js for this page -->
		<!-- inject:js -->
		<script src="{{ asset('js') }}/off-canvas.js"></script>
		<script src="{{ asset('js') }}/hoverable-collapse.js"></script>
		<script src="{{ asset('js') }}/template.js"></script>
		<script src="{{ asset('js') }}/settings.js"></script>
		<script src="{{ asset('js') }}/todolist.js"></script>
		<!-- endinject -->
		<!-- Custom js for this page-->
		<script src="{{ asset('js') }}/dashboard.js"></script>
		<script src="{{ asset('js') }}/Chart.roundedBarCharts.js"></script>


		<script>
				$(document).ready(function() {
						$('#kembali').click(function() {
								window.history.back();
						});
				});
		</script>

		<!-- End custom js for this page-->
		@stack('script')

		{{-- sweet alert  --}}
		@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
</body>

</html>

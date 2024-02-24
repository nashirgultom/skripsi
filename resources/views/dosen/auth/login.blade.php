<!DOCTYPE html>
<html lang="en">

<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Login | Dosen</title>
		<!-- plugins:css -->
		<link rel="stylesheet" href="{{ asset('vendors') }}/feather/feather.css">
		<link rel="stylesheet" href="{{ asset('vendors') }}/ti-icons/css/themify-icons.css">
		<link rel="stylesheet" href="{{ asset('vendors') }}/css/vendor.bundle.base.css">
		<!-- endinject -->
		<!-- Plugin css for this page -->
		<!-- End plugin css for this page -->
		<!-- inject:css -->
		<link rel="stylesheet" href="{{ asset('css') }}/vertical-layout-light/style.css">
		<!-- endinject -->
		<link rel="shortcut icon" href="{{ asset('images') }}/favicon.png" />
</head>

<body>
		<div class="container-scroller">
				<div class="container-fluid page-body-wrapper full-page-wrapper">
						<div class="content-wrapper d-flex align-items-center auth px-0">
								<div class="row w-100 mx-0">
										<div class="col-lg-4 mx-auto">
												<div class="auth-form-light px-sm-5 px-4 py-5 text-left">
														<div class="brand-logo text-center">
																<img src="{{ asset('images') }}/lms/logo/logo.png" alt="logo">
														</div>
														<h4>Hello! lecturer</h4>
														<h6 class="font-weight-light">Login untuk melanjutkan</h6>


														@if ($errors->any())
																<div class="aler alert-danger">
																		<ul>
																				@foreach ($errors->all() as $item)
																						<li>{{ $item }}</li>
																				@endforeach
																		</ul>
																</div>
														@endif

														<form class="pt-3" action="{{ route('dosen.authenticate') }}" method="POST">
																@csrf
																<div class="form-group">
																		<input type="text" class="form-control form-control-lg" value="{{ old('username') }}"
																				id="username" name="username" placeholder="Username">
																</div>
																<div class="form-group">
																		<input type="password" class="form-control form-control-lg" id="password"
																				value="{{ old('password') }}" name="password" placeholder="Password">
																</div>
																<div class="mt-3">
																		<button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
																				type="submit">LOGIN</button>
																</div>
																{{-- <div class="d-flex justify-content-between align-items-center my-2">
																		<div class="form-check">
																				<label class="form-check-label text-muted">
																						<input type="checkbox" class="form-check-input">
																						Keep me signed in
																				</label>
																		</div>
																		<a href="#" class="auth-link text-black">Forgot password?</a>
																</div> --}}
																<div class="font-weight-light mt-4 text-center">
																		Belum punya akun ? <a href="register.html" class="text-primary">Register</a>
																</div>
														</form>
												</div>
										</div>
								</div>
						</div>
						<!-- content-wrapper ends -->
				</div>
				<!-- page-body-wrapper ends -->
		</div>
		<!-- container-scroller -->
		<!-- plugins:js -->
		<script src="{{ asset('vendors') }}/js/vendor.bundle.base.js"></script>
		<!-- endinject -->
		<!-- Plugin js for this page -->
		<!-- End plugin js for this page -->
		<!-- inject:js -->
		<script src="../../js/off-canvas.js"></script>
		<script src="../../js/hoverable-collapse.js"></script>
		<script src="../../js/template.js"></script>
		<script src="../../js/settings.js"></script>
		<script src="../../js/todolist.js"></script>
		<!-- endinject -->
</body>

</html>

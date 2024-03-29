<!DOCTYPE html>
<html lang="en">

<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Login</title>
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
														<div class="brand-logo">
																<img class="d-block mx-auto" src="{{ asset('images') }}/lms/logo/logo.png" alt="logo">
														</div>
														<h4>Hallo, Selamat datang di sistem e-modul IBI Darmajaya</h4>
														<h6 class="font-weight-light">Silahkan login.</h6>
														<form method="POST" class="pt-3" action="{{ route('login') }}">
																@csrf
																<div class="form-group">
																		<x-text-input id="email" type="email" name="email" :value="old('email')" required
																				autocomplete="username" placeholder="masukan email" />
																		<x-input-error :messages="$errors->get('email')" class="mt-2" />
																</div>
																<div class="form-group">
																		<x-text-input id="password" type="password" name="password" :value="old('password')" required
																				autocomplete="password" placeholder="masukan password" required autocomplete="current-password" />
																		<x-input-error :messages="$errors->get('password')" class="mt-2" />


																		{{-- terakhir di sini . seimbangkan dengan login bawaan breeze --}}


																</div>
																<div class="mt-3">
																		<x-primary-button class="ms-3">
																				MASUK
																		</x-primary-button>
																</div>
																{{-- <div class="d-flex justify-content-between align-items-center my-2">
																		<div class="form-check">
																				<label class="form-check-label text-muted">
																						<input type="checkbox" class="form-check-input">
																						Keep me signed in
																				</label>
																		</div>
																		<a href="{{ route('password.request') }}" class="auth-link text-black">Lupa password ?</a>
																</div> --}}

																<div class="font-weight-light mt-4 text-center">
																		Belum punya akun? <a href="{{ route('register') }}" class="text-primary">Buat akun</a>
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

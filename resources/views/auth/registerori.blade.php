<!DOCTYPE html>
<html lang="en">

<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Skydash Admin</title>
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
																<img src="{{ asset('images') }}/lms/logo/logo.png" alt="logo darmajaya" srcset="">
														</div>
														<h4>Belum Punya akun ?</h4>
														<h6 class="font-weight-light mb-4">Daftar sebagai mahasiswa IBI Darmajaya</h6>
														<form method="POST" action="{{ route('register') }}">
																@csrf

																<div class="row">
																		<div class="col-6">
																				<div class="form-group">
																						<input type="text" class="form-control form-control-lg" id="first" name="first"
																								value="{{ old('first') }}" placeholder="Nama depan" required>
																						<x-input-error :messages="$errors->get('first')" class="mt-2" />
																				</div>
																		</div>
																		<div class="col-6">
																				<div class="form-group">
																						<input type="text" class="form-control form-control-lg" id="last" name="last"
																								value="{{ old('last') }}" placeholder="Nama belakang" required>
																						<x-input-error :messages="$errors->get('last')" class="mt-2" />
																				</div>
																		</div>
																</div>
																<div class="form-group">
																		<input type="username" class="form-control form-control-lg" id="username" name="username"
																				placeholder="masukan username" value="{{ old('username') }}">
																		<x-input-error :messages="$errors->get('username')" class="mt-2" />
																</div>
																<div class="form-group">
																		<input type="email" class="form-control form-control-lg" id="email" name="email"
																				placeholder="Masukan email" value="{{ old('email') }}">
																</div>
																{{-- password pertama --}}
																<div class="form-group">
																		<input type="password" class="form-control form-control-lg" name="password" id="password"
																				placeholder="Buat assword">
																		<x-input-error :messages="$errors->get('password')" class="mt-2" />
																</div>
																{{-- password kedua --}}
																<div class="form-group">
																		<input type="password" class="form-control form-control-lg" name="password_confirmation"
																				id="password_confirmation" placeholder="Ulangi password">
																		<x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
																</div>

																{{-- terakhir sampe ini belum optimal --}}
																{{-- kemmbalian oldnya belum di terima dengan benar oleh value old . sepertinya harus menggunakan 
																		blade template juga  --}}

																{{-- <div class="mb-4">
																		<div class="form-check">
																				<label class="form-check-label text-muted">
																						<input type="checkbox" class="form-check-input">
																						Setuju dengan syarat & ketentuan
																				</label>
																		</div>
																</div> --}}
																<div class="mt-3">
																		<button type="submit"
																				class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">DAFTAR</button>

																</div>
																<div class="font-weight-light mt-4 text-center">
																		Sudah punya akun? <a href="{{ route('login') }}" class="text-primary">Login</a>
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

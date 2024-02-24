@extends('dosen.layouts.main')
@section('content')
		<div class="row">
				<div class="col-md-12 grid-margin">
						<div class="row">
								<div class="col-12 col-xl-8 mb-xl-0 mb-4">
										<h3 class="font-weight-bold">Selamat datang {{ Auth::user()->first_name }} !</h3>
										{{-- <form action="{{ route('dosen.logout') }}" method="POST">
												@csrf
												<button type="submit" class="btn btn-danger">Logout</button>
										</form> --}}
										<h6 class="font-weight-normal mb-0">
												Semoga harimu indah.
										</h6>
								</div>
						</div>
				</div>
		</div>

		<div class="row">
				<div class="col-md-6 grid-margin stretch-card">
						<div class="card tale-bg">
								<div class="card-people mt-auto">
										<img src="{{ asset('images') }}/dashboard/people.svg" alt="people">
										<div class="weather-info">
												<div class="d-flex">
														<div>
																<h2 class="font-weight-normal mb-0">
																		<i class="icon-sun mr-2"></i>31<sup>C</sup>
																</h2>
														</div>
														<div class="ml-2">
																<h4 class="location font-weight-normal">Darmajaya</h4>
																<h6 class="font-weight-normal">Bandar Lampung</h6>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>

				{{-- section info --}}
				<div class="col-md-6 grid-margin transparent">
						<div class="row mb-3 px-3">
								<div class="card w-100">
										<div class="card-header bg-primary text-white">
												Info Login
										</div>
										<div class="card-body">
												<h5 class="card-title">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</h5>
												<p class="card-text">{{ Auth::user()->email }}</p>

												<form method="POST" action="{{ route('logout') }}">
														@csrf
														<a class="btn btn-primary" href="{{ route('logout') }}"
																onclick="event.preventDefault();
                                        this.closest('form').submit();">
																<i class="mdi mdi-exit-to-app"></i>
																<span>Logout</span>
														</a>
												</form>
										</div>
								</div>
						</div>
						<div class="row">
								<div class="col-md-6 stretch-card transparent mb-4">
										<div class="card card-tale">
												<div class="card-body">
														<p class="mb-4">Jumlah kelas anda.</p>
														<p class="fs-30 mb-2">2</p>
												</div>
										</div>
								</div>
								<div class="col-md-6 stretch-card transparent mb-4">
										<div class="card card-dark-blue">
												<div class="card-body">
														<p class="mb-4">Jumlah Dosen.</p>
														<p class="fs-30 mb-2">6</p>
												</div>
										</div>
								</div>
						</div>
						<div class="row">
								<div class="col-md-6 mb-lg-0 stretch-card transparent mb-4">
										<div class="card card-light-blue">
												<div class="card-body">
														<p class="mb-4">Jumlah Mata Kuliah.</p>
														<p class="fs-30 mb-2">3</p>
												</div>
										</div>
								</div>
								<div class="col-md-6 stretch-card transparent">
										<div class="card card-light-danger">
												<div class="card-body">
														<p class="mb-4">Jumlah Mahasiswa.</p>
														<p class="fs-30 mb-2">3</p>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
@endsection

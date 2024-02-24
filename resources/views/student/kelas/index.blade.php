@extends('student.layouts.main')

@section('content')
		<div class="row">
				<div class="col-md-12 grid-margin">
						<div class="row">
								<div class="col-12 col-xl-8 mb-xl-0 mb-4">
										<h3 class="font-weight-bold">Daftar modul favorit anda !</h3>
										<h6 class="font-weight-normal mb-0">
												Mulai belajar ...
										</h6>
								</div>
						</div>
				</div>
		</div>
		<hr>
		<div class="row">
				{{-- <div class="col-3">
								<div class="card" style="width: 100%;">
										<img class="card-img-top" src="{{ asset('images') }}/lms/kelas/kelas.jpg" alt="Card image cap">
										<div class="card-body">
												<h5 class="card-title">Mobile Technology | 4TI-P1</h5>
												<p class="card-text">Sulyono, S.kom, M.T.I</p>
												<a href="#" class="btn btn-primary btn-block mt-3">Masuk</a>
										</div>
								</div>
						</div> --}}


				{{-- looping area start --}}
				@foreach ($mks as $mk)
						<div class="col-6 col-lg-3">
								<div class="card mt-3 shadow">
										<img src="{{ asset('images') }}/lms/kelas/kelas.jpg" class="rounded" alt="" srcset="">
										{{-- <img src="https://source.unsplash.com/1000x600?{{ $cat[$loop->iteration - 1] }}" class="rounded"
														alt="" srcset=""> --}}
										<div class="d-flex flex-column justify-content-between mt-3 p-2" style="min-height: 130px;">
												<div>
														<div class="d-flex justify-content-between">
																<h6 class="">{{ $mk->matakuliah->name }}</h6>

														</div>
														<p class="m-0">Dosen :</p>
														<p class="m-0">{{ $mk->matakuliah->dosen->first_name . ' ' . $mk->matakuliah->dosen->last_name }}</p>
												</div>
												<a href="{{ route('student.kelas.show', $mk->kode_mk) }}" class="btn btn-sm btn-block btn-primary">Buka
														modul</a>
										</div>
								</div>
						</div>
				@endforeach

				{{--  looping area end --}}
		</div>
@endsection

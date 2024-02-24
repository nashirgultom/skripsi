@extends('student.layouts.main')
@section('content')
		<div class="container">
				<div class="row">
						<div class="col-12">
								<img src="{{ asset('images') }}/lms/kelas/kelas.jpg" class="img-fluid w-100 rounded-lg" alt=""
										style="max-height: 200px; object-fit: cover; object-position: center;" srcset="">
								{{-- <img src="https://source.unsplash.com/1000x600?computer" class="img-fluid w-100 rounded-lg" alt=""
										srcset=""> --}}
						</div>
						<div class="col-12">
								<div class="card mt-5 border-2 p-4">
										<div class="d-flex justify-content-between">
												<h4>{{ $mk->name }}</h4>
												<i class="far fa-bookmark text-primary"></i>
												{{-- <i class="fa-solid fa-bookmark text-primary"></i> --}}
										</div>
										<p>Dosen Pengampu : {{ $mk->dosen->first_name . ' ' . $mk->dosen->last_name }}</p>


								</div>
						</div>
				</div>

				{{-- accordionya belum selesai --}}


				{{-- section modul --}}
				<div class="row mt-5">
						<div class="col-12">

								@if ($mk->modul->count() > 0)
										{{-- jika modul ada --}}
										<div class="accordion" id="submodul">
												{{-- for loop materi --}}
												@foreach ($mk->modul as $m)
														<div class="card">
																<div class="card-header" id="heading{{ $m->id }}">
																		<h2 class="mb-0">
																				<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
																						data-target="#collapse{{ $m->id }}" aria-expanded="true"
																						aria-controls="collapse{{ $m->id }}">
																						{{ $m->judul }}
																				</button>
																		</h2>
																</div>

																<div id="collapse{{ $m->id }}" class="collapse" aria-labelledby="heading{{ $m->id }}"
																		data-parent="#submodul">
																		<div class="card-body">
																				<div>
																						{!! $m->materi !!}
																				</div>
																		</div>
																</div>
														</div>
												@endforeach

												{{-- end loop materi --}}

												@if ($mk->evaluasi->count() > 0)
														{{-- loop for evaluasi --}}
														@foreach ($mk->evaluasi->where('status', 1) as $e)
																<div class="card">
																		<div class="card-header" id="heading{{ $e->id }}">
																				<h2 class="mb-0">
																						<button class="btn btn-link btn-block collapsed text-left" type="button" data-toggle="collapse"
																								data-target="#collapse{{ $e->id }}" aria-expanded="false"
																								aria-controls="collapse{{ $e->id }}">
																								{{ $e->name }}
																						</button>
																				</h2>
																		</div>
																		<div id="collapse{{ $e->id }}" class="collapse" aria-labelledby="heading{{ $e->id }}"
																				data-parent="#submodul">
																				<div class="card-body px-5">
																						<div>
																								{!! $e->deskripsi !!}
																						</div>
																						<div class="mt-3">
																								<p>Durasi : {{ $e->durasi }}Menit</p>
																								<div class="d-flex justify-content-between align-items-baseline mt-4">
																										<a href="{{ route('student.evaluasi.index.get', $e->id) }}" class="btn btn-primary">Lihat
																												Evaluasi</a>

																										@if ($e->evaluasistudent->where('id_user', Auth::id())->count() != 0)
																												<h6 class="text-success d-inline fw-bold"><i class="ti-check-box"></i><span
																																class="ml-2">Sudah
																																dikerjakan</span></h6>
																												{{-- <button class="btn-success btn">Sudah dikerjakan</button> --}}
																										@endif
																								</div>
																						</div>
																				</div>
																		</div>
																</div>
														@endforeach
														{{-- loop for evaluasi end --}}
												@endif
										</div>
								@else
										{{-- jika modul tidak ada --}}
										<div class="w-100 d-flex justify-content-center flex-column align-items-center mt-5">
												<h4 class="text-center">Mohon maaf kelas ini belum memiliki modul.</h4>
												<img src="{{ asset('images/vector/sorry.svg') }}" class="w-50" alt="sorry" srcset="">
										</div>
								@endif
						</div>
				</div>
		</div>
@endsection

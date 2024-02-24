@extends('dosen.layouts.main')
@section('content')
		<div class="row">
				<div class="col-md-12 grid-margin">
						<div class="row">
								<div class="col-12 col-xl-8 mb-xl-0 mb-4">
										<h3 class="font-weight-bold">Data Kelas</h3>
										<h6 class="font-weight-normal mb-0">
												daftar data seluruh modul yang anda miliki.
										</h6>
								</div>
						</div>
				</div>
		</div>
		{{-- info section --}}
		<div class="row mb-3">
				<div class="col-12">
						<div class="card shadow-lg">
								<div class="card-body">
										<div class="row">
												<div class="col-12 col-md-4">
														<img src="{{ asset('upload/kelas') . '/' . $mks->path_file }}" class="w-100 rounded" alt="thumbnail kelas"
																srcset="">
												</div>
												<div class="col-12 col-md-8 py-4">
														<div class="row mt-3">
																<h4 class="col-5 col-md-2">Nama kelas</h4>
																<h4 class="col-1 col-md-1">:</h4>
																<h4 class="col-6 col-md-9">{{ $mks->name }}</h4>
														</div>
														<div class="row mt-3">
																<h4 class="col-5 col-md-2">Kode kelas</h4>
																<h4 class="col-1 col-md-1">:</h4>
																<h4 class="col-6 col-md-9">{{ $mks->kode_mk }}</h4>
														</div>
														<div class="row mt-3">
																<h4 class="col-5 col-md-2">Dosen pengampu</h4>
																<h4 class="col-1 col-md-1">:</h4>
																<h4 class="col-6 col-md-9">
																		{{ ucwords(Auth::user()->first_name . ' ' . Auth::user()->last_name) }}</h4>
														</div>

												</div>
										</div>
								</div>
						</div>
				</div>
		</div>

		{{-- create section --}}
		<div class="row">
				<div class="col-12">
						<div class="card">
								<div class="card-body">
										<h3>Buat data modul baru</h3>
										<form action="{{ route('dosen.modul.store') }}" method="POST" class="mt-3">
												@csrf

												{{-- hidden area start --}}
												<input type="hidden" name="kode_mk" value="{{ $mks->kode_mk }}">
												{{-- hidden area end --}}

												<div class="form-group">
														<label for="Judul">Judul</label>
														<input type="text" class="form-control" name="judul" id="Judul"
																placeholder="Masukan judul modul anda ...">
												</div>

												<div class="form-group">
														<label for="materi">Materi</label>
														<textarea class="form-control" name="materi" id="materi" rows="6"></textarea>
												</div>


												<button type="submit" class="btn btn-primary">Simpan</button>
										</form>
								</div>
						</div>
				</div>
		</div>

		{{-- read section --}}
		<div class="row mt-3">
				<div class="col-12">
						<div class="card">
								<div class="card-body">
										<div class="row">
												<div class="col-12 col-md-6">
														<p>Data modul <strong class="text-primary">{{ $mks->name }}</strong></p>
												</div>
												<div class="col-12 col-md-6 d-md-flex justify-content-md-end">
														<a href="{{ route('dosen.modul.preview', $mks->kode_mk) }}" class="btn btn-sm btn-primary">
																<i class="ti-eye"></i>
																<span class="ml-2">Lihat Preview</span>
														</a>
												</div>
										</div>
										<div class="table-responsive">
												<table class="mt-2 table">
														<thead>
																<tr>
																		<th scope="col">#</th>
																		<th scope="col">Judul</th>
																		<th scope="col">Dibuat</th>
																		<th scope="col">Diupdate</th>
																		<th scope="col">Aksi</th>
																</tr>
														</thead>
														<tbody>
																{{-- show table in here --}}
																@foreach ($moduls as $m)
																		<tr>
																				<th scope="row">{{ $loop->iteration }}</th>
																				<td>{{ $m->judul }}</td>
																				<td>{{ $m->created_at->diffForHumans() }}</td>
																				<td>{{ $m->updated_at->diffForHumans() }}</td>
																				<td>
																						<a href="{{ route('dosen.modul.edit', $m->id) }}" class="btn btn-warning align-baseline"><i
																										class="ti-pencil"></i><span class="ml-2">Edit</span></a>

																						<form action="{{ route('dosen.modul.destroy', $m->id) }}" method="post" class="d-inline">
																								@csrf
																								@method('DELETE')
																								<button type="submit" class="btn btn-danger"><i class="ti-trash"></i><span
																												class="ml-2">Delete</span></button>
																						</form>
																				</td>
																		</tr>
																@endforeach
														</tbody>
												</table>
										</div>

								</div>
						</div>
				</div>
		</div>
@endsection


@push('script')
		<script>
				$('#materi').summernote({
						placeholder: 'Masukan materi di sini ...',
						tabsize: 2,
						height: 100
				});
		</script>
@endpush

@extends('dosen.layouts.main')
@section('content')
		<div class="row">
				<div class="col-md-12 grid-margin">
						<div class="row">
								<div class="col-12 col-xl-8 mb-xl-0 mb-4">
										<h3 class="font-weight-bold">Data Kelas</h3>
										<h6 class="font-weight-normal mb-0">
												daftar data seluruh kelas yang anda miliki.
										</h6>
								</div>
						</div>
				</div>
		</div>
		{{-- <div class="row mb-3">
				<div class="card w-100">
						<div class="card-body p-4">
								<a href="#" class="btn btn-primary">Tambah Modul</a>
						</div>
				</div>
		</div> --}}

		<div class="row">
				<div class="card w-100">
						<div class="card-body table-responsive">
								<h3>Kelas yang anda miliki</h3>
								<table class="table-hover table">
										<thead>
												<tr>
														<th>No.</th>
														<th>Kode</th>
														<th>Nama</th>
														<th>Aksi</th>
												</tr>
										</thead>
										<tbody>
												@if (empty($mkl))
														<tr>
																<td colspan="4">-- Belum ada data ! --</td>
														</tr>
												@else
														@foreach ($mkl as $mk)
																<tr>
																		<td>{{ $loop->iteration }}</td>
																		<td>{{ $mk->kode_mk }}</td>
																		<td>{{ $mk->name }}</td>
																		<td>
																				<a href="{{ route('dosen.modul.show', $mk->kode_mk) }}" class="btn btn-success align-baseline"><i
																								class="ti-eye"></i><span class="ml-2">Lihat
																								detail</span></a>
																		</td>
																</tr>
														@endforeach
												@endif
										</tbody>
								</table>
						</div>
				</div>
		</div>
@endsection

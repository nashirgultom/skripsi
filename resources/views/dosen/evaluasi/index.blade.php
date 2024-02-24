@extends('dosen.layouts.main')
@section('content')
		<div class="row">
				<div class="col-md-12 grid-margin">
						<div class="row">
								<div class="col-12 col-xl-8 mb-xl-0 mb-4">
										<h3 class="font-weight-bold">Bank Soal</h3>
										<h6 class="font-weight-normal mb-0">
												daftar kelas yang anda miliki.
										</h6>
								</div>
						</div>
				</div>
		</div>


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
												@if (empty($mks))
														<tr>
																<td colspan="4">-- Belum ada data ! --</td>
														</tr>
												@else
														@foreach ($mks as $mk)
																<tr>
																		<td>{{ $loop->iteration }}</td>
																		<td>{{ $mk->kode_mk }}</td>
																		<td>{{ $mk->name }}</td>
																		<td>
																				<a href="{{ route('dosen.evaluasi.show', $mk->kode_mk) }}" class="btn btn-primary align-baseline"><i
																								class="ti-eye"></i><span class="ml-2">Tambahkan Evaluasi
																						</span></a>
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

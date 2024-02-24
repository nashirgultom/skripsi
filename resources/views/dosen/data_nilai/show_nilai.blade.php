@extends('dosen.layouts.main')
@section('content')
		<div class="row mb-3">
				<div class="col-12">
						<button id="kembali" class="btn btn-primary">Kembali</button>
				</div>
		</div>

		<div class="row">
				<div class="card w-100">
						<div class="card-body table-responsive">
								<div class="d-flex justify-content-between">
										<h3>Data nilai mahasiswa</h3>
										{{-- <button class="btn btn-primary"> <i class="ti-import"></i> <span class="ml-2">Export</span></button> --}}
								</div>
								<div class="table-responsive">
										<table class="table-hover table">
												<thead>
														<tr>
																<th>No.</th>
																<th>Nama Mahasiswa</th>
																<th>Nilai</th>
																<th>Jumlah Jawban Benar</th>
																<th>Waktu Pengerjaan</th>
														</tr>
												</thead>
												<tbody>
														@foreach ($nilais as $n)
																<tr>
																		<td>{{ $loop->iteration }}</td>
																		<td>{{ $n->mahasiswa->first_name . ' ' . $n->mahasiswa->last_name }}</td>
																		<td>{{ $n->nilai }}</td>
																		<td>{{ $n->jawaban_benar . '/' . $n->evaluasi->bankSoal->count() }}</td>
																		<td>{{ $n->created_at }}</td>
																</tr>
														@endforeach
												</tbody>
										</table>
								</div>
						</div>
				</div>
		</div>
@endsection

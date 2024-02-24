@extends('dosen.layouts.main')
@section('content')
		<div class="row">
				<div class="col-12">
						<div class="d-flex justify-content-between">
								<div>
										<button id="kembali" class="btn btn-primary">Kembali</button>
								</div>
								<div>
										<a href="{{ route('dosen.cetak', $mk->kode_mk) }}" target="_blank" class="btn btn-info"> <i class="ti-import"></i>
												<span class="ml-2">Export</span></a>
								</div>
						</div>
				</div>
		</div>

		<div class="row mt-3">
				<div class="card w-100">
						<div class="card-body table-responsive">
								<div class="d-flex justify-content-between flex-column flex-md-row">
										<h3>Data evaluasi dalam modul <strong>{{ $mk->name }}</strong></h3>
										{{-- <button class="btn btn-primary">Cetak</button> --}}
								</div>
								<div class="table-responsive">
										<table class="table-hover table">
												<thead>
														<tr>
																<th>No.</th>
																<th>Nama Evaluasi</th>
																<th>Jumlah Mahasiswa</th>
																<th>Rata2 Nilai</th>
																<th>Aksi</th>
														</tr>
												</thead>
												<tbody>
														@foreach ($evals as $e)
																<tr>
																		<td>{{ $loop->iteration }}</td>
																		<td>{{ $e->name }}</td>
																		<td>{{ $e->evaluasistudent->count() }}</td>
																		<td>
																				@php
																						$totalNilai = 0;
																						$jumlahNilai = 0;
																						foreach ($e->evaluasistudent as $n) {
																						    if ($n->nilai !== null) {
																						        // Cek jika nilai tidak null
																						        $totalNilai += $n->nilai;
																						        $jumlahNilai++;
																						    }
																						}
																						$rataRataNilai = $jumlahNilai > 0 ? $totalNilai / $jumlahNilai : 'Tidak ada data';
																				@endphp
																				{{ $rataRataNilai }}
																		</td>
																		<td>
																				@if ($e->evaluasistudent->count() > 0)
																						<a href="{{ route('dosen.nilai.show.nilai', $e->id) }}" class="btn btn-success">lihat data nilai</a>
																				@else
																						<button class="btn btn-danger" disabled>tidak ada data</button>
																				@endif
																		</td>
																</tr>
														@endforeach
												</tbody>
										</table>
								</div>
						</div>
				</div>
		</div>
@endsection

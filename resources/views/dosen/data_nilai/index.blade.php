@extends('dosen.layouts.main')
@section('content')
		<div class="row">
				<div class="card w-100">
						<div class="card-body table-responsive">
								<h3>Data modul yang anda miliki</h3>
								<div class="table-responsive">
										<table class="table-hover table">
												<thead>
														<tr>
																<th>No.</th>
																<th>Mata Kuliah</th>
																<th>Kode MK</th>
																<th>Aksi</th>

														</tr>
												</thead>
												<tbody>
														@foreach ($mks as $m)
																<tr>
																		<td>{{ $loop->iteration }}</td>
																		<td>{{ $m->name }}</td>
																		<td>{{ $m->kode_mk }}</td>
																		<td>
																				@if ($m->evaluasi->count() > 0)
																						<a href="{{ route('dosen.nilai.show', $m->kode_mk) }}" class="btn btn-success">Lihat Daftar</a>
																				@else
																						<button class="btn btn-danger" disabled>tidak ada evaluasi</button>
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

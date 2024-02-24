@extends('student.layouts.main')
@section('content')
		<div class="row">
				<div class="card w-100">
						<div class="card-body table-responsive">
								<h3>Data nilai anda</h3>
								<div class="table-responsive">
										<table class="table-hover table">
												<thead>
														<tr>
																<th>No.</th>
																<th>Mata Kuliah</th>
																<th>Nama Evaluasi</th>
																<th>Nilai</th>
																<th>Jumlah Jawban Benar</th>
																<th>Waktu Pengerjaan</th>
														</tr>
												</thead>
												<tbody>
														@foreach ($nilais as $n)
																<tr>
																		<td>{{ $loop->iteration }}</td>
																		<td>{{ $n->evaluasi->matkul->name }}</td>
																		<td>{{ $n->evaluasi->name }}</td>
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

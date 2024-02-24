@extends('dosen.layouts.main')
@section('content')
		<div class="row">
				<div class="col-12">
						<div class="card">
								<div class="card-body">
										<p class="title-table">Tambahkan soal</p>
										<form action="{{ route('dosen.evaluasi.store-modul') }}" class="mt-5" method="POST" class="mt-3">
												@csrf

												{{-- hidden area start --}}
												<input type="hidden" name="id_evaluasi" value="{{ $id }}">
												{{-- hidden area end --}}

												<div class="form-group">
														<label for="soal">Soal</label>
														<textarea class="form-control" name="soal" id="soal" rows="3"></textarea>
												</div>
												<div class="form-group">
														<label for="opsi_a">Opsi a</label>
														<input type="text" class="form-control" name="opsi_a" id="opsi_a"
																placeholder="Masukan opsi jawaban a ...">
												</div>
												<div class="form-group">
														<label for="opsi_b">Opsi b</label>
														<input type="text" class="form-control" name="opsi_b" id="opsi_b"
																placeholder="Masukan opsi jawaban b ...">
												</div>
												<div class="form-group">
														<label for="opsi_c">Opsi c</label>
														<input type="text" class="form-control" name="opsi_c" id="opsi_c"
																placeholder="Masukan opsi jawaban c ...">
												</div>
												<div class="form-group">
														<label for="opsi_d">Opsi d</label>
														<input type="text" class="form-control" name="opsi_d" id="opsi_d"
																placeholder="Masukan opsi jawaban d ...">
												</div>
												<div class="form-group">
														<label for="opsi_e">Opsi e</label>
														<input type="text" class="form-control" name="opsi_e" id="opsi_e"
																placeholder="Masukan opsi jawaban e ...">
												</div>

												<div class="form-group">
														<label for="kunci">Kunci Jawaban</label>
														<select class="form-control" id="kunci" name="kunci" required>
																{{-- <option>1</option>
																<option>2</option>
																<option>3</option>
																<option>4</option>
																<option>5</option> --}}
														</select>
												</div>

												<button type="submit" class="btn btn-primary">Simpan</button>
										</form>
								</div>
						</div>
				</div>
		</div>


		<div class="row mt-5">
				@foreach ($soals as $s)
						<div class="col-12 mt-3">
								<div class="card shadow-sm">
										<div class="card-header bg-primary bg-opacity-50 text-white">Soal no.{{ $loop->iteration }}</div>
										<div class="card-body">
												<p>{{ $s->soal }}</p>
												<div class="d-flex flex-column mt-3" style="gap: 1rem;">
														{{-- opsi --}}
														<div class="d-flex justify-content-between w-100">
																<p class="{{ $s->opsi_a == $s->kunci ? 'text-success' : '' }}">A. {{ $s->opsi_a }}</p>
																@if ($s->opsi_a == $s->kunci)
																		<div class="bg-success rounded px-2 py-1 text-white">
																				<i class="ti-check-box"></i>
																				<span>Jawaban benar</span>
																		</div>
																@endif
														</div>
														{{-- opsi --}}
														<div class="d-flex justify-content-between w-100">
																<p class="{{ $s->opsi_b == $s->kunci ? 'text-success' : '' }}">B. {{ $s->opsi_b }}</p>
																@if ($s->opsi_b == $s->kunci)
																		<div class="bg-success rounded px-2 py-1 text-white">
																				<i class="ti-check-box"></i>
																				<span>Jawaban benar</span>
																		</div>
																@endif
														</div>
														{{-- opsi --}}
														<div class="d-flex justify-content-between w-100">
																<p class="{{ $s->opsi_c == $s->kunci ? 'text-success' : '' }}">C. {{ $s->opsi_c }}</p>
																@if ($s->opsi_c == $s->kunci)
																		<div class="bg-success rounded px-2 py-1 text-white">
																				<i class="ti-check-box"></i>
																				<span>Jawaban benar</span>
																		</div>
																@endif
														</div>
														{{-- opsi --}}
														<div class="d-flex justify-content-between w-100">
																<p class="{{ $s->opsi_d == $s->kunci ? 'text-success' : '' }}">D. {{ $s->opsi_d }}</p>
																@if ($s->opsi_d == $s->kunci)
																		<div class="bg-success rounded px-2 py-1 text-white">
																				<i class="ti-check-box"></i>
																				<span>Jawaban benar</span>
																		</div>
																@endif
														</div>
														{{-- opsi --}}
														<div class="d-flex justify-content-between w-100">
																<p class="{{ $s->opsi_e == $s->kunci ? 'text-success' : '' }}">E. {{ $s->opsi_e }}</p>
																@if ($s->opsi_e == $s->kunci)
																		<div class="bg-success rounded px-2 py-1 text-white">
																				<i class="ti-check-box"></i>
																				<span>Jawaban benar</span>
																		</div>
																@endif
														</div>
												</div>

										</div>
										<div class="card-footer">
												<a href="{{ route('dosen.evaluasi.edit-modul', $s->id) }}" class="btn btn-warning">Edit</a>

												<!-- Button trigger modal -->
												<button type="button" class="btn btn-danger" data-toggle="modal"
														data-target="#deleteModal{{ $s->id }}">
														Delete
												</button>

												<!-- Modal -->
												<div class="modal fade" id="deleteModal{{ $s->id }}" tabindex="-1" aria-labelledby="deleteModalLabel"
														aria-hidden="true">
														<div class="modal-dialog">
																<div class="modal-content">
																		<div class="modal-header">
																				<h5 class="modal-title" id="deleteModalLabel">Hapus Data ?</h5>
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																						<span aria-hidden="true">&times;</span>
																				</button>
																		</div>
																		<form action="{{ route('dosen.evaluasi.delete-modul', $s->id) }}" method="post">
																				@csrf
																				@method('DELETE')
																				<div class="modal-body">
																						yakin akan menghaous data soal ? tindakan ini tidak dapat dibatalkan setelah
																						anda menekan
																						<strong>Yakin.</strong>
																				</div>
																				<div class="modal-footer">
																						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
																						<button type="submit" class="btn btn-danger">Yakin</button>
																				</div>
																		</form>

																</div>
														</div>
												</div>

										</div>
								</div>
						</div>
				@endforeach
		</div>
@endsection

@push('script')
		<script>
				$(document).ready(function() {
						$('#opsi_a, #opsi_b, #opsi_c, #opsi_d, #opsi_e').on('change keyup', function() {
								var opsiA = $('#opsi_a').val();
								var opsiB = $('#opsi_b').val();
								var opsiC = $('#opsi_c').val();
								var opsiD = $('#opsi_d').val();
								var opsiE = $('#opsi_e').val();

								$('#kunci').empty();
								if (opsiA) $('#kunci').append($('<option>').val(opsiA).text(opsiA));
								if (opsiB) $('#kunci').append($('<option>').val(opsiB).text(opsiB));
								if (opsiC) $('#kunci').append($('<option>').val(opsiC).text(opsiC));
								if (opsiD) $('#kunci').append($('<option>').val(opsiD).text(opsiD));
								if (opsiE) $('#kunci').append($('<option>').val(opsiE).text(opsiE));
						});

				});
		</script>
@endpush

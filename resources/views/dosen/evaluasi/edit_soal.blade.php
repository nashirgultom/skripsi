@extends('dosen.layouts.main')
@section('content')
		<div class="row">
				<div class="col-12">
						<div class="card">
								<div class="card-body">
										<p class="title-table">Edit data soal</p>
										<form action="{{ route('dosen.evaluasi.update-modul', $s->id) }}" class="mt-5" method="POST" class="mt-3">
												@csrf

												<div class="form-group">
														<label for="soal">Soal</label>
														<textarea class="form-control" name="soal" id="soal" rows="3">{{ $s->soal }}</textarea>
												</div>
												<div class="form-group">
														<label for="opsi_a">Opsi a</label>
														<input type="text" class="form-control" name="opsi_a" id="opsi_a"
																placeholder="Masukan opsi jawaban a ..." value="{{ $s->opsi_a }}">
												</div>
												<div class="form-group">
														<label for="opsi_b">Opsi b</label>
														<input type="text" class="form-control" name="opsi_b" id="opsi_b"
																placeholder="Masukan opsi jawaban b ..." value="{{ $s->opsi_b }}">
												</div>
												<div class="form-group">
														<label for="opsi_c">Opsi c</label>
														<input type="text" class="form-control" name="opsi_c" id="opsi_c"
																placeholder="Masukan opsi jawaban c ..." value="{{ $s->opsi_c }}">
												</div>
												<div class="form-group">
														<label for="opsi_d">Opsi d</label>
														<input type="text" class="form-control" name="opsi_d" id="opsi_d"
																placeholder="Masukan opsi jawaban d ..." value="{{ $s->opsi_d }}">
												</div>
												<div class="form-group">
														<label for="opsi_e">Opsi e</label>
														<input type="text" class="form-control" name="opsi_e" id="opsi_e"
																placeholder="Masukan opsi jawaban e ..." value="{{ $s->opsi_e }}">
												</div>

												<div class="form-group">
														<label for="kunci">Kunci Jawaban</label>
														<select class="form-control" id="kunci" name="kunci" required>
														</select>
												</div>

												<button type="submit" class="btn btn-primary">Update</button>
										</form>
								</div>
						</div>
				</div>
		</div>
@endsection

@push('script')
		<script>
				$(document).ready(function() {
						load()
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


						function load() {
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
						}

				});
		</script>
@endpush

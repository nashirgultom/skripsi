@extends('student.layouts.main')
@section('content')
		<div class="row">
				<div class="col-12">
						<div class="card">
								<div class="card-body">
										<table id="card-evaluasi" cellpading=10>
												<tbody>
														<tr>
																<td>Nama</td>
																<td>:</td>
																<td class="capitalize">{{ $eval->name }}</td>
														</tr>
														<tr>
																<td>Durasi</td>
																<td>:</td>
																<td>{{ $eval->durasi }} Menit</td>
														</tr>
												</tbody>
										</table>

								</div>
						</div>
				</div>
		</div>
		<div class="row mt-3">
				<div class="col-12">
						<div class="card">
								<div class="card-body">
										<div>
												{!! $eval->deskripsi !!}
										</div>
								</div>
						</div>
				</div>
		</div>



		<div class="row mt-3">
				<div class="col-12">
						<div>
								<h5>Waktu tersisa :</h5>
								<div id="jam"></div>
						</div>
				</div>
		</div>

		<div class="row mt-3">
				<div class="col-12">
						<div class="alert alert-info alert-dismissible fade show" role="alert">
								<strong>Informasi!</strong> Evaluasi ini akan disubmit otomatis setelah waktu habis.
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
								</button>
						</div>
				</div>
		</div>


		{{-- section soal --}}
		<div class="row">
				<div class="col-12">
						<form id="evaluasiForm" action="{{ route('student.evaluasi.koreksi') }}" method="post">
								@csrf

								<input type="hidden" name="id_evaluasi" value="{{ $eval->id }}">

								@foreach ($soal as $index => $s)
										<div class="card mt-3">
												<div class="card-body">
														<h5>{{ $s->soal }}</h5>
														<div>
																<input type="radio" id="opsi_a_{{ $index }}" name="jawaban[{{ $s->id }}]"
																		value="{{ $s->opsi_a }}">
																<label for="opsi_a_{{ $index }}">{{ $s->opsi_a }}</label>
														</div>
														<div>
																<input type="radio" id="opsi_b_{{ $index }}" name="jawaban[{{ $s->id }}]"
																		value="{{ $s->opsi_b }}">
																<label for="opsi_b_{{ $index }}">{{ $s->opsi_b }}</label>
														</div>
														<div>
																<input type="radio" id="opsi_c_{{ $index }}" name="jawaban[{{ $s->id }}]"
																		value="{{ $s->opsi_c }}">
																<label for="opsi_c_{{ $index }}">{{ $s->opsi_c }}</label>
														</div>
														<div>
																<input type="radio" id="opsi_d_{{ $index }}" name="jawaban[{{ $s->id }}]"
																		value="{{ $s->opsi_d }}">
																<label for="opsi_d_{{ $index }}">{{ $s->opsi_d }}</label>
														</div>
														<div>
																<input type="radio" id="opsi_e_{{ $index }}" name="jawaban[{{ $s->id }}]"
																		value="{{ $s->opsi_e }}">
																<label for="opsi_e_{{ $index }}">{{ $s->opsi_e }}</label>
														</div>
												</div>
										</div>
								@endforeach

								<div class="card mt-3">
										<div class="card-body">
												<button type="submit" class="btn btn-primary">Selesai</button>
										</div>
								</div>

						</form>
						{{-- end form --}}
				</div>
		</div>


		{{-- area modal konfirmasi  --}}
		<div class="modal" id="modalKonfirmasi" tabindex="-1">
				<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
								<div class="modal-header">
										<h5 class="modal-title">Mulai mengerjakan evaluasi</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
										</button>
								</div>
								<div class="modal-body">
										<p>Dengan menekan tombol mulai waktu akan mulai berjalan waktu yang anda miliki untuk mengerjakan evaluasi ini
												adalah {{ $eval->durasi }} Menit.</p>
								</div>
								<div class="modal-footer">
										<button type="button" class="btn btn-primary" onclick="mulai()" data-dismiss="modal">Mengerti</button>
										{{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
								</div>
						</div>
				</div>
		</div>
@endsection

@push('script')
		<script>
				$(document).ready(function() {

						$('#modalKonfirmasi').modal('show');



				})

				function mulai() {
						const durasi = {{ $eval->durasi }};


						let sekarang = new Date();

						let waktuAkhir = new Date(sekarang.getTime() + durasi * 60000);

						// Setting simplyCountdown
						simplyCountdown('#jam', {
								year: waktuAkhir.getFullYear(),
								month: waktuAkhir.getMonth() + 1,
								day: waktuAkhir.getDate(),
								hours: waktuAkhir.getHours(),
								minutes: waktuAkhir.getMinutes(),
								seconds: 0,
								words: {
										days: {
												singular: 'hari',
												// plural: 'days'
										},
										hours: {
												singular: 'jam',
												// plural: 'hours'
										},
										minutes: {
												singular: 'menit',
												// plural: 'minutes'
										},
										seconds: {
												singular: 'detik',
												// plural: 'seconds'
										}
								},
								plural: false, //use plurals
								inline: false, //set to true to get an inline basic countdown like : 24 days, 4 hours, 2 minutes, 5 seconds
								inlineClass: 'simply-countdown-inline', //inline css span class in case of inline = true
								// in case of inline set to false
								enableUtc: false,
								onEnd: function() {
										$('#evaluasiForm').submit();
										console.log('form di submit otomatis oleh waktu')
										return;
								},
								refresh: 1000, //default refresh every 1s
								sectionClass: 'simply-section', //section css class
								amountClass: 'simply-amount', // amount css class
								wordClass: 'simply-word', // word css class
								zeroPad: false,
								countUp: false, // enable count up if set to true
						});
				}
		</script>
@endpush

@push('css')
		<style>
				#card-evaluasi tbody tr td {
						padding: 10px;
				}

				#card-evaluasi tbody tr td:nth-child(1) {
						/* Style untuk td pertama */
						width: 10%;
						text-align: start;
				}

				#card-evaluasi tbody tr td:nth-child(2) {
						/* Style untuk td kedua */
						width: 2%;
						text-align: start;
				}

				#card-evaluasi tbody tr td:nth-child(3) {
						/* Style untuk td ketiga */
						width: 88%;
						text-align: start;
				}


				/* countdown css area  */
				#jam {
						display: flex;
						justify-content: start;
						gap: 20px;
				}

				.simply-section {
						display: flex;
						background-color: #4848A4;
						border-radius: 19px;
						color: white;
						padding: 10px 20px;
				}

				.simply-section div {
						display: flex;
						flex-direction: column;
						justify-content: center;
						align-items: center;
				}
		</style>
@endpush

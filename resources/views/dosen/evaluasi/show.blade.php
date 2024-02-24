@extends('dosen.layouts.main')
@section('content')
		{{-- info section --}}
		<div class="row">
				<div class="col-md-12 grid-margin">
						<div class="row">
								<div class="col-12 col-xl-8 mb-xl-0 mb-4">
										<h3 class="font-weight-bold">buat evaluasi pada mata kuliah <strong
														class="text-primary">{{ $mk->name }}</strong></h3>
										<h6 class="font-weight-normal mb-0">

										</h6>
								</div>
						</div>
				</div>
		</div>

		{{-- create section --}}
		<div class="row">
				<div class="col-12">
						<div class="card">
								<div class="card-body">
										<h3>Tambah evaluasi baru</h3>
										<form action="{{ route('dosen.evaluasi.store') }}" method="POST" class="mt-3">
												@csrf

												{{-- hidden area start --}}
												<input type="hidden" name="kode_mk" value="{{ $mk->kode_mk }}">
												{{-- hidden area end --}}

												<div class="form-group">
														<label for="name">Judul</label>
														<input type="text" class="form-control" name="name" id="name"
																placeholder="Masukan judul evaluasi ...">
												</div>

												<div class="form-group">
														<label for="durasi">Durasi dalam menit</label>
														<input type="number" class="form-control" name="durasi" id="durasi" placeholder="Contoh : 120">
												</div>

												<div class="form-group">
														<label for="deskripsi">Deskripsi</label>
														<textarea class="form-control deskripsi" name="deskripsi" id="deskripsi" rows="6"></textarea>
												</div>


												<button type="submit" class="btn btn-primary">Simpan</button>
										</form>
								</div>
						</div>
				</div>
		</div>



		<div class="row mt-5">
				<div class="col-12">
						<div class="card">
								<div class="card-body">
										<p class="title-table">Evaluasi tersedia</p>
										<div class="table-responsive">
												<table class="table">
														<thead>
																<tr>
																		<th scope="col">#</th>
																		<th scope="col">Nama</th>
																		<th scope="col">Durasi</th>
																		<th scope="col">Status</th>
																		<th scope="col">Publikasi</th>
																		<th scope="col">Aksi</th>
																</tr>
														</thead>
														<tbody>
																@if (empty($eval))
																		<tr>
																				<td colspan="4">-- Data belum ada --</td>
																		</tr>
																@else
																		@foreach ($eval as $e)
																				<tr data-evaluasi-id="{{ $e->id }}">
																						<th scope="row">{{ $loop->iteration }}</th>
																						<td>{{ $e->name }}</td>
																						<td>{{ $e->durasi }} Menit</td>
																						<td>

																								@if ($e->status == 0)
																										<span class="badge badge-pill badge-secondary">Draft</span>
																								@else
																										<span class="badge badge-pill badge-info">Telah dipublikasi</span>
																								@endif
																						</td>
																						<td>

																								<label class="switch">
																										<input {{ $e->status == 1 ? 'checked' : '' }} type="checkbox">
																										<span class="slider round"></span>
																								</label>


																						</td>
																						{{-- baru sampai sini tadi di kantor . ubah iini jadi button . untuk update satus --}}
																						<td>

																								<a href="{{ route('dosen.evaluasi.edit', $e->id) }}" class="btn btn-warning"><i
																												class="ti-pencil"></i></a>
																								<a href="{{ route('dosen.evaluasi.create-modul', $e->id) }}" class="btn btn-primary">Lihat
																										Soal</a>

																								{{-- modal delete --}}
																								<!-- Button trigger modal -->
																								<button type="button" class="btn btn-danger" data-toggle="modal"
																										data-target="#delete{{ $e->id }}">
																										<i class="ti-trash"></i>
																								</button>

																								<!-- Modal -->
																								<div class="modal fade" id="delete{{ $e->id }}" tabindex="-1"
																										aria-labelledby="deleteLabel" aria-hidden="true">
																										<div class="modal-dialog">
																												<div class="modal-content">
																														<div class="modal-header">
																																<h5 class="modal-title" id="deleteLabel">Hapus Data ?</h5>
																																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																																		<span aria-hidden="true">&times;</span>
																																</button>
																														</div>
																														<form action="{{ route('dosen.evaluasi.destroy', $e->id) }}" method="post">
																																@csrf
																																@method('DELETE')

																																<div class="modal-body">
																																		Yakin akan menghapus data evaluasi <strong>{{ $e->name }}</strong>
																																</div>
																																<div class="modal-footer">
																																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
																																		<button type="submit" class="btn btn-danger">Yakin</button>
																																</div>
																														</form>

																												</div>
																										</div>
																								</div>

																						</td>
																				</tr>
																		@endforeach
																@endif
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
				$(document).ready(function() {
						$('.deskripsi').summernote({
								placeholder: 'Masukan deskripsi evaluasi di sini ...',
								tabsize: 2,
								height: 200,
								toolbar: [
										// Menambahkan grup toolbar yang diinginkan
										['style', ['bold', 'italic', 'underline', 'clear']],
										['font', ['strikethrough', 'superscript', 'subscript']],
										['fontsize', ['fontsize']],
										['color', ['color']],
										['para', ['ul', 'ol', 'paragraph']],
										['height', ['height']],
										// Menonaktifkan fitur insertImage dan insertVideo
										// ['insert', ['link', 'picture', 'video']], // Baris ini biasanya mengaktifkan fitur gambar dan video
								]
						});

						// logic untuk mengangani toggle 
						$('.switch input[type="checkbox"]').click(function() {
								console.log('event toggle...')
								var evaluasiId = $(this).closest('tr').attr('data-evaluasi-id');
								console.log(evaluasiId);

								var isChecked = $(this).is(':checked');
								var url = '/dosen/evaluasi/publish/';
								var status = isChecked ? 1 : 0;
								console.log(url, status);

								$.ajax({
										url: url + evaluasiId + "?status=" + status,
										type: 'GET',
										success: function(response) {
												console.log(response);
												window.location.reload();
										},
										error: function(error) {
												console.error(error);
										}
								});
						});


				})
		</script>
@endpush


@push('css')
		<style>
				/* Container switch */
				.switch {
						position: relative;
						display: inline-block;
						width: 60px;
						height: 34px;
				}

				/* Hide default checkbox */
				.switch input {
						opacity: 0;
						width: 0;
						height: 0;
				}

				/* Style slider */
				.slider {
						position: absolute;
						cursor: pointer;
						top: 0;
						left: 0;
						right: 0;
						bottom: 0;
						background-color: #ccc;
						-webkit-transition: .4s;
						transition: .4s;
				}

				.slider:before {
						position: absolute;
						content: "";
						height: 26px;
						width: 26px;
						left: 4px;
						bottom: 4px;
						background-color: white;
						-webkit-transition: .4s;
						transition: .4s;
				}

				input:checked+.slider {
						background-color: #2196F3;
				}

				input:focus+.slider {
						box-shadow: 0 0 1px #2196F3;
				}

				input:checked+.slider:before {
						-webkit-transform: translateX(26px);
						-ms-transform: translateX(26px);
						transform: translateX(26px);
				}

				/* Bentuk bulat slider */
				.slider.round {
						border-radius: 34px;
				}

				.slider.round:before {
						border-radius: 50%;
				}
		</style>
@endpush

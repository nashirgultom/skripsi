@extends('admin.layouts.main')
@section('content')
		<div class="row">
				<div class="col-md-12 grid-margin">
						<div class="row">
								<div class="col-12 col-xl-8 mb-xl-0 mb-4">
										<h3 class="font-weight-bold">Data Kelas</h3>
										<h6 class="font-weight-normal mb-0">
												daftar seluruh kelas yang tersedia
										</h6>
								</div>
						</div>
				</div>
		</div>
		<div class="row mb-3">
				<div class="card w-100">
						<div class="card-body p-4">
								<form action="{{ route('dosen.datakelas.store') }}" method="POST" class="row">
										@csrf


										<div class="col-6">
												<div class="form-group">
														<label for="kode">Kode : </label>
														<input type="text" class="form-control" id="kode" name="kode" value="{{ $kodemk }}"
																readonly>
												</div>

												<div class="form-group">
														<label for="dosen">Dosen Pengajar</label>
														<select class="form-control" name="dosen" id="dosen">
																@foreach ($dosen as $d)
																		<option value="{{ $d->id }}">{{ $d->first_name . ' ' . $d->last_name }}</option>
																@endforeach
														</select>
												</div>

												<div class="form-group">
														<label for="name">Nama Mata Kuliah<span class="text-danger">*</span> : </label>
														<input type="text" class="form-control" id="name" name="name" required>
												</div>
										</div>
										<div class="col-6">
												<div class="form-group mb-3">
														<label for="">Gambar thumbnail kelas <span class="text-danger">(Opsional)</span></label>
														<div class="alert alert-info" role="alert">
																rekomendasi ukuran gambar 1080 x 1980
														</div>
														<div class="custom-file">
																<input type="file" class="custom-file-input" id="inputGroupFile02">
																<label class="custom-file-label" for="inputGroupFile02">Choose file</label>
														</div>
												</div>
												<div class="form-group mb-3">
														<img id="imagePreview" class="w-50 d-none mx-auto" src="" alt="" srcset="">

												</div>
										</div>
										<button type="submit" class="btn btn-primary">Simpan</button>

								</form>
						</div>
				</div>
		</div>

		<div class="row">
				<div class="card w-100">
						<div class="card-body table-responsive">
								<h3>Data Modul Anda</h3>
								<table class="table-hover table">
										<thead>
												<tr>
														<th>No.</th>
														<th>Kode</th>
														<th>Nama Mata Kuliah</th>
														<th>Dosen Pengajar</th>
														<th>Dibuat</th>
														<th>Aksi</th>
												</tr>
										</thead>
										<tbody>
												@foreach ($mks as $mk)
														<tr>
																<td>{{ $loop->iteration }}</td>
																<td>{{ $mk->kode_mk }}</td>
																<td>{{ $mk->name }}</td>
																<td>{{ $mk->dosen->first_name . ' ' . $mk->dosen->last_name }}</td>
																<td>{{ $mk->created_at }}</td>
																<td>
																		<!-- Button trigger modal edit -->
																		<button type="button" class="btn btn-warning d-inline-block" data-toggle="modal"
																				data-target="#modalEdit{{ $mk->id }}">
																				<i class="ti-pencil"></i>
																		</button>

																		<!-- Modal edit -->
																		<div class="modal fade" id="modalEdit{{ $mk->id }}" tabindex="-1" role="dialog"
																				aria-labelledby="modalEditLabel" aria-hidden="true">
																				<div class="modal-dialog" role="document">
																						<div class="modal-content">
																								<div class="modal-header">
																										<h5 class="modal-title" id="modalEditLabel">Edit data modul {{ $mk->name }}</h5>
																										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																												<span aria-hidden="true">&times;</span>
																										</button>
																								</div>
																								<form action="{{ route('admin.kelas.update', $mk->id) }}" method="post">
																										@csrf
																										@method('PUT')

																										<div class="modal-body">
																												<div class="col-12">
																														<div class="form-group">
																																<label for="kode">Kode : </label>
																																<input type="text" class="form-control" id="kode" name="kode"
																																		value="{{ $mk->kode_mk }}" readonly>
																														</div>

																														{{-- select dosen --}}
																														<div class="form-group">
																																<label for="dosen">Dosen Pengajar</label>
																																<select class="form-control" name="dosen" id="dosen">
																																		@foreach ($dosen as $dos)
																																				<option {{ $mk->id_users == $dos->id ? 'selected' : '' }}
																																						value="{{ $dos->id }}">
																																						{{ $dos->first_name . ' ' . $dos->last_name }}
																																				</option>
																																		@endforeach
																																</select>
																														</div>

																														<div class="form-group">
																																<label for="name">Nama Mata Kuliah : </label>
																																<input type="text" class="form-control" id="name" name="name"
																																		value="{{ $mk->name }}" required>
																														</div>
																												</div>
																										</div>
																										<div class="modal-footer">
																												<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
																												<button type="submit" class="btn btn-primary">Simpan</button>
																										</div>
																								</form>

																						</div>
																				</div>
																		</div>

																		{{-- delete --}}
																		{{-- <form action="{{ route('dosen.datakelas.destroy', $mk->id) }}" class="d-inline-block"
																				id="deleteForm">
																				<button type="submit" class="btn fw-bold btn-danger" data-confirm-delete="true"><i
																								class="ti-trash"></i></button>
																		</form> --}}

																		{{-- modal delete --}}
																		<!-- Button trigger modal -->
																		<button type="button" class="btn btn-danger" data-toggle="modal"
																				data-target="#modalDelete{{ $mk->id }}">
																				<i class="ti-trash"></i>
																		</button>

																		<!-- Modal -->
																		<div class="modal fade" id="modalDelete{{ $mk->id }}" tabindex="-1" role="dialog"
																				aria-labelledby="modalDeleteLabel" aria-hidden="true">
																				<div class="modal-dialog" role="document">
																						<div class="modal-content">
																								<div class="modal-header">
																										<h5 class="modal-title" id="modalDeleteLabel">Hapus Data !</h5>
																										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																												<span aria-hidden="true">&times;</span>
																										</button>
																								</div>
																								<form action="{{ route('admin.kelas.destroy', $mk->id) }}" method="post">
																										@csrf
																										@method('DELETE')
																										<div class="modal-body">
																												<div class="col-12">
																														<p>Yakin ingin menghapus data kelas <strong>{{ $mk->name }}</strong></p>
																												</div>
																										</div>
																										<div class="modal-footer">
																												<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
																												<button type="submit" class="btn btn-danger">Ya, Hapus !</button>
																										</div>
																								</form>
																						</div>
																				</div>
																		</div>


																</td>
														</tr>
												@endforeach
										</tbody>
								</table>
						</div>
				</div>
		</div>
@endsection


@push('script')
		<script>
				$(document).ready(function() {

						console.log('jquery siap')

						let kode = $('#kode').val();

						$('#inputGroupFile02').change(function(event) {
								var output = $('#imagePreview');
								output.addClass('d-block')
								output.attr('src', URL.createObjectURL(event.target.files[0]));
								output.onload = function() {
										URL.revokeObjectURL(output.src) // Menghapus URL setelah load
								}
						});
				})
		</script>
@endpush

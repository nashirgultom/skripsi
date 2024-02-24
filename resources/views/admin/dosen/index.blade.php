@extends('admin.layouts.main')
@section('content')
		<div class="row">
				<div class="col-md-12 grid-margin">
						<div class="row">
								<div class="col-12 col-xl-8 mb-xl-0 mb-4">
										<h3 class="font-weight-bold">Data Dosen</h3>
										<h6 class="font-weight-normal mb-0">

										</h6>
								</div>
						</div>
				</div>
		</div>
		<div class="row mb-3">
				<div class="card w-100">
						<div class="card-body p-4">
								<form action="{{ route('admin.dosen.store') }}" method="POST" class="row">
										@csrf


										<div class="col-6">
												<div class="form-group">
														<label for="first_name">Nama depan : </label>
														<input value="{{ old('first_name') }}" type="text"
																class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name">

												</div>
												<div class="form-group">
														<label for="last_name">Nama belakang : </label>
														<input value="{{ old('last_name') }}" type="text"
																class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name">
												</div>
										</div>
										<div class="col-6">
												<div class="form-group">
														<label for="username">Username : </label>
														<input value="{{ old('username') }}" type="text"
																class="form-control @error('username') is-invalid @enderror" id="username" name="username">
														@error('username')
																<div class="invalid-feedback">
																		{{ $message }}
																</div>
														@enderror
												</div>

												<div class="form-group">
														<label for="email">Email : </label>
														<input value="{{ old('email') }}" type="email" class="form-control @error('email') is-invalid @enderror"
																id="email" name="email" required>
														@error('email')
																<div class="invalid-feedback">
																		{{ $message }}
																</div>
														@enderror
												</div>

												<input type="hidden" name="password" value="darmajaya123">

										</div>
										<button type="submit" class="btn btn-primary">Simpan</button>

								</form>
						</div>
				</div>
		</div>

		<div class="row">
				<div class="card w-100">
						<div class="card-body table-responsive">
								<h3>Daftar dosen</h3>
								<table class="table-hover table">
										<thead>
												<tr>
														<th>No.</th>
														<th>Nama</th>
														<th>Mulai Mendaftar</th>
														<th>Aksi</th>
												</tr>
										</thead>
										<tbody>
												@foreach ($dosen as $d)
														<tr>
																<td>{{ $loop->iteration }}</td>
																<td>{{ $d->first_name . ' ' . $d->last_name }}</td>
																<td>{{ $d->created_at }}</td>
																<td>
																		<!-- Button trigger modal edit -->
																		<button type="button" class="btn btn-warning d-inline-block" data-toggle="modal"
																				data-target="#modalEdit{{ $d->id }}">
																				<i class="ti-pencil"></i>
																		</button>

																		<!-- Modal edit -->
																		<div class="modal fade" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog"
																				aria-labelledby="modalEditLabel" aria-hidden="true">
																				<div class="modal-dialog" role="document">
																						<div class="modal-content">
																								<div class="modal-header">
																										<h5 class="modal-title" id="modalEditLabel">Edit data modul {{ $d->name }}</h5>
																										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																												<span aria-hidden="true">&times;</span>
																										</button>
																								</div>
																								<form action="{{ route('admin.dosen.update', $d->id) }}" method="post">
																										@csrf
																										@method('PUT')

																										<div class="modal-body">
																												<div class="form-group">
																														<label for="first_name">Nama depan : </label>
																														<input value="{{ $d->first_name }}" type="text"
																																class="form-control @error('first_name') is-invalid @enderror" id="first_name"
																																name="first_name">

																												</div>
																												<div class="form-group">
																														<label for="last_name">Nama belakang : </label>
																														<input value="{{ $d->last_name }}" type="text"
																																class="form-control @error('last_name') is-invalid @enderror" id="last_name"
																																name="last_name">
																												</div>
																												<div class="form-group">
																														<label for="username">Username : </label>
																														<input value="{{ $d->username }}" type="text"
																																class="form-control @error('username') is-invalid @enderror" id="username"
																																name="username">
																														@error('username')
																																<div class="invalid-feedback">
																																		{{ $message }}
																																</div>
																														@enderror
																												</div>

																												<div class="form-group">
																														<label for="email">Email : </label>
																														<input value="{{ $d->email }}" type="email"
																																class="form-control @error('email') is-invalid @enderror" id="email" name="email"
																																required>
																														@error('email')
																																<div class="invalid-feedback">
																																		{{ $message }}
																																</div>
																														@enderror
																												</div>


																										</div>
																										<div class="modal-footer">
																												<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
																												<button type="submit" class="btn btn-warning">Update</button>
																										</div>
																								</form>

																						</div>
																				</div>
																		</div>
																		<!-- Button trigger modal -->
																		<button type="button" class="btn btn-danger" data-toggle="modal"
																				data-target="#modalDelete{{ $d->id }}">
																				<i class="ti-trash"></i>
																		</button>

																		<!-- Modal -->
																		<div class="modal fade" id="modalDelete{{ $d->id }}" tabindex="-1" role="dialog"
																				aria-labelledby="modalDeleteLabel" aria-hidden="true">
																				<div class="modal-dialog" role="document">
																						<div class="modal-content">
																								<div class="modal-header">
																										<h5 class="modal-title" id="modalDeleteLabel">Hapus Data !</h5>
																										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																												<span aria-hidden="true">&times;</span>
																										</button>
																								</div>
																								<form action="{{ route('admin.dosen.destroy', $d->id) }}" method="post">
																										@csrf
																										@method('DELETE')
																										<div class="modal-body">
																												<div class="col-12">
																														<p>Yakin ingin menghapus data kelas <strong></strong></p>
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

@extends('dosen.layouts.main')
@section('content')
		<div class="row">
				<div class="col-12">
						<div class="card">
								<div class="card-body">
										<p class="title-table">Update data evaluasi</p>
										<form action="{{ route('dosen.evaluasi.update', $eval->id) }}" method="POST" class="mt-3">
												@csrf
												@method('PUT')

												{{-- hidden area start --}}
												<input type="hidden" name="kode_mk" value="{{ $eval->kode_mk }}">
												{{-- hidden area end --}}

												<div class="form-group">
														<label for="name">Judul</label>
														<input type="text" class="form-control" name="name" id="name" value="{{ $eval->name }}"
																placeholder="Masukan judul evaluasi ...">
												</div>

												<div class="form-group">
														<label for="durasi">Durasi dalam menit</label>
														<input type="number" class="form-control" name="durasi" id="durasi" value="{{ $eval->durasi }}"
																placeholder="Contoh : 120">
												</div>

												<div class="form-group">
														<label for="deskripsi">Deskripsi</label>
														<textarea class="form-control deskripsi" name="deskripsi" id="deskripsi" rows="6">{{ $eval->deskripsi }}</textarea>
												</div>


												<button type="submit" class="btn btn-primary">Simpan</button>
										</form>
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




				})
		</script>
@endpush

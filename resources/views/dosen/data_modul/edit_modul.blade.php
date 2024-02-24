@extends('dosen.layouts.main')
@section('content')
		<div class="row">
				<div class="col-12">
						<h3>Edit data materi modul</h3>
						<div class="card">
								<div class="card-body">
										<form action="{{ route('dosen.modul.update', $modul->id) }}" method="POST" class="mt-3">
												@csrf
												@method('PUT')

												{{-- hidden area start --}}
												<input type="hidden" name="kode_mk" value="{{ $modul->kode_mk }}">
												{{-- hidden area end --}}

												<div class="form-group">
														<label for="Judul">Judul</label>
														<input type="text" class="form-control" name="judul" id="Judul" value="{{ $modul->judul }}"
																placeholder="Masukan judul modul anda ...">
												</div>

												<div class="form-group">
														<label for="materi">Materi</label>
														<textarea class="form-control" name="materi" id="materi" rows="6">{{ $modul->materi }}</textarea>
												</div>


												<button type="submit" class="btn btn-warning">Update materi</button>
										</form>
								</div>
						</div>
				</div>
		</div>
@endsection
@push('script')
		<script>
				$('#materi').summernote({
						placeholder: 'Masukan materi di sini ...',
						tabsize: 2,
						height: 100
				});
		</script>
@endpush

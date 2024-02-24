@extends('dosen.layouts.main')
@section('content')
		<div class="row mb-3">
				<div class="col-3">
						<a href="{{ route('dosen.modul.show', $modul[0]->kode_mk) }}" class="btn btn-primary">Kembali</a>
				</div>
		</div>
		<div class="row">
				<div class="col-12">
						<div class="card">
								<div class="card-body">
										@foreach ($modul as $m)
												<br>
												{!! $m->materi !!}
										@endforeach
								</div>
						</div>
				</div>
		</div>
@endsection

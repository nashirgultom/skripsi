@extends('student.layouts.main')
@section('content')
		<div class="row">
				<div class="col-12">
						<div class="card shadow">
								<div class="card-body">
										<h4>Selamat !, Anda telah berhasil menyelesaikan evaluasi dengan baik.</h4>
										<a href="{{ route('student.nilai.index') }}" class="btn btn-primary">Cek Nilai</a>
								</div>
						</div>
				</div>
		</div>
@endsection

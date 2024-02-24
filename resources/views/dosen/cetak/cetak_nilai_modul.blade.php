<!doctype html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Daftar Nilai Modul {{ $mk->name }}</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
				integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
		<div class="mt-4">

				<div class="row d-flex align-items-baseline">
						<div class="col-3">
								<img class="w-100" src="{{ asset('images') }}/lms/logo/logo.png" alt="logo darmajaya">
						</div>
						<div class="col-9">
								<h3 class="text-center">Daftar nilai mahasiswa modul {{ $mk->name }}</h3>
						</div>
				</div>
				<hr class="mb-5">

				@foreach ($evals as $eval)
						@if ($eval->evaluasistudent->count() != 0)
								<div class="row mt-3">
										<div class="col-12">
												<h5 class="mb-4">{{ $eval->name }}</h5>
												<h1>

												</h1>
												<div class="table-responsive">
														<table class="table-bordered table">
																<thead>
																		<tr>
																				<th scope="col">No</th>
																				<th scope="col">Nama Mahasiswa</th>
																				<th scope="col">Nilai</th>
																				<th scope="col">Jumlah Jawaban Benar</th>
																				<th scope="col">Tanggal Mengerjakan</th>
																		</tr>
																</thead>
																<tbody>
																		@foreach ($eval->evaluasistudent as $es)
																				<tr>
																						<th scope="row">{{ $loop->iteration }}</th>
																						<td>{{ $es->mahasiswa->first_name . ' ' . $es->mahasiswa->last_name }}</td>
																						<td>{{ $es->nilai }}</td>
																						<td>{{ $es->jawaban_benar . '/' . $es->evaluasi->bankSoal->count() }}</td>
																						<td>{{ $es->created_at }}</td>
																				</tr>
																		@endforeach

																</tbody>
														</table>
												</div>
										</div>
								</div>
								<hr class="mb-5">
						@endif
				@endforeach

		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
				integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
		<script>
				window.onload = function() {
						window.print(); // Memicu dialog print
						window.onafterprint = function() {
								window.history.back(); // Kembali ke halaman sebelumnya setelah pencetakan
						}
				};
		</script>


</body>

</html>

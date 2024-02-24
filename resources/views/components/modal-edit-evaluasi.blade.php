<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit{{ $id }}">
		Edit
</button>

<!-- Modal -->
<div class="modal fade" id="modalEdit{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
				<div class="modal-content">
						<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Edit evaluasi</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<form action="{{ route('dosen.evaluasi.update') }}" method="POST" class="mt-3">
								@csrf
								<div class="modal-body">

										{{-- hidden area start --}}
										<input type="hidden" name="kode_mk" value="{{ $kode_mk }}">
										{{-- hidden area end --}}

										<div class="form-group">
												<label for="name">Judul</label>
												<input type="text" class="form-control" name="name" id="name" value="{{ $name }}"
														placeholder="Masukan judul evaluasi ...">
										</div>

										<div class="form-group">
												<label for="durasi">Durasi dalam menit</label>
												<input type="number" class="form-control" name="durasi" id="durasi" placeholder="Contoh : 120"
														value="{{ $durasi }}">
										</div>

										<div class="form-group">
												<label for="deskripsi">Deskripsi</label>
												<textarea class="form-control" name="deskripsi" id="deskripsi" rows="6">{{ $deskripsi }}</textarea>
										</div>


										<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
								<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
										<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
						</form>
				</div>
		</div>
</div>

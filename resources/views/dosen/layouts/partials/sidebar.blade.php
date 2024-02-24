<nav class="sidebar sidebar-offcanvas" id="sidebar">
		<ul class="nav">
				<li class="nav-item {{ \Route::is('dosen.dashboard.*') ? 'active' : '' }}">
						<a class="nav-link" href="{{ route('dosen.dashboard.index') }}">
								<i class="icon-grid menu-icon"></i>
								<span class="menu-title">Dashboard</span>
						</a>
				</li>
				<li class="nav-item {{ \Route::is('dosen.datakelas.*') ? 'active' : '' }}">
						<a class="nav-link" href="{{ route('dosen.datakelas.index') }}">
								<i class="icon-grid menu-icon"></i>
								<span class="menu-title">Data Kelas</span>
						</a>
				</li>
				<li class="nav-item {{ \Route::is('dosen.modul.*') ? 'active' : '' }}">
						<a class="nav-link" href="{{ route('dosen.modul.index') }}">
								<i class="icon-grid menu-icon"></i>
								<span class="menu-title">Data Modul</span>
						</a>
				</li>
				<li class="nav-item {{ \Route::is('dosen.evaluasi.*') ? 'active' : '' }}">
						<a class="nav-link" href="{{ route('dosen.evaluasi.index') }}">
								<i class="icon-grid menu-icon"></i>
								<span class="menu-title">Data Evaluasi</span>
						</a>
				</li>
				<li class="nav-item {{ \Route::is('dosen.nilai.*') ? 'active' : '' }}">
						<a class="nav-link" href="{{ route('dosen.nilai.index') }}">
								<i class="icon-grid menu-icon"></i>
								<span class="menu-title">Data Nilai</span>
						</a>
				</li>



				{{-- <li class="nav-item {{ '' }}">
						<a class="nav-link" href="{{ 'dd' }}">
								<i class="icon-grid menu-icon"></i>
								<span class="menu-title">Data Mahasiswa</span>
						</a>
				</li>

				<li class="nav-item">
						<a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
								<i class="icon-layout menu-icon"></i>
								<span class="menu-title">UI Elements</span>
								<i class="menu-arrow"></i>
						</a>
						<div class="collapse" id="ui-basic">
								<ul class="nav flex-column sub-menu">
										<li class="nav-item">
												<a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
										</li>
										<li class="nav-item">
												<a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a>
										</li>
										<li class="nav-item">
												<a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
										</li>
								</ul>
						</div>
				</li> --}}


		</ul>
</nav>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
		<ul class="nav">
				{{-- {{ dd(Route::is('student.dashboard.index')) }} --}}
				{{-- {{ dd(Route::currentRouteName()) }} --}}
				<li class="nav-item {{ \Route::is('student.dashboard.*') ? 'active' : '' }}">
						<a class="nav-link" href="{{ route('student.dashboard.index') }}">
								<i class="icon-grid menu-icon"></i>
								<span class="menu-title">Dashboard</span>
						</a>
				</li>
				<li class="nav-item {{ \Route::is('student.kelas.*') ? 'active' : '' }}">
						<a class="nav-link" href="{{ route('student.kelas.index') }}">
								<i class="icon-grid menu-icon"></i>
								<span class="menu-title">Modul Favorit Saya</span>
						</a>
				</li>
				{{-- <li class="nav-item {{ \Route::is('student.evaluasi.*') ? 'active' : '' }}">
						<a class="nav-link" href="{{ route('student.evaluasi.index') }}">
								<i class="icon-grid menu-icon"></i>
								<span class="menu-title">Evaluasi</span>
						</a>
				</li> --}}
				<li class="nav-item {{ \Route::is('student.nilai.*') ? 'active' : '' }}">
						<a class="nav-link" href="{{ route('student.nilai.index') }}">
								<i class="icon-grid menu-icon"></i>
								<span class="menu-title">Nilai</span>
						</a>
				</li>
				{{-- <li class="nav-item">
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

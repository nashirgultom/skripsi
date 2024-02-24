<nav class="sidebar sidebar-offcanvas" id="sidebar">
		<ul class="nav">
				<li class="nav-item {{ \Route::is('admin.dashboard.*') ? 'active' : '' }}">
						<a class="nav-link" href="{{ route('admin.dashboard.index') }}">
								<i class="icon-grid menu-icon"></i>
								<span class="menu-title">Dashboard</span>
						</a>
				</li>
				{{-- data dosen --}}
				<li class="nav-item {{ \Route::is('admin.dosen.*') ? 'active' : '' }}">
						<a class="nav-link" href="{{ route('admin.dosen.index') }}">
								<i class="icon-grid menu-icon"></i>
								<span class="menu-title">Master Data Dosen</span>
						</a>
				</li>


				<li class="nav-item {{ \Route::is('admin.kelas.*') ? 'active' : '' }}">
						<a class="nav-link" href="{{ route('admin.kelas.index') }}">
								<i class="icon-grid menu-icon"></i>
								<span class="menu-title">Master Kelas</span>
						</a>
				</li>
				<li class="nav-item {{ \Route::is('admin.nilai.*') ? 'active' : '' }}">
						<a class="nav-link" href="{{ route('admin.nilai.index') }}">
								<i class="icon-grid menu-icon"></i>
								<span class="menu-title">Master Nilai</span>
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

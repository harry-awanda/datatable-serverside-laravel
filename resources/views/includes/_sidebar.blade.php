<div class="iq-sidebar  sidebar-default ">
	<div class="iq-sidebar-logo d-flex align-items-center">
		<a href="../backend/index.html" class="header-logo">
			<img src="{{ asset('assets/images/logo.svg')}}" alt="logo">
				<h3 class="logo-title light-logo">Webkit</h3>
		</a>
		<div class="iq-menu-bt-sidebar ml-0">
			<i class="las la-bars wrapper-menu"></i>
		</div>
	</div>
	<div class="data-scrollbar" data-scroll="1">
		<nav class="iq-sidebar-menu">
			<ul id="iq-sidebar-toggle" class="iq-menu">
				<li class="@if (Request::segment(1) == 'dashboard') active @endif">
					<a href="{{route ('dashboard') }}" class="svg-icon">
						<svg class="svg-icon" width="25" height="25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
							<polyline points="9 22 9 12 15 12 15 22"></polyline>
						</svg>
						<span class="ml-4">Dashboards</span>
					</a>
				</li>
				<li class="@if (Request::segment(1) == 'teachers' || Request::segment(1) == 'students') active @endif">
					<a href="#otherpage" class="collapsed" data-toggle="collapse" aria-expanded="false">
						<svg class="svg-icon" width="25" height="25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
						</svg>
						<span class="ml-4">Data</span>
						<i class="las la-angle-right iq-arrow-right arrow-active"></i>
						<i class="las la-angle-down iq-arrow-right arrow-hover"></i>
					</a>
					<ul id="otherpage" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
						<li class="@if (Request::segment(1) == 'teachers') active @endif">
							<a href="{{route ('students.index') }}">
								<i class="las la-minus"></i><span class="ml-4">Guru</span>
							</a>
						</li>
						<li class="">
							<a href="{{route ('students.index') }}">
								<i class="las la-minus"></i><span class="ml-4">Tendik</span>
							</a>
						</li>
						<li class="@if (Request::segment(1) == 'students') active @endif">
							<a href="{{route ('students.index') }}">
								<i class="las la-minus"></i><span class="ml-4">Siswa</span>
							</a>
						</li>
						<li class="">
							<a href="{{route ('students.index') }}">
								<i class="las la-minus"></i><span class="ml-4">Jurusan</span>
							</a>
						</li>
					</ul>
				</li>	
			</ul>
		</nav>
		<div class="pt-5 pb-2"></div>
	</div>
</div>
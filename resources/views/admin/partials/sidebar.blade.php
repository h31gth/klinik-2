<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('admin/dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-stethoscope"></i>
        </div>
        <div class="sidebar-brand-text ml-2">Klinik</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
            <i class="fas fa-columns"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item {{ Request::is('admin/pendaftaran*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('admin/pendaftaran') }}">
            <i class="fas fa-users"></i>
            <span>Pendaftaran</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('admin/pasien*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('admin/pasien') }}">
            <i class="fas fa-hospital-user"></i>
            <span>Pasien</span></a>
    </li>
    <li class="nav-item {{ Request::is('admin/poliklinik*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('admin/poliklinik') }}">
            <i class="fas fa-clinic-medical"></i>
            <span>Poliklinik</span></a>
    </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Manajemen Dokter
        </div>

    <li class="nav-item {{ Request::is('admin/dokter*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('admin/dokter') }}">
            <i class="fas fa-user-md"></i>
            <span>Dokter</span></a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item {{ Request::is('admin/jadwal_dokter*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('admin/jadwal_dokter') }}">
            <i class="fas fa-business-time"></i>
            <span>Jadwal Dokter</span></a>
    </li>
    <!-- Divider -->

        @role('Admin')
        <hr class="sidebar-divider d-none d-md-block">
            <!-- Heading -->
            <div class="sidebar-heading">
                Manajemen User
            </div>
        @else
        @endrole
        @can('user-list')
        <li class="nav-item {{ Request::is('admin/user*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/user') }}">
                <i class="fas fa-user-cog"></i>
                <span>User</span></a>
        </li>
        @endcan
        @can('role-list')
        <!-- Nav Item - Tables -->
        <li class="nav-item {{ Request::is('admin/role*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/role') }}">
                <i class="fas fa-user-tag"></i>
                <span>Role</span></a>
        </li>
        @endcan

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
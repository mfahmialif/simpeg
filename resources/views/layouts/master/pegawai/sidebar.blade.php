<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SIMPEG</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (auth()->user()->foto == null)
                    <img src="{{ 'https://picsum.photos/' . 100 }}" class="img-circle elevation-2" alt="User Image">
                @else
                    @php
                        $foto = auth()->user()->foto;
                    @endphp
                    <img src="{{ asset("/foto_pegawai/$foto") }}" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->email }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar nav-collapse-hide-child nav-child-indent flex-column"
                data-widget="treeview" role="menu" data-accordion="false" id="list-sidebar">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                {{-- Dashboard --}}
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->routeIs('pegawai.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-line bkg-blue"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                {{-- Data Pegawai --}}
                <li class="nav-item">
                    <a href="{{ route('pegawai.profil') }}"
                        class="nav-link {{ request()->routeIs('pegawai.profil*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user bkg-green"></i>
                        <p>
                            Profil
                        </p>
                    </a>
                </li>
                {{-- Data Pegawai --}}
                <li class="nav-item">
                    <a href="{{ route('pegawai.absensi') }}"
                        class="nav-link {{ request()->routeIs('pegawai.absensi*') ? 'active' : '' }}"
                        style="border-bottom: 1px solid #4f5962">
                        <i class="nav-icon fas fa-fingerprint bkg-yellow"></i>
                        <p>
                            Absensi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="logout(event)">
                        <i class="nav-icon fas fa-sign-out-alt bkg-red"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>

<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('admin') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ ucfirst(Auth::user()->name) }}</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if (auth()->user()->role === 'admin')
                <li class="nav-item @yield('open-menu')">
                    <a href="#" class="nav-link @yield('active-admin')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Admin
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link @yield('active-dashboard')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('menu') }}" class="nav-link @yield('active-menu')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('meja') }}" class="nav-link @yield('active-meja')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Meja</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user') }}" class="nav-link @yield('active-user')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('report') }}" class="nav-link @yield('active-laporan')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan</p>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            
                <li class="nav-item @yield('open-kasir')">
                    <a href="#" class="nav-link @yield('active')">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>
                            Kasir
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/transaksi" class="nav-link @yield('active-tran')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transaksi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('riwayat') }}" class="nav-link @yield('active-riwayat')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Riwayat</p>
                            </a>
                        </li>
                    </ul>
                </li>
            
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>

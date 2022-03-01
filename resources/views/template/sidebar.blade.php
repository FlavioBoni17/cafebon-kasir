<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="foto/cafebon.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">CAFEBON</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="foto/users.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if (auth()->user()->role == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('crud-meja.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                CRUD Meja
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('crud-menu') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                CRUD Menu
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('crud-akun') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                CRUD Akun
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('laporan-transaksi') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Laporan Transaksi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Laporan Pendapatan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Riwayat Aktifitas Kasir
                            </p>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->role == 'kasir')
                    <li class="nav-item">
                        <a href="{{ route('input-transaksi') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Input Transaksi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Riwayat Transaksi
                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

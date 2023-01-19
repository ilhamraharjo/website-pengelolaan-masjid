<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="#" class="d-block ml-3">
                @if(auth()->user()->level == 1)
                Pengurus
                @else(auth()->user()->level == 2)
                Jamaah
                @endif
            </a>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="/dashboard" class="nav-link">
                    <i class="bi bi-house-door m-1"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-wallet m-1"></i>
                    <p>
                        Kas Masjid
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                @if(auth()->user()->level == 1)
                    <li class="nav-item">
                        <a href="/KasMasuk" class="nav-link">
                            <i class="bi bi-circle m-3"></i>
                            <p>Pemasukan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/KasKeluar" class="nav-link">
                            <i class="bi bi-circle m-3"></i>
                            <p>Pengeluaran</p>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a href="/rekap" class="nav-link">
                            <i class="bi bi-circle m-3"></i>
                            <p>Rekap Kas</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="/jadwalk" class="nav-link">
                    <i class="bi bi-calendar-day m-1"></i>
                    <p>Jadwal Khotbah Jumat</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/kegiatan" class="nav-link">
                    <i class="bi bi-calendar-check m-1"></i>
                    <p>Jadwal Kegiatan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="bi bi-basket m-1"></i>
                    <p>
                        Inventaris
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                @if(auth()->user()->level == 1)
                    <li class="nav-item">
                        <a href="/barang" class="nav-link">
                            <i class="bi bi-circle m-3"></i>
                            <p>Data Barang</p>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a href="/inventaris" class="nav-link">
                            <i class="bi bi-circle m-3"></i>
                            <p>Riwayat Inventaris</p>
                        </a>
                    </li>
            </li>
        </ul>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-left m-1"></i> Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion p-2" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/img/'); ?>logo-donasi.png" width="80" height="100">
        </div>
        <div class="sidebar-brand-text mx-3">Donasi Himsi</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">ADMIN</div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin'); ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/donatur'); ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Donatur</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/kategori'); ?>">
            <i class="fas fa-fw fa-bars"></i>
            <span>Kategori</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/donasi'); ?>">
            <i class="fas fa-fw fa-donate"></i>
            <span>Donasi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/pembayaran'); ?>">
            <i class="fas fa-fw fa-wallet"></i>
            <span>Metode Pembayaran</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/konfirmasiDonasi'); ?>">
            <i class="fas fa-fw fa-check"></i>
            <span>Konfirmasi Donasi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/riwayatDonasi'); ?>">
            <i class="fas fa-fw fa-clipboard-check"></i>
            <span>Riwayat Donasi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/pencairanDana'); ?>">
            <i class="fas fa-fw fa-hand-holding-usd"></i>
            <span>Pencairan Dana</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('admin/upload_buktiPencairan'); ?>">
            <i class="fas fa-camera"></i>
            <span>Unggah bukti penyaluran</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/laporanPencairan'); ?>">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Laporan Pencairan</span>
        </a>
    </li>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
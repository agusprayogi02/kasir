<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-<?= $color; ?> sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center" href="<?= base_url($jenis . '/') ?>">
            <img class="rounded-circle img-profile float-left" src="<?= base_url('assets/img/') ?>logo.jpeg" width="50" />
            <div class="sidebar-brand-text mx-3"><?= $name; ?></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url($jenis . '/index') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Pembalian
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url() . "user/histori"; ?>">
                <i class="fas fa-fw fa-history"></i>
                <span>History</span></a>
        </li>

        <!-- Heading -->
        <div class="sidebar-heading">
            Lainnya
        </div>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user/galeri'); ?>">
                <i class="fas fa-fw fa-image"></i>
                <span>Gallery</span>
            </a>
        </li>
        <li class="nav-item mt-n3">
            <a class="nav-link" href="<?= base_url('user/kontak'); ?>">
                <i class="fas fa-fw fa-info"></i>
                <span>Contact us</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
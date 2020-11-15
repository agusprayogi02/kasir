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
        <!-- Heading -->
        <div class="sidebar-heading">
            <i class="fas fa-fw fa-users-cog"></i>
            Barang
        </div>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url($jenis . '/') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>


        <li class="nav-item mt-n3">
            <a class="nav-link" href="<?= base_url('admin/add_item'); ?>">
                <i class="fas fa-fw fa-plus-circle"></i>
                <span>Add Item</span>
            </a>
        </li>

        <li class="nav-item mt-n3">
            <a class="nav-link" href="<?= base_url('admin/histori'); ?>">
                <i class="fas fa-fw fa-history"></i>
                <span>Histori</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            <i class="fas fa-fw fa-users-cog"></i>
            Users
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/registration') ?>">
                <i class="fas fa-fw fa-user-plus"></i>
                <span>Registration</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item mt-n3">
            <a class="nav-link" href="<?= base_url('admin/list_user') ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>List Users</span></a>
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
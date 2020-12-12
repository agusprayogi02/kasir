<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">My Profile</h1>
    <div class="card mb-3 shadow" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profiles/') . $user['image']; ?>" class="card-img border-right" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title font-weight-bold text-dark"><?= $user['name'] ?></h4>
                    <p class="card-text mt-n2"><?= $user['email'] ?></p>
                    <p class="card-text" style="position: absolute; bottom: 0px;"><small class="text-muted">Date created <?= date('d F Y', $user['date_created']);  ?></small></p>
                    <div class="text-right" style="position: absolute; right: 20px;bottom: 20px;">
                        <a href="<?= base_url($jenis . '/setting'); ?>" class="btn-sm btn-outline-success"><i class="fas fa-fw fa-edit mr-1"></i> Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
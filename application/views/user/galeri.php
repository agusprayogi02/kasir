<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="card shadow-lg mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
    </div>
    <div class="card-body">
      <div class="row m-2 justify-content-center">
        <?php foreach ($data as $key => $item) : ?>
          <div class="col-md-3 mb-4">
            <div class="card">
              <img src="<?= base_url() . "/assets/img/barang/" . $item->image_brg; ?>" class="card-img-top" style="height: 12rem; object-fit: cover;">
              <div class="card-body">
                <h4 class="card-text font-weight-bold text-center"><?= $item->name_brg; ?></h4>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="card shadow-lg mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-light">
            <tr>
              <th scope="col" width="3%">No</th>
              <th>Name</th>
              <th>Image</th>
              <th>Price</th>
              <th>Amount</th>
              <th>Total</th>
              <th>Back</th>
            </tr>
          </thead>
          <tfoot class="thead-light">
            <tr>
              <th scope="col">No.</th>
              <th>Name</th>
              <th>Image</th>
              <th>Price</th>
              <th>Amount</th>
              <th>Total</th>
              <th>Back</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            $i = 1;
            foreach ($histori as $isi) : ?>
              <tr>
                <th scope="row" class="text-center"><?= $i; ?>.</th>
                <td><?= $isi->name_brg; ?></td>
                <td><img src="<?= base_url('assets/img/barang/') . $isi->image_brg; ?>" class="img-thumbnail border-success" width="100" alt="<?= $isi->image_brg; ?>"></td>
                <td>Rp.<?= $isi->price_brg ?></td>
                <td><?= $isi->jumlah; ?></td>
                <td>Rp.<?= $isi->price_brg * $isi->jumlah; ?></td>
                <td><a href="<?= base_url($user['role_id'] === '1' ? 'admin/histori' : 'user/histori'); ?>" class="btn btn-primary"><i class="fa fa-fw fa-backward"></i><?php echo "  "; ?>Back</a></td>
              </tr>
            <?php
              $i++;
            endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
</div>
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
              <th>Kode Pembalian</th>
              <th>Total Bayar</th>
              <th>Uang</th>
              <th>Kembalian</th>
              <th>Tanggal Beli</th>
              <th>Detail Pembelian</th>
            </tr>
          </thead>
          <tfoot class="thead-light">
            <tr>
              <th scope="col">No.</th>
              <th>Kode Pembalian</th>
              <th>Total Bayar</th>
              <th>Uang</th>
              <th>Kembalian</th>
              <th>Tanggal Beli</th>
              <th>Detail Pembelian</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            $i = 1;
            foreach ($histori as $isi) : ?>
              <tr>
                <th scope="row" class="text-center"><?= $i; ?>.</th>
                <td><?= $isi->kode_history; ?></td>
                <td>Rp.<?= $isi->total_byr ?></td>
                <td>Rp.<?= $isi->bayar; ?></td>
                <td class="btn-info">RP.<?= $isi->bayar - $isi->total_byr; ?></td>
                <td><?= date("D M Y H:i", $isi->tanggal); ?></td>
                <td><a href="<?= base_url('user/detail/') . $isi->kode_history; ?>" class="btn btn-primary"><i class="fas fa-fw fa-info"></i>Detail</a></td>
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
<!-- End of Main Content -->
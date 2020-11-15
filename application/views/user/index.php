<!-- Begin Page Content -->
<div class="container-fluid">

	<?php if ($this->session->userdata('shoping')) :
		$session = $this->session->userdata('shoping'); ?>
		<div class="col-lg-10 col-xl-8 col-md-11">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">List Shoping</h6>
				</div>
				<div class="card-body">
					<table class="table table-bordered">
						<thead class="thead-dark">
							<tr>
								<th width="5%">No.</th>
								<th>Name</th>
								<th>Jumlah</th>
								<th>Total</th>
								<th>delete</th>
							</tr>
						</thead>
						<?php $i = 1;
						$total = 0;
						foreach ($data as $item) :
							if (isset($session[$item->kode_brg])) :
								$jumlah = 0;
								$jumlah = $session[$item->kode_brg] * $item->price_brg;
								$total += $jumlah;
						?>
								<tr>
									<th class="text-center"><?= $i; ?>.</th>
									<td><?= $item->name_brg; ?></td>
									<td>
										<div class="row justify-content-center">
											<a href="<?= base_url('user/index/') . $item->kode_brg . '/plus'; ?>" class="btn badge badge-success col-sm-2"><i class="fa fa-fw fa-plus"></i></a>
											<div class="col-sm-4 text-center"><?= $session[$item->kode_brg] ?></div>
											<a href="<?= base_url('user/index/') . $item->kode_brg . '/min'; ?>" class="btn badge badge-danger col-sm-2"><i class="fa fa-fw fa-minus"></i></a>
										</div>
									</td>
									<td>Rp.<?= $jumlah ?></td>
									<td class="text-center"><a href="<?= base_url('user/index/') . $item->kode_brg . '/del'; ?>" class="btn badge badge-danger"><i class="fa fa-trash-alt"></i></a></td>
								</tr>
						<?php
								$i++;
							endif;
						endforeach;
						$_SESSION['total'] = $total;
						?>
					</table>
					<div class="row justify-content-end">
						<a class="btn btn-outline-primary mr-3" href="<?= base_url('user/checkOut') ?>">Check Out</a>
						<a href="<?= base_url('user/index/unset'); ?>" class="btn btn-outline-danger mr-3">Cencel</a>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="card shadow-lg mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Daftar</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead class="thead-light">
						<tr>
							<th scope="col" width="3%">No</th>
							<th>Name</th>
							<th>Price</th>
							<th>Image</th>
							<th>Stock</th>
							<th>Add Product</th>
						</tr>
					</thead>
					<tfoot class="thead-light">
						<tr>
							<th scope="col">No.</th>
							<th>Name</th>
							<th>Price</th>
							<th>Image</th>
							<th>Stock</th>
							<th width='15%'>Add Product</th>
						</tr>
					</tfoot>
					<tbody>
						<?php
						$i = 1;
						foreach ($data as $isi) : ?>
							<tr>
								<th scope="row" class="text-center"><?= $i; ?>.</th>
								<td><?= $isi->name_brg; ?></td>
								<td>Rp.<?= $isi->price_brg; ?></td>
								<td><img src="<?= base_url('assets/img/barang/') . $isi->image_brg; ?>" class="img-thumbnail border-success" width="100" alt="<?= $isi->image_brg; ?>"></td>
								<td><?= $isi->stock_brg; ?></td>
								<td><a href="<?= base_url('user/index/') . $isi->kode_brg; ?>" class="btn btn-primary"><i class="fa fa-fw fa-plus-square"></i><?php echo "  "; ?>Add</a></td>
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
<!-- <script>
  function OnClickP(id) {
    let isi = $('#count' + id).html()
    $('#bplus' + id).click(function() {
      isi++
      $('#count' + id).html(isi)
    })
  }

  function OnClickM(id) {
    let isi = $('#count' + id).html()
    $('#bminus' + id).click(function() {
      isi -= 1
      $('#count' + id).html(isi)
    })
  }
</!-->
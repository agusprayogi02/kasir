<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Barang</h1> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <h6 class="m-0 font-weight-bold col-md text-primary">List Items</h6>
                <?= $this->session->flashdata('error'); ?>
                <a class="text-primary col-md text-right" href="<?= base_url('admin/add_item'); ?>"><i class="fas fa-fw fa-plus-square pr-3"></i>Add Items</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="text-center">Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($list_item as $item) : ?>
                            <tr>
                                <td class="text-center"><img src="<?= base_url('assets/img/barang/') . $item->image_brg; ?>" class="rounded border border-info" width="100"></td>
                                <td><?= $item->name_brg; ?></td>
                                <td><?= $item->price_brg; ?></td>
                                <td><?= $item->stock_brg; ?></td>
                                <td class="text-white text-center">
                                    <a class="btn badge badge-danger" href="#" data-toggle="modal" data-target="#deletemodal<?= $item->kode_brg ?>"><i class="fas fa-fw fa-trash"></i> Delete</a>|
                                    <a class="btn badge badge-warning" href="#" data-toggle="modal" data-target="#editmodal<?= $item->kode_brg ?>"><i class="fas fa-fw fa-edit"></i> Edit</a>|
                                    <a class="btn badge badge-success" href="#" data-toggle="modal" data-target="#addmodal<?= $item->kode_brg ?>"><i class="fas fa-fw fa-plus"></i> Stock</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php foreach ($list_item as $item) : ?>
    <!-- Delete Modal-->
    <div class="modal fade" id="deletemodal<?= $item->kode_brg ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you are ready to Delete Item <?= $item->name_brg ?>.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('admin/delete_barang/') ?><?= $item->kode_brg ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>


    <!-- edit modal -->
    <div class="modal fade" id="editmodal<?= $item->kode_brg ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Item <?= $item->name_brg; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open(base_url('admin/change_item'), 'class="user ml-2"'); ?>
                    <input type="hidden" name="id" value="<?= $item->kode_brg; ?>">
                    <div class="form-group row">
                        <label for="fullname" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-user" name="name" id="fullname" value="<?= $item->name_brg; ?>" placeholder="Full Name">
                        </div>
                        <?= form_error('name', '<small class="text-danger ml-4">', '</small>') ?>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control form-control-user" name="price" id="price" value="<?= $item->price_brg ?>" placeholder="Email Address">
                        </div>
                        <?= form_error('email', '<small class="text-danger ml-4">', '</small>') ?>
                    </div>
                    <div class="form-group row">
                        <label for="customFile" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="customFile" onchange="upload($('#customFile').val())">
                                <label class="custom-file-label" id="hai" for="customFile">Choose file</label>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Don't a Image Is Uploaded!
                                </div>
                            </div>
                            <div class="badge badge-danger">File: jpeg, jpg, png</div>
                        </div>
                        <?= form_error('image', '<small class="text-danger ml-4">', '</small>') ?>
                    </div>
                    <button id="sub" type="submit" name="btn_send" hidden></button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button onclick="clickbtn()" id="send" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addmodal<?= $item->kode_brg ?>" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Stock Item <?= $item->name_brg; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open(base_url('admin/add_stok'), 'class="user"'); ?>
                    <input type="hidden" name="id" value="<?= $item->kode_brg; ?>">
                    <div class="form-group">
                        <label for="stok" class="col-form-label">Plus And Minus Stock Items</label>
                        <div class="row text-white m-2">
                            <a class="col-sm-2 btn btn-danger" onclick="kurang($('#stok').val())"><i class="fas fa-minus"></i></a>
                            <div class="col-sm-8">
                                <input type="number" readonly class="form-control" name="item" id="stok" value="<?= $item->stock_brg; ?>" placeholder="Stock Items">
                            </div>
                            <a class="col-sm-2 btn btn-success" onclick="tambah($('#stok').val())"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <button id="click" type="submit" name="btn_send" hidden></button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button onclick="klik()" id="kirim" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script>
    function klik() {
        $('#click').click();
    }

    function clickbtn() {
        $('#sub').click();
    }

    function tambah(s) {
        var stok = parseInt(s);
        $('#stok').val(stok + 1);
    }

    function kurang(s) {
        var stok = parseInt(s);
        $('#stok').val(stok - 1);
    }

    function upload(path) {
        if (path != "") {
            var name = path.split('.');
            var l = name.length;
            name = name[l - 1].toLowerCase();
            if (name != 'jpg' && name != 'png' && name != 'jpeg') {
                $('#customFile').removeClass('is-valid');
                $('#customFile').addClass('is-invalid');
            } else {
                $('#customFile').removeClass('is-invalid');
                $('#customFile').addClass('is-valid');
            }
        }
    }
</script>
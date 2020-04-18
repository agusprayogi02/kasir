<!-- Begin Page Content -->
<div class="container-fluid row">
    <!-- Page Heading -->
    <div class="card ml-2 col-lg-9 col-xl-7 shadow-lg">
        <div class="card-body">
            <h2>New Item</h1>
                <hr class="mb-3 mt-n1">
                <?= $this->session->flashdata('error'); ?>
                <?= form_open_multipart('admin/add_item', 'class="user mt-4"'); ?>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Input Name Item...">
                    </div>
                    <?= form_error('name', '<small class="text-danger ml-4">', '</small>') ?>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-sm-3 col-form-label">Price</label>
                    <div class="col-sm-9 input-group">
                        <div class="input-group-append">
                            <div class="input-group-text">Rp.</div>
                        </div>
                        <input type="number" id="price" name="price" class="form-control" placeholder="Input Price Item...">
                    </div>
                    <?= form_error('price', '<small class="text-danger ml-4">', '</small>') ?>
                </div>
                <div class="form-group row">
                    <label for="Stok" class="col-sm-3 col-form-label">Stock</label>
                    <div class="col-sm-9 input-group">
                        <div class="input-group-append">
                            <a class="input-group-text btn btn-danger" onclick="kurang($('#Stok').val())"><i class="fas fa-minus"></i></a>
                        </div>
                        <input type="number" value="1" id="Stok" name="stok" class="form-control" placeholder="Input Stok Item...">
                        <div class="input-group-append">
                            <a class="input-group-text btn btn-success" onclick="tambah($('#Stok').val())"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <?= form_error('stok', '<small class="text-danger ml-4">', '</small>') ?>
                </div>
                <div class="form-group row">
                    <label for="customFile" class="col-sm-3 col-form-label">Image</label>
                    <div class="col-sm-9">
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
                        <div class="badge badge-danger">File: jpeg, jpg, png, Max Size: 2 MB</div>
                    </div>
                    <?= form_error('image', '<small class="text-danger ml-4">', '</small>') ?>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-outline-primary">Save</button>
                    </div>
                    <div class="col"></div>
                    <div class="col-3 text-right">
                        <a href="<?= base_url('admin/index'); ?>" class="btn btn-outline-danger">Cencel</a>
                    </div>
                </div>
                </form>
        </div>
    </div>

</div>

<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<script>
    function tambah(s) {
        var stok = parseInt(s);
        $('#Stok').val(stok + 1);
    }

    function kurang(s) {
        if (parseInt(s) > 1) {
            var stok = parseInt(s);
            $('#Stok').val(stok - 1);
        }
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
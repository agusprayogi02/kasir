<div class="container row">
    <div class="card m-2 col-xl-8">
        <div class="card-body p-4">

            <?= form_open_multipart('user/setting'); ?>
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                    <?= form_error('email', '<small class="text-danger ml-4">', '</small>') ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="customFile" class="col-sm-3 col-form-label">Image</label>
                <div class="col-sm-9">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="imageProfile" id="customFile" onchange="upload($('#customFile').val())">
                        <label class="custom-file-label" id="hai" for="customFile">Choose file</label>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Don't a Image Is Uploaded!
                        </div>
                    </div>
                    <div class="badge badge-danger">File: jpeg, jpg, png, Max Size: 1 MB</div>
                </div>
                <?= form_error('image', '<small class="text-danger ml-4">', '</small>') ?>
            </div>
            <div class="text-right">
                <button type="submit" name="btnUpdate" class="btn btn-outline-warning px-5">Update</button>
                <a href="<?= base_url($jenis . '/profile'); ?>" class="btn btn-outline-danger px-5 ml-3">Cencel</a>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

<script>
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
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <?= $this->session->flashdata('error'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Users</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>email</th>
                            <th class="text-center">active</th>
                            <th>date created</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>email</th>
                            <th class="text-center">active</th>
                            <th>date created</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        if (isset($list)) :
                            foreach ($list as $item) : ?>
                                <tr>
                                    <td><?= $item->name; ?></td>
                                    <td><?= $item->email ?></td>
                                    <td class="text-center">
                                        <?php if ($item->is_active == 1) {
                                            echo "<p class='badge badge-success'>Is Active</p>";
                                        } else {
                                            echo "<p class='badge badge-danger'>Not Active</p>";
                                        } ?>
                                    </td>
                                    <td><?= date('d M Y', $item->date_created) ?></td>
                                    <td class="text-white text-center">
                                        <a class="btn badge badge-danger" href="<?= $item->id; ?>" data-toggle="modal" data-target="#deletemodal<?= $item->id ?>"><i class="fas fa-fw fa-user-times"></i> Delete</a>|
                                        <a class="btn badge badge-warning" href="<?= $item->id; ?>" data-toggle="modal" data-target="#editModal<?= $item->id ?>"><i class="fas fa-fw fa-user-edit"></i> Edit</a>|
                                        <a class="btn badge badge-danger" href="<?= $item->id; ?>" data-toggle="modal" data-target="#blockmodal<?= $item->id ?>"><i class="fas fa-fw fa-user-slash"></i> Block</a>
                                        <a class="btn badge badge-success" href="<?= $item->id; ?>" data-toggle="modal" data-target="#activemodal<?= $item->id ?>"><i class="fas fa-fw fa-user-check"></i> Active</a>
                                    </td>
                                </tr>
                        <?php endforeach;
                        endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php
if (isset($list)) :
    foreach ($list as $item) : ?>
        <!-- block Modal-->
        <div class="modal fade" id="blockmodal<?= $item->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header alert-warning">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Block is Account?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Block" below if you are ready to Block Account <?= $item->name ?>.</div>
                    <div class="modal-footer alert-warning">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="<?= base_url('admin/block_user/') ?><?= $item->id ?>">Block</a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Delete Modal-->
        <div class="modal fade" id="deletemodal<?= $item->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Delete" below if you are ready to Delete Account <?= $item->name ?>.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="<?= base_url('admin/delete_user/') ?><?= $item->id ?>">Delete</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Modal-->
        <div class="modal fade" id="activemodal<?= $item->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Active the Account?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Active" below if you are ready to active Account <?= $item->name ?>.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="<?= base_url('admin/active_user/') ?><?= $item->id ?>">Active</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- edit modal -->
        <div class="modal fade" id="editModal<?= $item->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Account <?= $item->name; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= form_open(base_url('admin/change_user'), 'class="user"'); ?>
                        <input type="hidden" name="id" value="<?= $item->id; ?>">
                        <div class="form-group row">
                            <label for="fullname" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-user" name="name" id="fullname" value="<?= $item->name ?>" placeholder="Full Name">
                            </div>
                            <?= form_error('name', '<small class="text-danger ml-4">', '</small>') ?>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-user" name="email" id="exampleInputEmail" value="<?= $item->email ?>" placeholder="Email Address">
                            </div>
                            <?= form_error('email', '<small class="text-danger ml-4">', '</small>') ?>
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
<?php endforeach;
endif; ?>

<script>
    function clickbtn() {
        $('#sub').click();
    }
</script>
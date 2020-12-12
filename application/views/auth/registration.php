<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-xl-7 col-md-8">
            <div class="card o-hidden border-0 shadow-lg my-3">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create New Account User!</h1>
                                </div>
                                <?= form_open(base_url('auth/registration'), 'class="user"'); ?>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="fullname" id="fullname" value="<?= set_value('fullname') ?>" placeholder="Full Name">
                                    <?= form_error('fullname', '<small class="text-danger ml-4">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="email" id="exampleInputEmail" value="<?= set_value('email') ?>" placeholder="Email Address">
                                    <?= form_error('email', '<small class="text-danger ml-4">', '</small>') ?>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-sm-5 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password1" id="InputPassword" value="<?= set_value('password1') ?>" placeholder="Password">
                                    </div>
                                    <div class="col-sm-5 mb-3">
                                        <input type="password" class="form-control form-control-user" name="password2" id="RepaeatPassword" placeholder="Repeat Password">
                                    </div>
                                    <div class="col-sm-2 btn-group-lg">
                                        <a class="btn btn-invert btn-outline-dark" onclick="ShowPassword()"><i id="show" class="fa text-primary fa-eye"></i></a>
                                    </div>
                                    <?= form_error('password1', '<small class="ml-4 text-danger">', '</small>') ?>
                                    <?= form_error('password2', '<small class="ml-4 text-danger">', '</small>') ?>
                                </div>
                                <button name="create" type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!-- End of Main Content -->


<script>
    function ShowPassword() {
        let inp = $('#InputPassword').attr('type')
        if (inp == 'password') {
            $('#InputPassword').attr({
                'type': 'text'
            })
            $('#RepaeatPassword').attr({
                'type': 'text'
            })
            $('#show').addClass('fa-eye-slash')
        } else {
            $('#InputPassword').attr({
                'type': 'password'
            })
            $('#RepaeatPassword').attr({
                'type': 'password'
            })
            $('#show').removeClass('fa-eye-slash')
        }
    }
</script>
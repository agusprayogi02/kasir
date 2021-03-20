<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col">
      <div class="card shadow-lg mb-4">
        <div class="card-body p-4">
          <h2><?= $title; ?></h2>
          <hr class="mb-3 mt-n1">
          <?= $this->session->flashdata('error'); ?>
          <form action="" class="user mt-4">
            <div class="form-group row">
              <label for="name" class="col-sm-3 col-form-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" id="name" name="name" class="form-control" placeholder="Full name">
              </div>
              <?= form_error('name', '<small class="text-danger ml-4">', '</small>') ?>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9 input-group">
                <div class="input-group-append">
                  <div class="input-group-text">@</div>
                </div>
                <input type="email" id="email" name="email" class="form-control" placeholder="email">
              </div>
              <?= form_error('email', '<small class="text-danger ml-4">', '</small>') ?>
            </div>
            <div class="form-group row">
              <label for="subject" class="col-sm-3 col-form-label">Subject</label>
              <div class="col-sm-9 input-group">
                <input type="text" id="subject" name="subject" class="form-control" placeholder="subject">
              </div>
              <?= form_error('subject', '<small class="text-danger ml-4">', '</small>') ?>
            </div>
            <div class="form-group row">
              <label for="message" class="col-sm-3 col-form-label">Message</label>
              <div class="col-sm-9 input-group">
                <textarea class="form-control" id="message" placeholder="Message" rows="4"></textarea>
              </div>
              <?= form_error('message', '<small class="text-danger ml-4">', '</small>') ?>
            </div>
            <div class="text-right">
              <button class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card shadow-lg mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary text-center">About Me</h6>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-3 h5">
              Toko :
            </div>
            <div class="col h5">
              Pertanian Firda
            </div>
          </div>
          <div class="row">
            <div class="col-3 h5">
              Address :
            </div>
            <div class="col h5">
              Kepanjen, Jawa Timur Indonesia
            </div>
          </div>
          <div class="row">
            <div class="col-3 h5">
              Email :
            </div>
            <div class="col h5">
              firda@gmail.com
            </div>
          </div>
          <div class="row">
            <div class="col-3 h5">
              Phone :
            </div>
            <div class="col h5">
              0897534564534
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
</div>
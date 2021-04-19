<?= $this->extend('admin/layout/v_template'); ?>

<?= $this->section('css'); ?>
<?= $this->endSection(); ?>
<?= $this->section('content-header'); ?>
    <div class="col-sm-6">
        <h1 class="m-0">Pengguna</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= route_to('admin.dashboard'); ?>">Beranda</a></li>
        <li class="breadcrumb-item"><a href="<?= route_to('user.index'); ?>">Pengguna</a></li>
            <li class="breadcrumb-item active">Ubah</li>
        </ol>
    </div><!-- /.col -->
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Mengubah Pengguna</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?= route_to('user.update'); ?>" method="POST" enctype="multipart/form-data">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="id" value="<?= $user['id']; ?>">
                  <input type="hidden" name="avatarLama" value="<?= $user['avatar']; ?>">
                  <div class="card-body">
                  <div class="form-group row">
                        <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <img class="img-thumbnail mb-2" id="image_con" width="250px" src="<?= base_url('uploads/'.$user['avatar']); ?>" alt="">
                            <div class="input-group <?= ($validation->hasError('avatar'))? 'is-invalid':'' ?>">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('avatar'))? 'is-invalid':'' ?>" id="avatar" name="avatar">
                                <label class="custom-file-label" for="avatar">Pilih Gambar</label>
                              </div>
                            </div>
                              <span class="invalid-feedback" role="alert">
                                <strong><?= $validation->getError('avatar'); ?></strong>
                              </span>
                        </div>
                      </div>
                    <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <input autofocus value="<?= old('nama')?old('nama'):$user['nama']; ?>" type="text" class="form-control <?= ($validation->hasError('nama'))? 'is-invalid':'' ?>" id="nama" name="nama" placeholder="nama user">
                                <span class="invalid-feedback" role="alert">
                                    <strong><?= $validation->getError('nama'); ?></strong>
                                </span>
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <input autofocus value="<?= old('email')?old('email'):$user['email']; ?>" type="text" class="form-control <?= ($validation->hasError('email'))? 'is-invalid':'' ?>" id="email" name="email" placeholder="email user">
                                <span class="invalid-feedback" role="alert">
                                    <strong><?= $validation->getError('email'); ?></strong>
                                </span>
                            </div>
                    </div>
                    
                    <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <input type="text" class="form-control <?= ($validation->hasError('password'))? 'is-invalid':'' ?>" id="password" name="password" placeholder="password user">
                                <span class="invalid-feedback" role="alert">
                                    <strong><?= $validation->getError('password'); ?></strong>
                                </span>
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="password_confirm" class="col-sm-2 col-form-label">Konfirmasi password</label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <input type="text" class="form-control <?= ($validation->hasError('password_confirm'))? 'is-invalid':'' ?>" id="password_confirm" name="password_confirm" placeholder="password_confirm user">
                                <span class="invalid-feedback" role="alert">
                                    <strong><?= $validation->getError('password_confirm'); ?></strong>
                                </span>
                            </div>
                    </div>
                  </div>

                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <a href="<?= route_to('user.index'); ?>" class="btn btn-default">Kembali</a>
                  </div>
                  <!-- /.card-footer -->
                </form>
              </div>
              <!-- /.card -->
        </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script>
  $(function () {
    //menampilkan foto setiap ada perubahan pada modal tambah
    $('#avatar').on('change', function() {
        readURL(this);
    });
    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          $('.custom-file-label').html(input.files[0].name)
          reader.onload = function (e) {
              $('#image_con').attr('src', e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
      }
    }
  });
</script>
<?= $this->endSection(); ?>
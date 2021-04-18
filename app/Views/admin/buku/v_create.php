<?= $this->extend('admin/layout/v_template'); ?>

<?= $this->section('css'); ?>
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('admin_assets/plugins/select2/css/select2.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('admin_assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('admin_assets/plugins/summernote/summernote-bs4.css'); ?>">
<?= $this->endSection(); ?>
<?= $this->section('content-header'); ?>
    <div class="col-sm-6">
        <h1 class="m-0">Buku</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= route_to('admin.dashboard'); ?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= route_to('buku.index'); ?>">Buku</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </div><!-- /.col -->
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Tambah Buku</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?= route_to('buku.store'); ?>" method="POST" enctype="multipart/form-data">
                  <?= csrf_field(); ?>
                  <div class="card-body">
                    <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <input autofocus value="<?= old('judul'); ?>" type="text" class="form-control <?= ($validation->hasError('judul'))? 'is-invalid':'' ?>" id="judul" name="judul" placeholder="Judul buku">
                                <span class="invalid-feedback" role="alert">
                                    <strong><?= $validation->getError('judul'); ?></strong>
                                </span>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="sampul" class="col-sm-2 col-form-label">Gambar /  Sampul</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <img class="img-thumbnail mb-2" id="image_con" width="250px" src="<?= base_url('uploads/sampul/default.jpg'); ?>" alt="">
                            <div class="input-group <?= ($validation->hasError('sampul'))? 'is-invalid':'' ?>">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('sampul'))? 'is-invalid':'' ?>" id="sampul" name="sampul">
                                <label id="label-sampul" class="custom-file-label" for="sampul">Pilih Gambar</label>
                              </div>
                            </div>
                              <span class="invalid-feedback" role="alert">
                                <strong><?= $validation->getError('sampul'); ?></strong>
                              </span>
                        </div>
                      </div>
                    <div class="form-group row">
                        <label for="buku" class="col-sm-2 col-form-label">Buku</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <div class="input-group <?= ($validation->hasError('buku'))? 'is-invalid':'' ?>">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('buku'))? 'is-invalid':'' ?>" id="buku" name="buku">
                                <label class="custom-file-label" id="label-buku" for="buku">Pilih Buku</label>
                              </div>
                            </div>
                              <span class="invalid-feedback" role="alert">
                                <strong><?= $validation->getError('buku'); ?></strong>
                              </span>
                        </div>
                      </div>
                    <div class="form-group row">
                            <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <input value="<?= old('penulis'); ?>" type="text" class="form-control <?= ($validation->hasError('penulis'))? 'is-invalid':'' ?>" id="penulis" name="penulis" placeholder="penulis buku">
                                <span class="invalid-feedback" role="alert">
                                    <strong><?= $validation->getError('penulis'); ?></strong>
                                </span>
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <input value="<?= old('penerbit'); ?>" type="text" class="form-control <?= ($validation->hasError('penerbit'))? 'is-invalid':'' ?>" id="penerbit" name="penerbit" placeholder="penerbit buku">
                                <span class="invalid-feedback" role="alert">
                                    <strong><?= $validation->getError('penerbit'); ?></strong>
                                </span>
                            </div>
                    </div>
                      <div class="form-group row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                          <textarea id="deskripsi" class="form-control <?= ($validation->hasError('deskripsi'))? 'is-invalid':'' ?>" id="deskripsi" name="deskripsi"><?= old('deskripsi'); ?></textarea>
                          <span class="invalid-feedback" role="alert">
                              <strong><?= $validation->getError('deskripsi'); ?></strong>
                          </span>
                          
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-sm-12 col-lg-10 col-md-10">
                          <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="terbit" name="status" value="0" checked>
                            <label for="terbit" class="custom-control-label">Terbitkan</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="draf"  name="status" value="1">
                            <label for="draf" class="custom-control-label">Draf</label>
                        </div>     
                        </div>
                      </div>
                  </div>

                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <a href="<?= route_to('buku.index'); ?>" class="btn btn-default">Kembali</a>
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
    $('#sampul').on('change', function() {
        readURL(this);
    });
    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          $('#label-sampul').html(input.files[0].name)
          reader.onload = function (e) {
              $('#image_con').attr('src', e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
      }
    }
    $('#buku').on('change', function() {
      $('#label-buku').html(this.files[0].name)
    });
  });
</script>
<?= $this->endSection(); ?>
  

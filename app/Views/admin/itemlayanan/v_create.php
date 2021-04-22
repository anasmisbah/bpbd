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
        <h1 class="m-0">Layanan -layanan</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= route_to('admin.dashboard'); ?>">Beranda</a></li>
        <li class="breadcrumb-item"><a href="<?= route_to('layanan.detail'); ?>">Pelayanan</a></li>
            <li class="breadcrumb-item"><a href="<?= route_to('itemlayanan.index'); ?>">Layanan -layanan</a></li>
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
                  <h3 class="card-title">Tambah Layanan BPBD</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?= route_to('itemlayanan.store'); ?>" method="POST" enctype="multipart/form-data">
                  <?= csrf_field(); ?>
                  <div class="card-body">
                    <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <input autofocus value="<?= old('judul'); ?>" type="text" class="form-control <?= ($validation->hasError('judul'))? 'is-invalid':'' ?>" id="judul" name="judul" placeholder="Judul layanan">
                                <span class="invalid-feedback" role="alert">
                                    <strong><?= $validation->getError('judul'); ?></strong>
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
                        <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <img class="img-thumbnail mb-2" id="image_con" width="250px" src="<?= base_url('uploads/gambar/default-item.png'); ?>" alt="">
                            <div class="input-group <?= ($validation->hasError('gambar'))? 'is-invalid':'' ?>">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('gambar'))? 'is-invalid':'' ?>" id="gambar" name="gambar">
                                <label id="label-gambar" class="custom-file-label" for="gambar">Pilih Gambar</label>
                              </div>
                            </div>
                              <span class="invalid-feedback" role="alert">
                                <strong><?= $validation->getError('gambar'); ?></strong>
                              </span>
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
    $('#gambar').on('change', function() {
        readURL(this);
    });
    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          $('#label-gambar').html(input.files[0].name)
          reader.onload = function (e) {
              $('#image_con').attr('src', e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
      }
    }
  });
</script>
<?= $this->endSection(); ?>
  

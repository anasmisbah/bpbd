<?= $this->extend('admin/layout/v_template'); ?>

<?= $this->section('css'); ?>
<?= $this->endSection(); ?>
<?= $this->section('content-header'); ?>
    <div class="col-sm-6">
        <h1 class="m-0">Pelayanan</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= route_to('admin.dashboard'); ?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= route_to('layanan.detail'); ?>">Pelayanan</a></li>
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
                  <h3 class="card-title">Mengubah Pelayanan BPBD</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?= route_to('layanan.update'); ?>" method="POST" enctype="multipart/form-data">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="id" value="<?= $layanan['id']; ?>">
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                      <div class="col-sm-6 col-lg-6 col-md-6">
                          <input autofocus value="<?= old('judul')?old('judul'):$layanan['judul']; ?>" type="text" class="form-control <?= ($validation->hasError('judul'))? 'is-invalid':'' ?>" id="judul" name="judul" placeholder="Judul">
                          <span class="invalid-feedback" role="alert">
                              <strong><?= $validation->getError('judul'); ?></strong>
                          </span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="subjudul" class="col-sm-2 col-form-label">Sub judul</label>
                      <div class="col-sm-6 col-lg-6 col-md-6">
                          <input autofocus value="<?= old('subjudul')?old('subjudul'):$layanan['subjudul']; ?>" type="text" class="form-control <?= ($validation->hasError('subjudul'))? 'is-invalid':'' ?>" id="subjudul" name="subjudul" placeholder="Sub judul">
                          <span class="invalid-feedback" role="alert">
                              <strong><?= $validation->getError('subjudul'); ?></strong>
                          </span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                      <div class="col-sm-6 col-lg-6 col-md-6">
                          <img class="img-thumbnail mb-2" id="image_con" width="250px" src="<?= base_url('uploads/'.$layanan['gambar']); ?>" alt="">
                          <div class="input-group <?= ($validation->hasError('gambar'))? 'is-invalid':'' ?>">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input <?= ($validation->hasError('gambar'))? 'is-invalid':'' ?>" id="gambar" name="gambar">
                              <label class="custom-file-label" for="gambar">Pilih Gambar</label>
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
                    <a href="<?= route_to('layanan.detail'); ?>" class="btn btn-default">Kembali</a>
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
    $('#gambar').on('change', function() {
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
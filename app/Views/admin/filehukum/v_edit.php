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
        <h1 class="m-0">File Hukum</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= route_to('admin.dashboard'); ?>">Beranda</a></li>
        <li class="breadcrumb-item"><a href="<?= route_to('produkhukum.index'); ?>">Produk Hukum</a></li>
        <li class="breadcrumb-item"><a href="<?= route_to('filehukum.index',$filehukum['produk_hukum_id']); ?>">File Hukum</a></li>
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
                  <h3 class="card-title">Mengubah File Hukum</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?= route_to('filehukum.update'); ?>" method="POST" enctype="multipart/form-data">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="id" value="<?= $filehukum['id']; ?>">
                  <input type="hidden" name="slug" value="<?= $filehukum['slug']; ?>">
                  <input type="hidden" name="filehukumLama" value="<?= $filehukum['file']; ?>">
                  <div class="card-body">
                    <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <input autofocus value="<?= old('judul')?old('judul'):$filehukum['judul']; ?>" type="text" class="form-control <?= ($validation->hasError('judul'))? 'is-invalid':'' ?>" id="judul" name="judul" placeholder="Judul buku">
                                <span class="invalid-feedback" role="alert">
                                    <strong><?= $validation->getError('judul'); ?></strong>
                                </span>
                            </div>
                    </div>
                      <div class="form-group row">
                        <label for="file" class="col-sm-2 col-form-label">File Hukum</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <div class="input-group <?= ($validation->hasError('file'))? 'is-invalid':'' ?>">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('file'))? 'is-invalid':'' ?>" id="file" name="file">
                                <label class="custom-file-label" id="label-file" for="file">Pilih file</label>
                              </div>
                              <div class="input-group-append">
                                <a class="btn btn-outline-secondary" target="_BLANK" href="<?= route_to('filehukum.download',$filehukum['id']); ?>" id="inputGroupFileAddon04">Download</a>
                              </div>
                            </div>
                              <span class="invalid-feedback" role="alert">
                                <strong><?= $validation->getError('file'); ?></strong>
                              </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="tentang" class="col-sm-2 col-form-label">Tentang</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                          <textarea id="tentang" class="form-control <?= ($validation->hasError('tentang'))? 'is-invalid':'' ?>" id="tentang" name="tentang"><?= old('tentang')?old('tentang'):$filehukum['tentang']; ?></textarea>
                          <span class="invalid-feedback" role="alert">
                              <strong><?= $validation->getError('tentang'); ?></strong>
                          </span>
                          
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-sm-12 col-lg-10 col-md-10">
                          <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="terbit" name="status" value="0" <?= $filehukum['status'] == 0?'checked':''; ?>>
                            <label for="terbit" class="custom-control-label">Terbitkan</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="draf"  name="status" value="1" <?= $filehukum['status'] == 1?'checked':''; ?>>
                            <label for="draf" class="custom-control-label">Draf</label>
                        </div>                          
                          <span class="invalid-feedback" role="alert">
                              <strong><?= $validation->getError('deskripsi'); ?></strong>
                          </span>
                          
                        </div>
                      </div>
                  </div>

                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <a href="<?= route_to('filehukum.index',$filehukum['produk_hukum_id']); ?>" class="btn btn-default">Kembali</a>
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
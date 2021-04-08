<?= $this->extend('admin/layout/v_template'); ?>

<?= $this->section('css'); ?>
    <link rel="stylesheet" href="<?= base_url('admin_assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('admin_assets/plugins/summernote/summernote-bs4.css'); ?>">
<?= $this->endSection(); ?>
<?= $this->section('content-header'); ?>
    <div class="col-sm-6">
        <h1 class="m-0">Video</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#">Video</a></li>
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
                  <h3 class="card-title">Menambah Video</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?= route_to('video.update'); ?>" method="POST" enctype="multipart/form-data">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="id" value="<?= $video['id']; ?>">
                  <input type="hidden" name="slug" value="<?= $video['slug']; ?>">
                  <div class="card-body">
                    <div class="form-group row">
                        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <input autofocus value="<?= old('judul')?old('judul'):$video['judul']; ?>" type="text" class="form-control <?= ($validation->hasError('judul'))? 'is-invalid':'' ?>" id="judul" name="judul" placeholder="Judul video">
                            <span class="invalid-feedback" role="alert">
                                <strong><?= $validation->getError('judul'); ?></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="url" class="col-sm-2 col-form-label">Url Video</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <input autofocus value="<?= old('url')?old('url'):$video['url']; ?>" type="text" class="form-control <?= ($validation->hasError('url'))? 'is-invalid':'' ?>" id="url" name="url" placeholder="Url Video">
                            <span class="invalid-feedback" role="alert">
                                <strong><?= $validation->getError('url'); ?></strong>
                            </span>
                        </div>
                    </div>
                      <div class="form-group row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-12 col-lg-10 col-md-10">
                          <textarea id="deskripsi" class="form-control <?= ($validation->hasError('deskripsi'))? 'is-invalid':'' ?>" id="deskripsi" name="deskripsi"><?= old('deskripsi')?old('deskripsi'):$video['deskripsi']; ?></textarea>
                          <span class="invalid-feedback" role="alert">
                              <strong><?= $validation->getError('deskripsi'); ?></strong>
                          </span>
                          
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-sm-12 col-lg-10 col-md-10">
                          <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="terbit" name="status" value="0" <?= $video['status'] == 0?'checked':''; ?>>
                            <label for="terbit" class="custom-control-label">Terbitkan</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="draf"  name="status" value="1" <?= $video['status'] == 1?'checked':''; ?>>
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
                    <a href="<?= route_to('video.index'); ?>" class="btn btn-default">Kembali</a>
                  </div>
                  <!-- /.card-footer -->
                </form>
              </div>
              <!-- /.card -->
        </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<!-- Summernote -->
<script src="<?= base_url('admin_assets/plugins/summernote/summernote-bs4.min.js'); ?>"></script>
<script>
  $(function () {
    $('#deskripsi').summernote({
      height: 400,
    })

    //menampilkan foto setiap ada perubahan pada modal tambah
    $('#sampul').on('change', function() {
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
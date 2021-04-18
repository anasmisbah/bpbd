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
        <h1 class="m-0">Berita</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= route_to('admin.dashboard'); ?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= route_to('berita.index'); ?>">Berita</a></li>
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
                  <h3 class="card-title">Tambah Berita</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?= route_to('berita.store'); ?>" method="POST" enctype="multipart/form-data">
                  <?= csrf_field(); ?>
                  <div class="card-body">
                    <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <input autofocus value="<?= old('judul'); ?>" type="text" class="form-control <?= ($validation->hasError('judul'))? 'is-invalid':'' ?>" id="judul" name="judul" placeholder="Judul Berita">
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
                                <label class="custom-file-label" for="sampul">Pilih Gambar</label>
                              </div>
                            </div>
                              <span class="invalid-feedback" role="alert">
                                <strong><?= $validation->getError('sampul'); ?></strong>
                              </span>
                        </div>
                      </div>
                    <div class="form-group row">
                            <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <input value="<?= old('penulis'); ?>" type="text" class="form-control <?= ($validation->hasError('penulis'))? 'is-invalid':'' ?>" id="penulis" name="penulis" placeholder="penulis Berita">
                                <span class="invalid-feedback" role="alert">
                                    <strong><?= $validation->getError('penulis'); ?></strong>
                                </span>
                            </div>
                    </div>
                      <div class="form-group row">
                        <label for="select-category" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                          <select class="select2 <?= ($validation->hasError('kategori'))? 'is-invalid':'' ?>" id="select-category" multiple="multiple" name="kategori[]" data-placeholder="Pilih kategori berita" style="width: 100%;">
                            <?php foreach($kategori as $item): ?>
                                <option value="<?= $item['id']; ?>"><?= $item['nama']; ?></option>
                            <?php endforeach; ?>
                          </select>
                            <span class="text-sm text-danger" role="alert">
                                <strong><?= $validation->getError('kategori'); ?></strong>
                            </span>
                            
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-12 col-lg-10 col-md-10">
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
                    <a href="<?= route_to('berita.index'); ?>" class="btn btn-default">Kembali</a>
                  </div>
                  <!-- /.card-footer -->
                </form>
              </div>
              <!-- /.card -->
        </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<!-- Select2 -->
<script src="<?= base_url('admin_assets/plugins/select2/js/select2.full.min.js'); ?>"></script>
<!-- Summernote -->
<script src="<?= base_url('admin_assets/plugins/summernote/summernote-bs4.min.js'); ?>"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('#select-category').select2({
      theme: 'bootstrap4'
    })
    $('#deskripsi').summernote({
      height: 400,
      callbacks: {
        onImageUpload: function(image) {
          // upload image to server and create imgNode...
          // console.log('on image upload');
          // $summernote.summernote('insertNode', imgNode);
          // console.log(image[0]);
          uploadImage(image[0]);
        },
        onMediaDelete : function(target) {
            deleteImage(target[0].src);
        }
      }
    })
    function uploadImage(image) {
        var data = new FormData();
        data.append("image", image);
        $.ajax({
            url: "<?= route_to('image.upload'); ?>",
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "POST",
            success: function(url) {
                $('#deskripsi').summernote("insertImage", url.gambar);
                // console.log("success",url);
            },
            error: function(data) {
                // console.log("error ",data);
            }
        });
    }

    function deleteImage(src) {
        $.ajax({
            data: {src : src},
            type: "POST",
            url: "<?= route_to('image.delete'); ?>",
            cache: false,
            success: function(response) {
                // console.log(response);
            }
        });
    }
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
  

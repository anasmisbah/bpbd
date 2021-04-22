<?= $this->extend('admin/layout/v_template'); ?>

<?= $this->section('css'); ?>
<?= $this->endSection(); ?>
<?= $this->section('content-header'); ?>
    <div class="col-sm-6">
        <h1 class="m-0">Tentang kami</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= route_to('admin.dashboard'); ?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= route_to('tentangkami.detail'); ?>">Tentang kami</a></li>
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
                  <h3 class="card-title">Mengubah Tentang kami BPBD</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?= route_to('tentangkami.update'); ?>" method="POST" enctype="multipart/form-data">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="id" value="<?= $tentangkami['id']; ?>">
                  <div class="card-body">
                    <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <input autofocus value="<?= old('judul')?old('judul'):$tentangkami['judul']; ?>" type="text" class="form-control <?= ($validation->hasError('judul'))? 'is-invalid':'' ?>" id="judul" name="judul" placeholder="judul">
                                <span class="invalid-feedback" role="alert">
                                    <strong><?= $validation->getError('judul'); ?></strong>
                                </span>
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="subjudul" class="col-sm-2 col-form-label">Sub Judul</label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <input autofocus value="<?= old('subjudul')?old('subjudul'):$tentangkami['subjudul']; ?>" type="text" class="form-control <?= ($validation->hasError('subjudul'))? 'is-invalid':'' ?>" id="subjudul" name="subjudul" placeholder="subjudul">
                                <span class="invalid-feedback" role="alert">
                                    <strong><?= $validation->getError('subjudul'); ?></strong>
                                </span>
                            </div>
                    </div>
                      <div class="form-group row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                          <textarea id="deskripsi" class="form-control <?= ($validation->hasError('deskripsi'))? 'is-invalid':'' ?>" id="deskripsi" name="deskripsi" rows="4"><?= old('deskripsi')?old('deskripsi'):$tentangkami['deskripsi']; ?></textarea>
                          <span class="invalid-feedback" role="alert">
                              <strong><?= $validation->getError('deskripsi'); ?></strong>
                          </span>
                          
                        </div>
                      </div>
                  </div>

                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <a href="<?= route_to('tentangkami.detail'); ?>" class="btn btn-default">Kembali</a>
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
  });
</script>
<?= $this->endSection(); ?>
<?= $this->extend('admin/layout/v_template'); ?>

<?= $this->section('css'); ?>
<?= $this->endSection(); ?>
<?= $this->section('content-header'); ?>
    <div class="col-sm-6">
        <h1 class="m-0">Kontak</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#">Kontak</a></li>
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
                  <h3 class="card-title">Mengubah Kontak BPBD</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?= route_to('kontak.update'); ?>" method="POST" enctype="multipart/form-data">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="id" value="<?= $kontak['id']; ?>">
                  <div class="card-body">
                    <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <input autofocus value="<?= old('email')?old('email'):$kontak['email']; ?>" type="email" class="form-control <?= ($validation->hasError('email'))? 'is-invalid':'' ?>" id="email" name="email" placeholder="email">
                                <span class="invalid-feedback" role="alert">
                                    <strong><?= $validation->getError('email'); ?></strong>
                                </span>
                            </div>
                    </div>
                    <div class="form-group row">
                            <label for="no_telepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <input autofocus value="<?= old('no_telepon')?old('no_telepon'):$kontak['no_telepon']; ?>" type="text" class="form-control <?= ($validation->hasError('no_telepon'))? 'is-invalid':'' ?>" id="no_telepon" name="no_telepon" placeholder="no_telepon">
                                <span class="invalid-feedback" role="alert">
                                    <strong><?= $validation->getError('no_telepon'); ?></strong>
                                </span>
                            </div>
                    </div>
                      <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                          <textarea id="alamat" class="form-control <?= ($validation->hasError('alamat'))? 'is-invalid':'' ?>" id="alamat" name="alamat"><?= old('alamat')?old('alamat'):$kontak['alamat']; ?></textarea>
                          <span class="invalid-feedback" role="alert">
                              <strong><?= $validation->getError('alamat'); ?></strong>
                          </span>
                          
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <input autofocus value="<?= old('facebook')?old('facebook'):$kontak['facebook']; ?>" type="text" class="form-control <?= ($validation->hasError('facebook'))? 'is-invalid':'' ?>" id="facebook" name="facebook" placeholder="facebook">
                            <span class="invalid-feedback" role="alert">
                                <strong><?= $validation->getError('facebook'); ?></strong>
                            </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <input autofocus value="<?= old('twitter')?old('twitter'):$kontak['twitter']; ?>" type="text" class="form-control <?= ($validation->hasError('twitter'))? 'is-invalid':'' ?>" id="twitter" name="twitter" placeholder="twitter">
                            <span class="invalid-feedback" role="alert">
                                <strong><?= $validation->getError('twitter'); ?></strong>
                            </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <input autofocus value="<?= old('instagram')?old('instagram'):$kontak['instagram']; ?>" type="text" class="form-control <?= ($validation->hasError('instagram'))? 'is-invalid':'' ?>" id="instagram" name="instagram" placeholder="instagram">
                            <span class="invalid-feedback" role="alert">
                                <strong><?= $validation->getError('instagram'); ?></strong>
                            </span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="youtube" class="col-sm-2 col-form-label">Youtube</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <input autofocus value="<?= old('youtube')?old('youtube'):$kontak['youtube']; ?>" type="text" class="form-control <?= ($validation->hasError('youtube'))? 'is-invalid':'' ?>" id="youtube" name="youtube" placeholder="youtube">
                            <span class="invalid-feedback" role="alert">
                                <strong><?= $validation->getError('youtube'); ?></strong>
                            </span>
                        </div>
                      </div>
                  </div>

                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <a href="<?= route_to('kontak.detail',$kontak['id']); ?>" class="btn btn-default">Kembali</a>
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
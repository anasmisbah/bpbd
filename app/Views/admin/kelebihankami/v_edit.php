<?= $this->extend('admin/layout/v_template'); ?>

<?= $this->section('css'); ?>
<?= $this->endSection(); ?>
<?= $this->section('content-header'); ?>
<div class="col-sm-6">
        <h1 class="m-0">Kelebihan kami</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= route_to('admin.dashboard'); ?>">Beranda</a></li>
        <li class="breadcrumb-item"><a href="<?= route_to('tentangkami.detail'); ?>">Tentang kami</a></li>
            <li class="breadcrumb-item"><a href="<?= route_to('kelebihankami.index'); ?>">Kelebihan kami</a></li>
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
                  <h3 class="card-title">Mengubah Kelebihan BPBD</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?= route_to('kelebihankami.update'); ?>" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $kelebihankami['id']; ?>">
                <input type="hidden" name="_method" value="PUT">
                  <div class="card-body">
                    <div class="form-group row">
                        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <input autofocus value="<?= old('judul')?old('judul'):$kelebihankami['judul']; ?>" type="text" class="form-control <?= ($validation->hasError('judul'))? 'is-invalid':'' ?>" id="judul" name="judul" placeholder="judul kelebihankami">
                            <span class="invalid-feedback" role="alert">
                                <strong><?= $validation->getError('judul'); ?></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="icon" class="col-sm-2 col-form-label">Ikon</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-<?= $kelebihankami['icon']; ?>"></i></div>
                              </div>
                              <input autofocus value="<?= old('icon')?old('icon'):$kelebihankami['icon']; ?>" type="text" class="form-control <?= ($validation->hasError('icon'))? 'is-invalid':'' ?>" id="icon" name="icon" placeholder="icon kelebihankami">
                            </div>
                            <small id="iconhelp" class="form-text text-muted">Pilihan icon dapat dilihat <a href="https://fontawesome.com/cheatsheet/free/regular" target="_blank" rel="noopener noreferrer"><strong>Di sini</strong></a></small>
                            <span class="invalid-feedback" role="alert">
                                <strong><?= $validation->getError('icon'); ?></strong>
                            </span>
                        </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <a href="<?= route_to('kelebihankami.index'); ?>" class="btn btn-default">Kembali</a>
                  </div>
                  <!-- /.card-footer -->
                </form>
              </div>
              <!-- /.card -->
        </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<?= $this->endSection(); ?>
  

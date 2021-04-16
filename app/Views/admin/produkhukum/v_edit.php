<?= $this->extend('admin/layout/v_template'); ?>

<?= $this->section('css'); ?>
<?= $this->endSection(); ?>
<?= $this->section('content-header'); ?>
    <div class="col-sm-6">
        <h1 class="m-0">Produk Hukum</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#">Produk Hukum</a></li>
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
                  <h3 class="card-title">Mengubah Produk Hukum</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?= route_to('produkhukum.update'); ?>" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $produkhukum['id']; ?>">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="slug" value="<?= $produkhukum['slug']; ?>">
                  <div class="card-body">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-6 col-lg-6 col-md-6">
                            <input autofocus value="<?= old('nama')?old('nama'):$produkhukum['nama']; ?>" type="text" class="form-control <?= ($validation->hasError('nama'))? 'is-invalid':'' ?>" id="nama" name="nama" placeholder="Nama produk hukum">
                            <span class="invalid-feedback" role="alert">
                                <strong><?= $validation->getError('nama'); ?></strong>
                            </span>
                        </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <a href="<?= route_to('produkhukum.index'); ?>" class="btn btn-default">Kembali</a>
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
  

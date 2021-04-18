<?= $this->extend('admin/layout/v_template'); ?>

<?= $this->section('css'); ?>
<?= $this->endSection(); ?>
<?= $this->section('content-header'); ?>
    <div class="col-sm-6">
        <h1 class="m-0">Produk Hukum</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= route_to('admin.dashboard'); ?>">Beranda</a></li>
        <li class="breadcrumb-item"><a href="<?= route_to('produkhukum.index'); ?>">Produk Hukum</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div><!-- /.col -->
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail Produk Hukum</h3>
        <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
            <li class="nav-item">
                <a class="nav-link btn-warning active mr-1" href="<?= route_to('produkhukum.edit',$produkhukum['id']); ?>"><i class="fas fa-edit"></i></a>
            </li>
            <li class="nav-item">
            <a class="nav-link btn-danger active" href="<?= route_to('produkhukum.index'); ?>"><i class=" fas fa-times"></i></a>
              </li>
            </ul>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table class="table table-striped">
            <tbody>
              <tr>
                <td style="width:10%">Nama</td>
                <td><?= $produkhukum['nama']; ?></td>
              </tr>
              <tr>
                <td style="width:10%">Slug</td>
                <td><?= $produkhukum['slug']; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="card-footer text-right">
          <span style="font-size: 14px" id="keterangan-tanggal">
          </span>
        </div>
    </div>
    <!-- /.card-body -->
</div>
    <!-- /.card -->
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script>
$(function () {
  let createdAtDate = '<?= $produkhukum['created_at']; ?>'
  let updatedAtDate = '<?= $produkhukum['updated_at']; ?>'
  $('#keterangan-tanggal').html(`<strong>Dibuat pada: </strong> ${moment(createdAtDate).format('dddd, D MMMM YYYY H:mm')} WITA
/ <strong>Diubah pada: </strong>${moment(updatedAtDate).format('dddd, D MMMM YYYY H:mm')} WITA`)
})
</script>
<?= $this->endSection(); ?>
  

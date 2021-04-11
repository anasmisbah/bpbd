<?= $this->extend('admin/layout/v_template'); ?>

<?= $this->section('css'); ?>
<link href="<?= base_url('admin_assets/dist/css/magnific-popup.css'); ?>" rel="stylesheet" type="text/css" />
<?= $this->endSection(); ?>
<?= $this->section('content-header'); ?>
    <div class="col-sm-6">
        <h1 class="m-0">Banner</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#">Banner</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div><!-- /.col -->
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail Banner</h3>
        <div class="card-tools">
          <ul class="nav nav-pills ml-auto">
            <li class="nav-item">
                <a class="nav-link btn-primary active mr-1" href="<?= route_to('banner.edit',$banner['id']); ?>"><i class="fas fa-eye"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn-warning active mr-1" href="<?= route_to('banner.edit',$banner['id']); ?>"><i class="fas fa-edit"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn-danger active" href="<?= route_to('banner.index'); ?>"><i class=" fas fa-times"></i></a>
            </li>
          </ul>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table class="table table-striped">
            <tbody>
              <tr>
                <td style="width:15%">Gambar Banner</td>
                <td><a href="<?= base_url('uploads/'.$banner['gambar']); ?>" class="foto"><img class="img-thumbnail" width="100px" src="<?= base_url('uploads/'.$banner['gambar']); ?>" alt=""></a></td>
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
<script src="<?= base_url('admin_assets/dist/js/jquery.magnific-popup.min.js'); ?>"></script>
<script>
$(function () {
  let createdAtDate = '<?= $banner['created_at']; ?>'
  let updatedAtDate = '<?= $banner['updated_at']; ?>'
  $('#keterangan-tanggal').html(`<strong>Dibuat pada: </strong> ${moment(createdAtDate).format('dddd, d MMMM YYYY H:mm')} WITA
/ <strong>Diubah pada: </strong>${moment(updatedAtDate).format('dddd, d MMMM YYYY H:mm')} WITA`)
  $('.foto').magnificPopup({
      type:'image'
  })
})
</script>
<?= $this->endSection(); ?>
  

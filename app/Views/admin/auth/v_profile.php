<?= $this->extend('admin/layout/v_template'); ?>

<?= $this->section('css'); ?>
<link href="<?= base_url('admin_assets/dist/css/magnific-popup.css'); ?>" rel="stylesheet" type="text/css" />
<?= $this->endSection(); ?>
<?= $this->section('content-header'); ?>
    <div class="col-sm-6">
        <h1 class="m-0">Profile</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= route_to('admin.dashboard'); ?>">Beranda</a></li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </div><!-- /.col -->
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Profile Pengguna</h3>
        <div class="card-tools">
          <ul class="nav nav-pills ml-auto">
            <li class="nav-item">
                <a class="nav-link btn-warning active mr-1" href="<?= route_to('pengguna.profile.edit'); ?>"><i class="fas fa-edit"></i></a>
            </li>
          </ul>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table class="table table-striped">
            <tbody>
              <tr>
                <td style="width:10%">Avatar</td>
                <td><a href="<?= base_url('uploads/'.$user['avatar']); ?>" class="foto"><img src="<?= base_url('uploads/'.$user['avatar']); ?>" alt="" class="img-thumbnail" width="100px"></a></td>
              </tr>
              <tr>
                <td style="width:10%">Nama</td>
                <td><?= $user['nama']; ?></td>
              </tr>
              <tr>
                <td style="width:10%">Email</td>
                <td><?= $user['email']; ?></td>
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
  let createdAtDate = '<?= $user['created_at']; ?>'
  let updatedAtDate = '<?= $user['updated_at']; ?>'
  $('#keterangan-tanggal').html(`<strong>Dibuat pada: </strong> ${moment(createdAtDate).format('dddd, D MMMM YYYY H:mm')} WITA
/ <strong>Diubah pada: </strong>${moment(updatedAtDate).format('dddd, D MMMM YYYY H:mm')} WITA`)
  $('.foto').magnificPopup({
      type:'image'
  })
})
</script>
<?= $this->endSection(); ?>
  

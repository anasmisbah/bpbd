<?= $this->extend('admin/layout/v_template'); ?>

<?= $this->section('css'); ?>
<link rel="stylesheet" href="<?= base_url('admin_assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">
<?= $this->endSection(); ?>
<?= $this->section('content-header'); ?>
    <div class="col-sm-6">
        <h1 class="m-0">Tentang kami</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= route_to('admin.dashboard'); ?>">Beranda</a></li>
            <li class="breadcrumb-item active">Tentang kami</li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div><!-- /.col -->
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tentang kami BPBD KALTIM</h3>
        <div class="card-tools">
          <ul class="nav nav-pills ml-auto">
            <li class="nav-item">
                <a class="nav-link btn-info active mr-1"  href="<?= route_to('nilaikami.index'); ?>" data-toggle="tooltip" data-placement="top" title="Nilai Kami"><i class="fas fa-list"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn-primary active mr-1" href="<?= route_to('kelebihankami.index'); ?>" data-toggle="tooltip" data-placement="top" title="Kelebihan Kami"><i class="fas fa-list"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn-warning active mr-1" href="<?= route_to('tentangkami.edit'); ?>"><i class="fas fa-edit"></i></a>
            </li>
          </ul>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table class="table table-striped">
            <tbody>
            <tr>
                <td style="width:10%">Judul</td>
                <td><?= $tentangkami['judul']; ?></td>
              </tr>
              <tr>
                <td style="width:10%">Sub Judul</td>
                <td><?= $tentangkami['subjudul']; ?></td>
              </tr>
              <tr>
                <td style="width:10%">Deskripsi</td>
                <td><?= $tentangkami['deskripsi']; ?></td>
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
<script src="<?= base_url('admin_assets/plugins/sweetalert2/sweetalert2.min.js'); ?>"></script>
<script src="<?= base_url('admin_assets/plugins/popper/popper.min.js'); ?>"></script>
<script>
$(function () {
  let createdAtDate = '<?= $tentangkami['created_at']; ?>'
  let updatedAtDate = '<?= $tentangkami['updated_at']; ?>'
  $('#keterangan-tanggal').html(`<strong>Dibuat pada: </strong> ${moment(createdAtDate).format('dddd, D MMMM YYYY H:mm')} WITA
/ <strong>Diubah pada: </strong>${moment(updatedAtDate).format('dddd, D MMMM YYYY H:mm')} WITA`)

  $('[data-toggle="tooltip"]').tooltip()

  const status = '<?= session()->getFlashdata('pesan'); ?>'

  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
  });
  if (status) {
      console.log(status);
      Toast.fire({
          icon: 'success',
          title: status
      })
  }
})
</script>
<?= $this->endSection(); ?>
  

<?= $this->extend('admin/layout/v_template'); ?>

<?= $this->section('css'); ?>
<link href="<?= base_url('admin_assets/dist/css/magnific-popup.css'); ?>" rel="stylesheet" type="text/css" />
<?= $this->endSection(); ?>
<?= $this->section('content-header'); ?>
    <div class="col-sm-6">
        <h1 class="m-0">File Hukum</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= route_to('admin.dashboard'); ?>">Beranda</a></li>
        <li class="breadcrumb-item"><a href="<?= route_to('produkhukum.index'); ?>">Produk Hukum</a></li>
        <li class="breadcrumb-item"><a href="<?= route_to('filehukum.index',$filehukum['produk_hukum_id']); ?>">File Hukum</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div><!-- /.col -->
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail File</h3>
        <div class="card-tools">
          <ul class="nav nav-pills ml-auto">
            <?php if($filehukum['status'] == 0): ?>
              <li class="nav-item">
                <a class="nav-link btn-secondary active mr-1" href="<?= route_to('filehukum.draft',$filehukum['id']); ?>">Draft&nbsp;&nbsp;<i class="fas fa-file-download"></i></a>
              </li>
            <?php elseif($filehukum['status'] == 1): ?>
              <li class="nav-item">
                <a class="nav-link btn-success active mr-1" href="<?= route_to('filehukum.publish',$filehukum['id']); ?>">Terbit&nbsp;&nbsp;<i class="fas fa-paper-plane"></i></a>
              </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link btn-warning active mr-1" href="<?= route_to('filehukum.edit',$filehukum['id']); ?>"><i class="fas fa-edit"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn-danger active" href="<?= route_to('filehukum.index',$filehukum['produk_hukum_id']); ?>"><i class=" fas fa-times"></i></a>
            </li>
          </ul>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table class="table table-striped">
            <tbody>
              <tr>
                <td style="width:10%">Produk Hukum</td>
                <td><a href="<?= route_to('produkhukum.detail',$filehukum['produkhukum']['id']); ?>"><?= $filehukum['produkhukum']['nama']; ?></a></td>
              </tr>
              <tr>
                <td style="width:10%">Judul</td>
                <td><?= $filehukum['judul']; ?></td>
              </tr>
              <tr>
                <td style="width:15%">Status</td>
                <td>
                  <?php if($filehukum['status'] == 0): ?>
                    <span class="badge badge-pill badge-success">Terbit</span>
                  <?php elseif($filehukum['status'] == 1): ?>
                    <span class="badge badge-pill badge-secondary">Draf</span>
                  <?php endif; ?>
                </td>
              </tr>
              <?php if($filehukum['status'] == 0): ?>  
                <tr>
                  <td style="width:10%">Tanggal Terbit</td>
                  <td id="tgl-publish"></td>
                </tr>
              <?php endif; ?>
              <tr>
                <td style="width:10%">File Hukum</td>
                <td><a target="_BLANK" href="<?= route_to('filehukum.download',$filehukum['id']); ?>" class="btn btn-info">Download</a></td>
              </tr>
              <tr>
                <td style="width:10%">Didownload</td>
                <td><?= $filehukum['didownload']; ?> kali</td>
              </tr>
              <tr>
                <td style="width:10%">Tentang</td>
                <td><?= $filehukum['tentang']; ?></td>
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
  let publishDate = '<?= $filehukum['published_at']; ?>'
  let createdAtDate = '<?= $filehukum['created_at']; ?>'
  let updatedAtDate = '<?= $filehukum['updated_at']; ?>'
  $('#keterangan-tanggal').html(`<strong>Dibuat pada: </strong> ${moment(createdAtDate).format('dddd, D MMMM YYYY H:mm')} WITA
/ <strong>Diubah pada: </strong>${moment(updatedAtDate).format('dddd, D MMMM YYYY H:mm')} WITA`)
  if (publishDate) {
    $('#tgl-publish').html(moment(publishDate).format('dddd, D MMMM YYYY H:mm')+' WITA')
  }
  $('.foto').magnificPopup({
      type:'image'
  })
})
</script>
<?= $this->endSection(); ?>
  

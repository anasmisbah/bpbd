<?= $this->extend('admin/layout/v_template'); ?>

<?= $this->section('css'); ?>
<link href="<?= base_url('admin_assets/dist/css/magnific-popup.css'); ?>" rel="stylesheet" type="text/css" />
<?= $this->endSection(); ?>
<?= $this->section('content-header'); ?>
    <div class="col-sm-6">
        <h1 class="m-0">Buku</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= route_to('admin.dashboard'); ?>">Beranda</a></li>
        <li class="breadcrumb-item"><a href="<?= route_to('buku.index'); ?>">Buku</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div><!-- /.col -->
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail Buku</h3>
        <div class="card-tools">
          <ul class="nav nav-pills ml-auto">
            <?php if($buku['status'] == 0): ?>
              <li class="nav-item">
                <a class="nav-link btn-secondary active mr-1" href="<?= route_to('buku.draft',$buku['id']); ?>">Draft&nbsp;&nbsp;<i class="fas fa-file-download"></i></a>
              </li>
            <?php elseif($buku['status'] == 1): ?>
              <li class="nav-item">
                <a class="nav-link btn-success active mr-1" href="<?= route_to('buku.publish',$buku['id']); ?>">Terbit&nbsp;&nbsp;<i class="fas fa-paper-plane"></i></a>
              </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link btn-primary active mr-1" href="<?= route_to('buku.edit',$buku['id']); ?>"><i class="fas fa-eye"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn-warning active mr-1" href="<?= route_to('buku.edit',$buku['id']); ?>"><i class="fas fa-edit"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn-danger active" href="<?= route_to('buku.index'); ?>"><i class=" fas fa-times"></i></a>
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
                <td><?= $buku['judul']; ?></td>
              </tr>
              <tr>
                <td style="width:10%">Penulis</td>
                <td><?= $buku['penulis']; ?></td>
              </tr>
              <tr>
                <td style="width:10%">Penerbit</td>
                <td><?= $buku['penerbit']; ?></td>
              </tr>
              <tr>
                <td style="width:15%">Status</td>
                <td>
                  <?php if($buku['status'] == 0): ?>
                    <span class="badge badge-pill badge-success">Terbit</span>
                  <?php elseif($buku['status'] == 1): ?>
                    <span class="badge badge-pill badge-secondary">Draf</span>
                  <?php endif; ?>
                </td>
              </tr>
              <?php if($buku['status'] == 0): ?>  
                <tr>
                  <td style="width:10%">Tanggal Terbit</td>
                  <td id="tgl-publish"></td>
                </tr>
              <?php endif; ?>
              <tr>
                <td style="width:10%">Sampul</td>
                <td><a href="<?= base_url('uploads/'.$buku['sampul']); ?>" class="foto"><img src="<?= base_url('uploads/'.$buku['sampul']); ?>" alt="" class="img-thumbnail" width="100px"></a></td>
              </tr>
              <tr>
                <td style="width:10%">Buku</td>
                <td><a target="_BLANK" href="<?= route_to('buku.download',$buku['id']); ?>" class="btn btn-info">Download</a></td>
              </tr>
              <tr>
                <td style="width:10%">Dilihat</td>
                <td><?= $buku['dilihat']; ?> kali</td>
              </tr>
              <tr>
                <td style="width:10%">Deskripsi</td>
                <td><?= $buku['deskripsi']; ?></td>
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
  let publishDate = '<?= $buku['published_at']; ?>'
  let createdAtDate = '<?= $buku['created_at']; ?>'
  let updatedAtDate = '<?= $buku['updated_at']; ?>'
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
  

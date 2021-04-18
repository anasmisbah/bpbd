<?= $this->extend('admin/layout/v_template'); ?>

<?= $this->section('css'); ?>
<link href="<?= base_url('admin_assets/dist/css/magnific-popup.css'); ?>" rel="stylesheet" type="text/css" />
<?= $this->endSection(); ?>
<?= $this->section('content-header'); ?>
    <div class="col-sm-6">
        <h1 class="m-0">Berita</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#">Berita</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div><!-- /.col -->
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail Berita</h3>
        <div class="card-tools">
          <ul class="nav nav-pills ml-auto">
            <?php if($berita['status'] == 0): ?>
              <li class="nav-item">
                <a class="nav-link btn-secondary active mr-1" href="<?= route_to('berita.draft',$berita['id']); ?>">Draft&nbsp;&nbsp;<i class="fas fa-file-download"></i></a>
              </li>
            <?php elseif($berita['status'] == 1): ?>
              <li class="nav-item">
                <a class="nav-link btn-success active mr-1" href="<?= route_to('berita.publish',$berita['id']); ?>">Terbit&nbsp;&nbsp;<i class="fas fa-paper-plane"></i></a>
              </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link btn-primary active mr-1" href="<?= route_to('berita.edit',$berita['id']); ?>"><i class="fas fa-eye"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn-warning active mr-1" href="<?= route_to('berita.edit',$berita['id']); ?>"><i class="fas fa-edit"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn-danger active" href="<?= route_to('berita.index'); ?>"><i class=" fas fa-times"></i></a>
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
                <td><?= $berita['judul']; ?></td>
              </tr>
              <tr>
                <td style="width:10%">Penulis</td>
                <td><?= $berita['penulis']; ?></td>
              </tr>
              <tr>
                <td style="width:10%">Kategori</td>
                <td>
                  <?php foreach($berita['kategori'] as $kategori): ?>
                    <span class="badge badge-pill badge-info"><?= $kategori['nama']; ?></span>
                  <?php endforeach; ?>
                </td>
              </tr>
              <tr>
                <td style="width:10%">Status</td>
                <td>
                  <?php if($berita['status'] == 0): ?>
                    <span class="badge badge-pill badge-success">Terbit</span>
                  <?php elseif($berita['status'] == 1): ?>
                    <span class="badge badge-pill badge-secondary">Draf</span>
                  <?php endif; ?>
                </td>
              </tr>
              <?php if($berita['status'] == 0): ?>  
                <tr>
                  <td style="width:10%">Tanggal Terbit</td>
                  <td id="tgl-publish"></td>
                </tr>
              <?php endif; ?>
              <tr>
                <td style="width:10%">Sampul</td>
                <td><a href="<?= base_url('uploads/'.$berita['sampul']); ?>" class="foto"><img src="<?= base_url('uploads/'.$berita['sampul']); ?>" alt="" class="img-thumbnail" width="100px"></a></td>
              </tr>
              <tr>
                <td style="width:10%">Deskripsi</td>
                <td><?= $berita['deskripsi']; ?></td>
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
  let publishDate = '<?= $berita['published_at']; ?>'
  let createdAtDate = '<?= $berita['created_at']; ?>'
  let updatedAtDate = '<?= $berita['updated_at']; ?>'
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
  

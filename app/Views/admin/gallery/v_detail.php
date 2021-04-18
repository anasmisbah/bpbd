<?= $this->extend('admin/layout/v_template'); ?>

<?= $this->section('css'); ?>
<link href="<?= base_url('admin_assets/dist/css/magnific-popup.css'); ?>" rel="stylesheet" type="text/css" />
<?= $this->endSection(); ?>
<?= $this->section('content-header'); ?>
    <div class="col-sm-6">
        <h1 class="m-0">Gallery</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#">Gallery</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div><!-- /.col -->
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail Gallery</h3>
        <div class="card-tools">
          <ul class="nav nav-pills ml-auto">
            <?php if($gallery['status'] == 0): ?>
              <li class="nav-item">
                <a class="nav-link btn-secondary active mr-1" href="<?= route_to('gallery.draft',$gallery['id']); ?>">Draft&nbsp;&nbsp;<i class="fas fa-file-download"></i></a>
              </li>
            <?php elseif($gallery['status'] == 1): ?>
              <li class="nav-item">
                <a class="nav-link btn-success active mr-1" href="<?= route_to('gallery.publish',$gallery['id']); ?>">Terbit&nbsp;&nbsp;<i class="fas fa-paper-plane"></i></a>
              </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link btn-primary active mr-1" href="<?= route_to('gallery.edit',$gallery['id']); ?>"><i class="fas fa-eye"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn-warning active mr-1" href="<?= route_to('gallery.edit',$gallery['id']); ?>"><i class="fas fa-edit"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn-danger active" href="<?= route_to('gallery.index'); ?>"><i class=" fas fa-times"></i></a>
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
                <td><?= $gallery['judul']; ?></td>
              </tr>
              <tr>
                <td style="width:10%">Status</td>
                <td>
                  <?php if($gallery['status'] == 0): ?>
                    <span class="badge badge-pill badge-success">Terbit</span>
                  <?php elseif($gallery['status'] == 1): ?>
                    <span class="badge badge-pill badge-secondary">Draf</span>
                  <?php endif; ?>
                </td>
              </tr>
              <?php if($gallery['status'] == 0): ?>  
                <tr>
                  <td style="width:15%">Tanggal Terbit</td>
                  <td id="tgl-publish"></td>
                </tr>
              <?php endif; ?>
              <tr>
                <td style="width:10%">Photo</td>
                <td>
                  <?php foreach($gallery['photo'] as $photo): ?>
                    <a href="<?= base_url('uploads/'.$photo['gambar']); ?>" class="foto"><img src="<?= base_url('uploads/'.$photo['gambar']); ?>" alt="" class="img-thumbnail" width="100px"></a>
                  <?php endforeach; ?>
                  </td>
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
  let publishDate = '<?= $gallery['published_at']; ?>'
  let createdAtDate = '<?= $gallery['created_at']; ?>'
  let updatedAtDate = '<?= $gallery['updated_at']; ?>'
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
  

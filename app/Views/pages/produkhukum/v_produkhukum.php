<?= $this->extend('pages/layout/v_template'); ?>
<?= $this->section('css'); ?>
<style>
img.testimonial-thumb {
    max-width: 200px;
}
.quote-item-footer{
    margin-top:0px !important;
}
.link-hukum:hover {
    color: #ffb600;
}
</style>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div id="banner-area" class="banner-area" style="background-image:url('<?= base_url('pages_assets/images/banner/banner1.jpg'); ?>')">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">Produk Hukum</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Produk Hukum</li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end --> 

<section id="main-container" class="main-container">
  <div class="container">
    <div class="row">

      <div class="col-xl-3 col-lg-4">
        <div class="sidebar sidebar-left">
            <div class="widget">
                <div class="quote-item quote-border">

                    <div class="quote-item-footer">
                        <img loading="lazy" class="testimonial-thumb" src="<?= base_url('pages_assets/images/logo_app_bg.png'); ?>" alt="testimonial">
                    </div>
                </div><!-- Quote item end -->

            </div><!-- Widget end -->
            <div class="widget">
                <h3 class="widget-title">Tautan Terkait</h3>
                <ul class="nav service-menu">
                <!-- <li class="active"><a href="service-single.html">Building Remodels</a></li> -->
                    <?php foreach($semuaprodukhukum as $ph): ?>
                        <li id="sidenav-<?= $ph['slug']; ?>"><a href="<?= route_to('pages.detail.produkhukum',$ph['slug']); ?>"><?= $ph['nama']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div><!-- Widget end -->

            

        </div><!-- Sidebar end -->
      </div><!-- Sidebar Col end -->

      <div class="col-xl-8 col-lg-8">
        <div class="content-inner-page">

          <h2 class="column-title mrt-0"><?= $produkhukum['nama']; ?></h2>

          <div class="row">
            <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Tentang</th>
                        <th scope="col">Link</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=1 ?>
                <?php foreach($filehukum as $fh): ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><a class="link-hukum" href="<?= route_to('pages.detail.filehukum',$fh['slug']); ?>"><?= $fh['judul']; ?></a></td>
                        <td><?= implode(' ', array_slice(explode(' ', $fh['tentang']), 0, 4)).'... </p>'; ?></td>
                        <td>
                            <a target="_BLANK" href="<?= route_to('pages.download.produkhukum',$fh['slug']); ?>" class="btn btn-info btn-sm">
                                <i class="fas fa-download"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
            </div><!-- col end -->
          </div><!-- 1st row end-->

        </div><!-- Content inner end -->
      </div><!-- Content Col end -->


    </div><!-- Main row end -->
  </div><!-- Conatiner end -->
</section><!-- Main container end -->
<?= $this->endSection(); ?>
<?= $this->section('js'); ?>
<script>
$(function () {
  let publishDate = $('.tgl-publish')
  publishDate.each(function(index){
	  $(this).append(moment($(this).data('date')).format('dddd, D MMMM YYYY H:mm')+' WITA')
  })
  var pathArray = window.location.pathname.split('/');
  if (pathArray[1] !== 'index.php') {
    let navId = `#sidenav-${pathArray[2]}`
    $(navId).addClass('active')
  } else {
    let navId = `#nav-${pathArray[3]}`
    $(navId).addClass('active')
  }
})
</script>
<?= $this->endSection(); ?>





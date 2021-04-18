<?= $this->extend('pages/layout/v_template'); ?>
<?= $this->section('css'); ?>
    <style>
        .image-book{
            width: 360px;
            height: 250px;
            object-fit: cover;
        }
        .img-fluid {
            height: 240px;
            object-fit: cover;
        }
    </style>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div id="banner-area" class="banner-area" style="background-image:url(pages_assets/images/banner/banner1.jpg)">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">Galeri Foto BPBD</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Galeri Foto</li>
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
      <div class="col-12">
        <div class="row shuffle-wrapper">
          <div class="col-1 shuffle-sizer"></div>
          <?php foreach($gallery as $item): ?>
            <div class="col-lg-4 col-md-6 shuffle-item" >
              <div class="project-img-container">
                <a class="gallery-popup" href="<?= base_url('uploads/'.$item['gambar'][0]['gambar']); ?>">
                  <img class="img-fluid" src="<?= base_url('uploads/'.$item['gambar'][0]['gambar']); ?>" alt="project-image">
                  <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                </a>
                <div class="project-item-info">
                  <div class="project-item-info-content">
                    <h3 class="project-item-title">
                      <a href="<?= route_to('pages.detail.gallery',$item['slug']); ?>"><?= $item['judul']; ?></a>
                    </h3>
                  </div>
                </div>
              </div>
            </div><!-- shuffle item 1 end -->
          <?php endforeach; ?>

        </div><!-- shuffle end -->
      </div>
    </div><!-- Content row end -->

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
})
</script>
<?= $this->endSection(); ?>





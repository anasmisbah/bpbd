<?= $this->extend('pages/layout/v_template'); ?>
<?= $this->section('css'); ?>
    <style>
        .image-book{
            width: 360px;
            height: 250px;
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
                <h1 class="banner-title">Buku BPBD</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Buku BPBD</li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end --> 

<section id="main-container" class="main-container pb-2">
  <div class="container">
    <div class="row">
        <?php foreach($buku as $item): ?>
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="ts-service-box">
                    <div class="ts-service-image-wrapper">
                    <img loading="lazy" class="image-book" src="<?= base_url('uploads/'.$item['sampul']); ?>" alt="service-image">
                    </div>
                    <div class="d-flex">
                    <div class="ts-service-box-img">
                        <img loading="lazy" src="<?= base_url('pages_assets/images/icon-image/book.svg'); ?>" alt="service-icon">
                    </div>
                    <div class="ts-service-info">
                        <h3 class="service-box-title"><a href="<?= route_to('pages.detail.buku',$item['slug']); ?>"><?= $item['judul']; ?></a></h3>
                        <p class="tgl-publish" data-date="<?= $item['published_at']; ?>"><i class="far fa-calendar"></i> </p>
                        <a class="learn-more d-inline-block" href="<?= route_to('pages.detail.buku',$item['slug']); ?>" aria-label="service-details"><i class="fa fa-caret-right"></i> Selengkapnya</a>
                    </div>
                    </div>
                </div><!-- Service1 end -->
            </div><!-- Col 1 end -->
        <?php endforeach; ?>

    </div><!-- Main row end -->
    <nav class="paging" aria-label="Page navigation example">
		  <?= $pager->links('buku','berita_pagination') ?>
        </nav>
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





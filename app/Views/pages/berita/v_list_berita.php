<?= $this->extend('pages/layout/v_template'); ?>
<?= $this->section('title-meta'); ?>
  <title>Berita | BPBD - KALTIM</title>
  <meta name="description" content="Berita BPBD Provinsi Kalimantan Timur, BPBD Provinsi Kaltim, BPBD Kaltim, bencana, banjir, kebakaran hutan dan lahan, tanah longsor, gempa bumi, gunung meletus">
  <meta name="keywords" content="BPBD Provinsi Kalimantan Timur, BPBD Provinsi Kaltim, BPBD Kaltim, bencana, banjir, kebakaran hutan dan lahan, tanah longsor, gempa bumi, gunung meletus">
  <link rel="canonical" href="<?= current_url(); ?>" />
<?= $this->endSection(); ?>
<?= $this->section('css'); ?>
<style>
.card-overlay {
  background: rgba(0, 0, 0, 0.5);
}
.banner-area {
  background-position: 50% 40%;
}
</style>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div id="banner-area" class="banner-area" style="background-image:url(pages_assets/images/banner/berita.jpg)">
    <div class="banner-text">
      <div class="container">
          <div class="row">
            <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">Berita</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Berita</li>
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

      <div class="col-lg-8 mb-5 mb-lg-0">
	  <?php foreach($berita as $br): ?>
        <div class="post">
          <div class="post-media post-image">
            <img loading="lazy" src="<?= base_url('uploads/'.$br['sampul']); ?>" class="img-fluid" alt="post-image">
          </div>

          <div class="post-body">
            <div class="entry-header">
              <div class="post-meta">
                <span class="post-author">
                  <i class="far fa-user"></i><a href="#"> <?= $br['nama']; ?></a>
                </span>
                <span class="post-cat">
                  <i class="far fa-folder-open"></i><a href="#"> Berita</a>
                </span>
                <span class="post-meta-date tgl-publish" data-date="<?= $br['published_at']; ?>"><i class="far fa-calendar"></i></span>
                <span class="post-comment"><i class="far fa-eye"></i> <?= $br['dilihat']; ?></span>
              </div>
              <h2 class="entry-title">
                <a href="<?= route_to('pages.detail.berita',$br['slug']); ?>"><?= $br['judul']; ?></a>
              </h2>
            </div><!-- header end -->

            <div class="entry-content">
              <p><?= implode(' ', array_slice(explode(' ', $br['deskripsi']), 0, 50)).'... </p>'; ?></p>
            </div>

            <div class="post-footer">
              <a href="<?= route_to('pages.detail.berita',$br['slug']); ?>" class="btn btn-primary">Selengkapnya</a>
            </div>

          </div><!-- post-body end -->
        </div><!-- 1st post end -->
		<?php endforeach; ?>
        <nav class="paging" aria-label="Page navigation example">
		  <?= $pager->links('berita','berita_pagination') ?>
        </nav>

      </div><!-- Content Col end -->

      <div class="col-lg-4">

        <div class="sidebar sidebar-right">
          <div class="widget recent-posts">
            <h3 class="widget-title">Berita Terbaru</h3>
            <ul class="list-unstyled">
            <?php foreach($beritaTerbaru as $bt): ?>
              <li class="d-flex align-items-center">
                <div class="posts-thumb">
                  <a href="<?= route_to('pages.detail.berita',$bt['slug']); ?>"><img loading="lazy" alt="img" src="<?= base_url('uploads/'.$bt['sampul']); ?>"></a>
                </div>
                <div class="post-info">
                  <h4 class="entry-title">
                    <a href="<?= route_to('pages.detail.berita',$bt['slug']); ?>"><?= $bt['judul']; ?></a>
                  </h4>
                </div>
              </li><!-- 1st post end-->
              <?php endforeach; ?>
            </ul>

          </div><!-- Recent post end -->

          <div class="widget widget-tags">
            <h3 class="widget-title">Kategori berita</h3>

            <ul class="list-unstyled">
            <?php foreach($kategori as $kt): ?>
              <li><a href="<?= route_to('pages.detail.kategori',$kt['slug']); ?>"><?= $kt['nama']; ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div><!-- Tags end -->


        </div><!-- Sidebar end -->
      </div><!-- Sidebar Col end -->

    </div><!-- Main row end -->

  </div><!-- Container end -->
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





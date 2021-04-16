<?= $this->extend('pages/layout/v_template'); ?>
<?= $this->section('content'); ?>
<div id="banner-area" class="banner-area" style="background-image:url(pages_assets/images/banner/banner1.jpg)">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">Video</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Video</li>
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
	  <?php foreach($video as $vid): ?>
        <div class="post">
          <div class="post-media post-image">
            <iframe width='100%' height='500px' class="embed-responsive-item" src="<?= $vid['url']; ?>"  allowfullscreen></iframe>
          </div>

          <div class="post-body">
            <div class="entry-header">
              <div class="post-meta">
                <span class="post-author">
                  <i class="far fa-user"></i><a href="#"> <?= $vid['nama']; ?></a>
                </span>
                <span class="post-cat">
                  <i class="far fa-folder-open"></i><a href="#"> Video</a>
                </span>
                <span class="post-meta-date tgl-publish" data-date="<?= $vid['published_at']; ?>"><i class="far fa-calendar"></i></span>
                <span class="post-comment"><i class="far fa-eye"></i> <?= $vid['dilihat']; ?></span>
              </div>
              <h2 class="entry-title">
                <a href="<?= route_to('pages.detail.video',$vid['slug']); ?>"><?= $vid['judul']; ?></a>
              </h2>
            </div><!-- header end -->

            <div class="entry-content">
              <p><?= implode(' ', array_slice(explode(' ', $vid['deskripsi']), 0, 50)).'... </p>'; ?></p>
            </div>

            <div class="post-footer">
              <a href="<?= route_to('pages.detail.video',$vid['slug']); ?>" class="btn btn-primary">Selengkapnya</a>
            </div>

          </div><!-- post-body end -->
        </div><!-- 1st post end -->
		<?php endforeach; ?>
        <nav class="paging" aria-label="Page navigation example">
		  <?= $pager->links('video','berita_pagination') ?>
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
              <li><a href="#"><?= $kt['nama']; ?></a></li>
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
	  $(this).append(moment($(this).data('date')).format('dddd, d MMMM YYYY H:mm')+' WITA')
  })
})
</script>
<?= $this->endSection(); ?>





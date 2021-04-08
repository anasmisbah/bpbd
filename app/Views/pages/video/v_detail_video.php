<?= $this->extend('pages/layout/v_template'); ?>
<?= $this->section('content'); ?>
<section id="main-container" class="main-container">
  <div class="container">
    <div class="row">

      <div class="col-lg-8 mb-5 mb-lg-0">

        <div class="post-content post-single">
          <div class="post-media post-image">
          <iframe width='100%' height='500px' class="embed-responsive-item" src="<?= $video['url']; ?>"  allowfullscreen></iframe>
          </div>

          <div class="post-body">
            <div class="entry-header">
              <div class="post-meta">
                <span class="post-cat">
                  <i class="far fa-folder-open"></i><a href="#"> Video</a>
                </span>
                <span class="post-meta-date " id="tgl-publish" data-date="<?= $video['published_at']; ?>" ><i class="far fa-calendar"></i></span>
                <span class="post-comment"><i class="far fa-eye"></i> <?= $video['dilihat']; ?></span>
              </div>
              <h2 class="entry-title">
                  <?= $video['judul']; ?>
              </h2>
            </div><!-- header end -->

            <div class="entry-content">
            <?= $video['deskripsi']; ?>
            </div>

            <div class="tags-area d-flex align-items-center justify-content-between">
              <div class="post-tags">
                  &nbsp;
              </div>
              <div class="share-items">
                <ul class="post-social-icons list-unstyled">
                  <li class="social-icons-head">Share:</li>
                  <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                  <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                </ul>
              </div>
            </div>

          </div><!-- post-body end -->
        </div><!-- post content end -->
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

        <div class="sidebar sidebar-right">
          <div class="widget recent-posts">
            <h3 class="widget-title">Berita Terbaru</h3>
            <ul class="list-unstyled">
               <?php foreach($beritaTerbaru as $bt): ?>
                  <li class="d-flex align-items-center">
                     <div class="posts-thumb">
                        <a href="#"><img loading="lazy" alt="img" src="<?= base_url('uploads/'.$bt['sampul']); ?>"></a>
                     </div>
                     <div class="post-info">
                        <h4 class="entry-title">
                        <a href="#"><?= $bt['judul']; ?></a>
                        </h4>
                     </div>
                  </li><!-- 1st post end-->
               <?php endforeach; ?>
            </ul>

          </div><!-- Recent post end -->


        </div><!-- Sidebar end -->
      </div><!-- Sidebar Col end -->

    </div><!-- Main row end -->

  </div><!-- Conatiner end -->
</section><!-- Main container end -->
<?= $this->endSection(); ?>
<?= $this->section('js'); ?>
<script>
$(function () {
  let publishDate = $('#tgl-publish')
  publishDate.append(moment(publishDate.data('date')).format('dddd, d MMMM YYYY H:mm')+' WITA')
})
</script>
<?= $this->endSection(); ?>

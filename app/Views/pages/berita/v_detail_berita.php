<?= $this->extend('pages/layout/v_template'); ?>

<?= $this->section('title-meta'); ?>
  <title><?= $berita['judul']; ?> | BPBD - KALTIM</title>
  <meta name="description" content="<?= strip_tags(implode(' ', array_slice(explode(' ', $berita['deskripsi']), 0, 20)).'</p>'); ?>">
  <meta name="keywords" content="BPBD Provinsi Kalimantan Timur, BPBD Provinsi Kaltim, BPBD Kaltim, bencana, banjir, kebakaran hutan dan lahan, tanah longsor, gempa bumi, gunung meletus">
  <link rel="canonical" href="<?= current_url(); ?>" />
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section id="main-container" class="main-container">
  <div class="container">
    <div class="row">

      <div class="col-lg-8 mb-5 mb-lg-0">

        <div class="post-content post-single">
          <div class="post-media post-image">
            <img loading="lazy" src="<?= base_url('uploads/'.$berita['sampul']); ?>" class="img-fluid" alt="post-image">
          </div>

          <div class="post-body">
            <div class="entry-header">
              <div class="post-meta">
                <span class="post-author">
                  <i class="far fa-user"></i><a href="#"> <?= $berita['nama']; ?></a>
                </span>
                <span class="post-cat">
                  <i class="far fa-folder-open"></i><a href="#"> Berita</a>
                </span>
                <span class="post-meta-date " id="tgl-publish" data-date="<?= $berita['published_at']; ?>" ><i class="far fa-calendar"></i></span>
                <span class="post-comment"><i class="far fa-eye"></i> <?= $berita['dilihat']; ?></span>
              </div>
              <h2 class="entry-title">
                  <?= $berita['judul']; ?>
              </h2>
            </div><!-- header end -->

            <div class="entry-content">
            <?= $berita['deskripsi']; ?>
            </div>

            <div class="tags-area d-flex align-items-center justify-content-between">
              <div class="post-tags">
                  <?php foreach($berita['kategori'] as $ktgr): ?>
                     <a href="<?= route_to('pages.detail.kategori',$ktgr['slug']); ?>"><?= $ktgr['nama']; ?></a>
                  <?php endforeach; ?>
              </div>
              <div class="share-items">
                <ul class="post-social-icons list-unstyled">
                  <li class="social-icons-head">Bagikan:</li>
                  <li><a target="_blank" href="https://www.facebook.com/sharer.php?u=<?= base_url(route_to('pages.detail.berita',$berita['slug'])); ?>&t=<?= $berita['judul']; ?>"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a target="_blank" href="https://twitter.com/intent/tweet?text=<?= $berita['judul']; ?>&url=<?= base_url(route_to('pages.detail.berita',$berita['slug'])); ?>"><i class="fab fa-twitter"></i></a></li>
                  <li><a target="_blank" href="https://api.whatsapp.com/send?text=<?= base_url(route_to('pages.detail.berita',$berita['slug'])); ?>"><i class="fab fa-whatsapp"></i></a></li>
                  <li><a target="_blank" href="https://www.linkedin.com/shareArticle/?mini=true&title=<?= $berita['judul']; ?>&url=<?= base_url(route_to('pages.detail.berita',$berita['slug'])); ?>"><i class="fab fa-linkedin"></i></a></li>
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

          <div class="widget widget-tags">
            <h3 class="widget-title">Kategori </h3>

            <ul class="list-unstyled">
               <?php foreach($kategori as $kt): ?>
                  <li><a href="<?= route_to('pages.detail.kategori',$kt['slug']); ?>"><?= $kt['nama']; ?></a></li>
               <?php endforeach; ?>
            </ul>
          </div><!-- Tags end -->


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
  publishDate.append(moment(publishDate.data('date')).format('dddd, D MMMM YYYY H:mm')+' WITA')
})
</script>
<?= $this->endSection(); ?>

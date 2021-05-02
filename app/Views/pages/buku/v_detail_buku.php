<?= $this->extend('pages/layout/v_template'); ?>
<?= $this->section('content'); ?>
<section id="main-container" class="main-container">
  <div class="container">

    <div class="row">
      <div class="col-lg-8">
            <img loading="lazy" class="w-100" src="<?= base_url('uploads/'.$buku['sampul']); ?>" alt="project-image" />
      </div><!-- Slider col end -->

      <div class="col-lg-4 mt-5 mt-lg-0">

        <h3 class="column-title mrt-0"><?= $buku['judul']; ?></h3>
        <p><?= $buku['deskripsi']; ?></p>

        <ul class="project-info list-unstyled">
          <li>
            <p class="project-info-label">Penulis</p>
            <p class="project-info-content"><?= $buku['penulis']; ?></p>
          </li>
          <li>
            <p class="project-info-label">Penerbit</p>
            <p class="project-info-content"><?= $buku['penerbit']; ?></p>
          </li>
          <li>
            <p class="project-info-label">Tanggal</p>
            <p class="project-info-content" id="tgl-publish" data-date="<?= $buku['published_at']; ?>"></p>
          </li>
          <li>
            <p class="project-link">
              <a class="btn btn-primary" target="_blank" href="<?= route_to('pages.download.buku',$buku['slug']); ?>"><i class="fas fa-download"></i>&nbsp;&nbsp;Download</a>
            </p>
          </li>
          <li>
            <div class="tags-area d-flex align-items-center justify-content-between mt-5">
            <div class="post-tags">
                  &nbsp;
              </div>
              <div class="share-items">
                <ul class="post-social-icons list-unstyled">
                  <li class="social-icons-head">Bagikan:</li>
                  <li><a target="_blank" href="https://www.facebook.com/sharer.php?u=<?= base_url(route_to('pages.detail.buku',$buku['slug'])); ?>&t=<?= $buku['judul']; ?>"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a target="_blank" href="https://twitter.com/intent/tweet?text=<?= $buku['judul']; ?>&url=<?= base_url(route_to('pages.detail.buku',$buku['slug'])); ?>"><i class="fab fa-twitter"></i></a></li>
                  <li><a target="_blank" href="https://api.whatsapp.com/send?text=<?= base_url(route_to('pages.detail.buku',$buku['slug'])); ?>"><i class="fab fa-whatsapp"></i></a></li>
                  <li><a target="_blank" href="https://www.linkedin.com/shareArticle/?mini=true&title=<?= $buku['judul']; ?>&url=<?= base_url(route_to('pages.detail.buku',$buku['slug'])); ?>"><i class="fab fa-linkedin"></i></a></li>
                </ul>
              </div>
            </div>
          </li>
        </ul>

      </div><!-- Content col end -->

    </div><!-- Row end -->

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

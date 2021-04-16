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
  publishDate.append(moment(publishDate.data('date')).format('dddd, d MMMM YYYY H:mm')+' WITA')
})
</script>
<?= $this->endSection(); ?>

<?= $this->extend('pages/layout/v_template'); ?>

<?= $this->section('title-meta'); ?>
  <title><?= $filehukum['judul']; ?> | BPBD - KALTIM</title>
  <meta name="description" content="<?= $filehukum['judul']; ?> BPBD Provinsi Kalimantan Timur, BPBD Provinsi Kaltim, BPBD Kaltim, bencana, banjir, kebakaran hutan dan lahan, tanah longsor, gempa bumi, gunung meletus">
  <meta name="keywords" content="BPBD Provinsi Kalimantan Timur, BPBD Provinsi Kaltim, BPBD Kaltim, bencana, banjir, kebakaran hutan dan lahan, tanah longsor, gempa bumi, gunung meletus">
  <link rel="canonical" href="<?= current_url(); ?>" />
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section id="main-container" class="main-container">
  <div class="container">

    <div class="row">
      <div class="col-lg-8">
      <div id="my-container"></div>
      </div><!-- Slider col end -->

      <div class="col-lg-4 mt-5 mt-lg-0">

        <h3 class="column-title mrt-0"><?= $filehukum['judul']; ?></h3>
        <p><?= $filehukum['tentang']; ?></p>

        <ul class="project-info list-unstyled">
          <li>
            <p class="project-info-label">Tanggal Terbit</p>
            <p class="project-info-content" id="tgl-publish" data-date="<?= $filehukum['published_at']; ?>"></p>
          </li>
          <li>
            <p class="project-link">
              <a class="btn btn-primary" target="_blank" href="<?= route_to('pages.download.produkhukum',$filehukum['slug']); ?>"><i class="fas fa-download"></i>&nbsp;&nbsp;Download</a>
            </p>
          </li>
        </ul>

      </div><!-- Content col end -->

    </div><!-- Row end -->

  </div><!-- Conatiner end -->
</section><!-- Main container end -->
<?= $this->endSection(); ?>
<?= $this->section('js'); ?>
<script src="https://unpkg.com/pdfobject@2.2.5/pdfobject.min.js"></script>
<script>
$(function () {
    PDFObject.embed("<?= base_url('uploads/'.$filehukum['file']); ?>", "#my-container");
  let publishDate = $('#tgl-publish')
  publishDate.append(moment(publishDate.data('date')).format('dddd, D MMMM YYYY H:mm')+' WITA')
})
</script>
<?= $this->endSection(); ?>

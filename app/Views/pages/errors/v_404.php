<?= $this->extend('pages/layout/v_template'); ?>

<?= $this->section('title-meta'); ?>
  <title>Halaman tidak ditemukan | BPBD - KALTIM</title>
  <meta name="description" content="">
  <meta name="keywords" content="BPBD Provinsi Kalimantan Timur, BPBD Provinsi Kaltim, BPBD Kaltim, bencana, banjir, kebakaran hutan dan lahan, tanah longsor, gempa bumi, gunung meletus">
  <link rel="canonical" href="<?= current_url(); ?>" />
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section id="main-container" class="main-container">
  <div class="container">

    <div class="row">

      <div class="col-12">
        <div class="error-page text-center">
          <div class="error-code">
            <h2><strong>404</strong></h2>
          </div>
          <div class="error-message">
            <h3>Oops... Halaman tidak ditemukan!</h3>
          </div>
          <div class="error-body">
          Silahkan gunakan tombol di bawah ini untuk pergi ke halaman utama situs <br>
            <a href="<?= route_to('pages.beranda'); ?>" class="btn btn-primary">Back to Home Page</a>
          </div>
        </div>
      </div>

    </div><!-- Content row -->
  </div><!-- Conatiner end -->
</section><!-- Main container end -->
<?= $this->endSection(); ?>
<?= $this->section('js'); ?>
<?= $this->endSection(); ?>

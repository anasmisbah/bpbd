<?= $this->extend('pages/layout/v_template'); ?>
<?= $this->section('css'); ?>
<link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">

<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section id="news" class="news">
  <div class="container">
    <div class="row text-center">
        <div class="col-12">
          <h2 class="section-title">Galeri Kegiatan BPBD Kalimantan Timur</h2>
          <h3 class="section-sub-title"><?= $gallery['judul']; ?></h3>
        </div>
    </div>
    <!--/ Title row end -->

    <div class="row justify-content-center">
      <div class="col-8">
        <div class="fotorama " data-nav="thumbs" data-allowfullscreen="true" data-autoplay="true" data-loop="true">
          <?php foreach($gallery['gambar'] as $gambar): ?>
              <a href="<?= base_url('uploads/'.$gambar['gambar']); ?>"><img loading="lazy"  src="<?= base_url('uploads/'.$gambar['gambar']); ?>" alt="project-image" /></a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <!--/ Content row end -->
  </div>
  <!--/ Container end -->
</section>
<?= $this->endSection(); ?>
<?= $this->section('js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
<script>
$(function () {
  let publishDate = $('#tgl-publish')
  publishDate.append(moment(publishDate.data('date')).format('dddd, D MMMM YYYY H:mm')+' WITA')
})
</script>
<?= $this->endSection(); ?>

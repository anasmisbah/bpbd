<?= $this->extend('pages/layout/v_template'); ?>

<?= $this->section('title-meta'); ?>
  <title><?= $gallery['judul']; ?> | BPBD - KALTIM</title>
  <meta name="description" content="Galeri BPBD Provinsi Kalimantan Timur, BPBD Provinsi Kaltim, BPBD Kaltim, bencana, banjir, kebakaran hutan dan lahan, tanah longsor, gempa bumi, gunung meletus">
  <meta name="keywords" content="BPBD Provinsi Kalimantan Timur, BPBD Provinsi Kaltim, BPBD Kaltim, bencana, banjir, kebakaran hutan dan lahan, tanah longsor, gempa bumi, gunung meletus">
  <link rel="canonical" href="<?= current_url(); ?>" />
<?= $this->endSection(); ?>

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
          <div class="tags-area d-flex align-items-center justify-content-between">
            <div class="post-tags">
                &nbsp;
            </div>
            <div class="share-items">
              <ul class="post-social-icons list-unstyled">
                <li class="social-icons-head">Bagikan:</li>
                <li><a target="_blank" href="https://www.facebook.com/sharer.php?u=<?= base_url(route_to('pages.detail.gallery',$gallery['slug'])); ?>&t=<?= $gallery['judul']; ?>"><i class="fab fa-facebook-f"></i></a></li>
                <li><a target="_blank" href="https://twitter.com/intent/tweet?text=<?= $gallery['judul']; ?>&url=<?= base_url(route_to('pages.detail.gallery',$gallery['slug'])); ?>"><i class="fab fa-twitter"></i></a></li>
                <li><a target="_blank" href="https://api.whatsapp.com/send?text=<?= base_url(route_to('pages.detail.gallery',$gallery['slug'])); ?>"><i class="fab fa-whatsapp"></i></a></li>
                <li><a target="_blank" href="https://www.linkedin.com/shareArticle/?mini=true&title=<?= $gallery['judul']; ?>&url=<?= base_url(route_to('pages.detail.gallery',$gallery['slug'])); ?>"><i class="fab fa-linkedin"></i></a></li>
              </ul>
            </div>
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

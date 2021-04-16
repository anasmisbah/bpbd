<?= $this->extend('pages/layout/v_template'); ?>


<?= $this->section('css'); ?>
<style>
  .slide-title{
    font-weight:550;
  }
  .card-img{
    height: 100%;
      object-fit: cover;
  }
  .card-title a:hover{
    color: #ffb600;
  }
  .ts-service-info {
    margin-left: 0px;
  }
  hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
}
</style>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="banner-carousel banner-carousel-1 mb-0">
  
  <?php foreach($banner as $bn): ?>
  <div class="banner-carousel-item" style="background-image:url(uploads/<?= $bn['gambar']; ?>)">
    
  </div>
  <?php endforeach; ?>
</div>

<section class="call-to-action-box no-padding">
  <div class="container">
    <div class="action-style-box">
        <div class="row align-items-center">
          <div class="col-md-8 text-center text-md-left">
              <div class="call-to-action-text">
                <h3 class="action-title"></h3>
              </div>
          </div><!-- Col end -->
          <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
              <div class="call-to-action-btn">
                <a class="btn btn-dark" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
              </div>
          </div><!-- col end -->
        </div><!-- row end -->
    </div><!-- Action style box -->
  </div><!-- Container end -->
</section><!-- Action end -->
<section id="news" class="news">
  <div class="container">
    <div class="row text-center">
        <div class="col-12">
          <h2 class="section-title">Badan Penanggulangan Bencana Daerah Provinsi Kalimantan Timur</h2>
          <h3 class="section-sub-title">Berita Terbaru</h3>
        </div>
    </div>
    <!--/ Title row end -->

    <div class="row">
    <?php foreach($beritaTerbaru as $itemBt): ?>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="latest-post">
              <div class="latest-post-media">
                <a href="<?= route_to('pages.detail.berita',$itemBt['slug']); ?>" class="latest-post-img">
                    <img loading="lazy" class="img-fluid" src="<?= base_url('uploads/'.$itemBt['sampul']); ?>" alt="img">
                </a>
              </div>
              <div class="post-body">
                <h4 class="post-title">
                    <a href="<?= route_to('pages.detail.berita',$itemBt['slug']); ?>" class="d-inline-block"><?= $itemBt['judul']; ?></a>
                </h4>
                <div class="latest-post-meta">
                    <span class="post-item-date tgl-publish" data-date="<?= $itemBt['published_at']; ?>">
                      <i class="fa fa-clock-o"></i>
                    </span>
                </div>
              </div>
          </div><!-- Latest post end -->
        </div><!-- 1st post col end -->
        <?php endforeach; ?>
    </div>
    <!--/ Content row end -->

    <div class="general-btn text-center mt-4">
        <a class="btn btn-primary" href="<?= route_to('pages.list.berita'); ?>">Berita Terbaru Lainnya</a>
    </div>

  </div>
  <!--/ Container end -->
</section>
<!--/ News end -->
<section id="news" class="news">
  <div class="container">
    <div class="row text-center">
        <div class="col-12">
          <h3 class="section-sub-title">Video BPBD Terbaru</h3>
        </div>
    </div>
    <!--/ Title row end -->

    <div class="row">
    <?php foreach($videoTerbaru as $itemVt): ?>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="latest-post">
              <div class="latest-post-media">
                <a href="<?= route_to('pages.detail.video',$itemVt['slug']); ?>" class="latest-post-img">
                <iframe class="embed-responsive-item" src="<?= $itemVt['url']; ?>"  allowfullscreen></iframe>
                </a>
              </div>
              <div class="post-body">
                <h4 class="post-title">
                    <a href="<?= route_to('pages.detail.video',$itemVt['slug']); ?>" class="d-inline-block"><?= $itemVt['judul']; ?></a>
                </h4>
                <div class="latest-post-meta">
                    <span class="post-item-date tgl-publish" data-date="<?= $itemVt['published_at']; ?>">
                      <i class="fa fa-clock-o"></i>
                    </span>
                </div>
              </div>
          </div><!-- Latest post end -->
        </div><!-- 1st post col end -->
        <?php endforeach; ?>
    </div>
    <!--/ Content row end -->
    <div class="general-btn text-center mt-4">
        <a class="btn btn-primary" href="<?= route_to('pages.list.video'); ?>">Video Terbaru Lainnya</a>
    </div>
  </div>
  <!--/ Container end -->
</section>
<!--/ News end -->
<section id="facts" class="facts-area dark-bg">
  <div class="container">
    <div class="row text-center">
        <div class="col-12">
          <h3 class="section-sub-title">Kasus Corona Virus Kaltim</h3>
        </div>
    </div>
    <div class="facts-wrapper">

        <div class="row">
          <div class="col-md-3 col-sm-6 ts-facts">
              <div class="ts-facts-img">
                <img width="100px" loading="lazy" src="<?= base_url('pages_assets/images/icon-image/icon_positif.png'); ?>" alt="facts-img">
              </div>
              <div class="ts-facts-content">
                <h2 class="ts-facts-num" id="daerah_positif"></h2>
                <h3 class="ts-facts-title">Total Positif</h3>
              </div>
          </div><!-- Col end -->
          <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
              <div class="ts-facts-img">
                <img width="100px" loading="lazy" src="<?= base_url('pages_assets/images/icon-image/icon_sakit.png'); ?>" alt="facts-img">
              </div>
              <div class="ts-facts-content">
                <h2 class="ts-facts-num" id="daerah_dirawat"></h2>
                <h3 class="ts-facts-title">Total Dirawat</h3>
              </div>
          </div><!-- Col end -->
          <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-sm-0">
              <div class="ts-facts-img">
                <img width="100px" loading="lazy" src="<?= base_url('pages_assets/images/icon-image/icon_sembuh.png'); ?>" alt="facts-img">
              </div>
              <div class="ts-facts-content">
                <h2 class="ts-facts-num" id="daerah_sembuh"></h2>
                <h3 class="ts-facts-title">Total Sembuh</h3>
              </div>
          </div><!-- Col end -->

          <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
              <div class="ts-facts-img">
                <img width="100px" loading="lazy" src="<?= base_url('pages_assets/images/icon-image/icon_meninggal.png'); ?>" alt="facts-img">
              </div>
              <div class="ts-facts-content">
                <h2 class="ts-facts-num" id="daerah_meninggal"></h2>
                <h3 class="ts-facts-title">Total Meninggal</h3>
              </div>
          </div><!-- Col end -->
        </div> <!-- Facts end -->
    </div>
    <!--/ Content row end -->
  </div>
  <!--/ Container end -->
</section><!-- Facts end -->
<section id="facts" class="facts-area">
  <div class="container">
    <div class="row text-center">
        <div class="col-12">
          <h3 class="section-sub-title">Kasus Corona Virus Indonesia</h3>
        </div>
    </div>
    <div class="facts-wrapper">

        <div class="row">
          <div class="col-md-3 col-sm-6 ts-facts">
              <div class="ts-facts-img">
                <img width="100px" loading="lazy" src="<?= base_url('pages_assets/images/icon-image/icon_positif.png'); ?>" alt="facts-img">
              </div>
              <div class="ts-facts-content">
                <h2 class="ts-facts-num" style="color: #000;" id="indonesia_positif"></h2>
                <h3 class="ts-facts-title">Total Positif</h3>
              </div>
          </div><!-- Col end -->
          <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
              <div class="ts-facts-img">
                <img width="100px" loading="lazy" src="<?= base_url('pages_assets/images/icon-image/icon_sakit.png'); ?>" alt="facts-img">
              </div>
              <div class="ts-facts-content">
                <h2 class="ts-facts-num" style="color: #000;" id="indonesia_dirawat"></h2>
                <h3 class="ts-facts-title">Total Dirawat</h3>
              </div>
          </div><!-- Col end -->
          <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-sm-0">
              <div class="ts-facts-img">
                <img width="100px" loading="lazy" src="<?= base_url('pages_assets/images/icon-image/icon_sembuh.png'); ?>" alt="facts-img">
              </div>
              <div class="ts-facts-content">
                <h2 class="ts-facts-num" style="color: #000;" id="indonesia_sembuh"></h2>
                <h3 class="ts-facts-title">Total Sembuh</h3>
              </div>
          </div><!-- Col end -->

          <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
              <div class="ts-facts-img">
                <img width="100px" loading="lazy" src="<?= base_url('pages_assets/images/icon-image/icon_meninggal.png'); ?>" alt="facts-img">
              </div>
              <div class="ts-facts-content">
                <h2 class="ts-facts-num" style="color: #000;" id="indonesia_meninggal"></h2>
                <h3 class="ts-facts-title">Total Meninggal</h3>
              </div>
          </div><!-- Col end -->
        </div> <!-- Facts end -->
    </div>
    <!--/ Content row end -->
  </div>
  <!--/ Container end -->
</section><!-- Facts end -->
<section class="no-padding" style="background: #FFCA3A">
  <div class="container" style="padding-top:20px;padding-bottom:20px">
  <div class="row text-center" >
        <div class="col-12">
          <h3 class=" text-white" style="font-weight: 900;font-size: 36px;line-height: 46px;text-transform: uppercase;">Prakiraan Cuaca</h3>
        </div>
    </div>
    <div class="row">
    <div class="col">
    <a class="weatherwidget-io" href="https://forecast7.com/en/0d54116d42/east-kalimantan/" data-label_1="KALIMANTAN TIMUR" data-label_2="WEATHER" data-theme="orange" >KALIMANTAN TIMUR WEATHER</a>    </div>
    <script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
    </div><!-- Content row end -->
  </div>
  <!--/ Container end -->
</section>
<?= $this->endSection(); ?>
<?= $this->section('js'); ?>
<script>
$(function () {
  let publishDate = $('.tgl-publish')
  publishDate.each(function(index){
	  $(this).append(moment($(this).data('date')).format('dddd, d MMMM YYYY H:mm')+' WITA')
  })

  $.ajax({
      url: "https://covid19.kaltimprov.go.id/api/kasus",
      type: "GET",
      success: function(data) {
          dataDaerah = data.find((item)=> item.KabKota === "Kalimantan Timur")
          // console.log(dataDaerah);
          $('#daerah_positif').append(`<span class="counterUp" data-count="${dataDaerah.Confirmed}">0</span>`)
          $('#daerah_sembuh').append(`<span class="counterUp" data-count="${dataDaerah.Sembuh}">0</span>`)
          $('#daerah_meninggal').append(`<span class="counterUp" data-count="${dataDaerah.Meninggal}">0</span>`)
          $('#daerah_dirawat').append(`<span class="counterUp" data-count="${dataDaerah.Dirawat}">0</span>`)
      },
      error: function(data) {
          // console.log("error ",data);
      }
  });
  $.ajax({
      url: "https://covid19.mathdro.id/api/countries/Indonesia/confirmed",
      type: "GET",
      success: function(data) {
          dataIndonesia = data[0]
          // $('#indonesia_positif').append(`<span class="counterUp" data-count="${dataIndonesia.positif}">0</span>`)
          // $('#indonesia_sembuh').append(`<span class="counterUp" data-count="${dataIndonesia.sembuh}">0</span>`)
          // $('#indonesia_meninggal').append(`<span class="counterUp" data-count="${dataIndonesia.meninggal}">0</span>`)
          // $('#indonesia_dirawat').append(`<span class="counterUp" data-count="${dataIndonesia.dirawat}">0</span>`)

          $('#indonesia_positif').append(`<span class="counterUp" data-count="${dataIndonesia.confirmed}">0</span>`)
          $('#indonesia_sembuh').append(`<span class="counterUp" data-count="${dataIndonesia.recovered}">0</span>`)
          $('#indonesia_meninggal').append(`<span class="counterUp" data-count="${dataIndonesia.deaths}">0</span>`)
          $('#indonesia_dirawat').append(`<span class="counterUp" data-count="${dataIndonesia.active}">0</span>`)
      },
      error: function(data) {
          // console.log("error ",data);
      }
  });
})
</script>
<?= $this->endSection(); ?>


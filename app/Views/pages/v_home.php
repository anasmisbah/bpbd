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
  .img-berita {
      height: 240px;
      object-fit: cover;
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
          <div class="col-md-9 text-center text-md-left">
              <div class="call-to-action-text">
                <h4 class="action-title">Badan Penanggulangan Bencana Daerah Provinsi Kalimantan Timur</h4>
              </div>
          </div><!-- Col end -->
          <div class="col-md-3 text-center text-md-right mt-3 mt-md-0">
              <div class="call-to-action-btn">
                <a class="btn btn-dark" href="#">Tanggap Tangkas Tangguh</a>
              </div>
          </div><!-- col end -->
        </div><!-- row end -->
    </div><!-- Action style box -->
  </div><!-- Container end -->
</section><!-- Action end -->
<section id="ts-features" class="ts-features">
  <div class="container">
    <div class="row">
        <div class="col-lg-6">
          <div class="ts-intro">
              <h2 class="into-title">About Us</h2>
              <h3 class="into-sub-title">We deliver landmark projects</h3>
              <p>We are rethoric question ran over her cheek When she reached the first hills of the Italic Mountains,
                she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village
                and the subline of her own road, the Line Lane.</p>
          </div><!-- Intro box end -->

          <div class="gap-20"></div>

          <div class="row">
              <div class="col-md-6">
                <div class="ts-service-box">
                    <span class="ts-service-icon">
                      <i class="fas fa-trophy"></i>
                    </span>
                    <div class="ts-service-box-content">
                      <h3 class="service-box-title">We've Repution for Excellence</h3>
                    </div>
                </div><!-- Service 1 end -->
              </div><!-- col end -->

              <div class="col-md-6">
                <div class="ts-service-box">
                    <span class="ts-service-icon">
                      <i class="fas fa-sliders-h"></i>
                    </span>
                    <div class="ts-service-box-content">
                      <h3 class="service-box-title">We Build Partnerships</h3>
                    </div>
                </div><!-- Service 2 end -->
              </div><!-- col end -->
          </div><!-- Content row 1 end -->

          <div class="row">
              <div class="col-md-6">
                <div class="ts-service-box">
                    <span class="ts-service-icon">
                      <i class="fas fa-thumbs-up"></i>
                    </span>
                    <div class="ts-service-box-content">
                      <h3 class="service-box-title">Guided by Commitment</h3>
                    </div>
                </div><!-- Service 1 end -->
              </div><!-- col end -->

              <div class="col-md-6">
                <div class="ts-service-box">
                    <span class="ts-service-icon">
                      <i class="fas fa-users"></i>
                    </span>
                    <div class="ts-service-box-content">
                      <h3 class="service-box-title">A Team of Professionals</h3>
                    </div>
                </div><!-- Service 2 end -->
              </div><!-- col end -->
          </div><!-- Content row 1 end -->
        </div><!-- Col end -->

        <div class="col-lg-6 mt-4 mt-lg-0">
          <h3 class="into-sub-title">Our Values</h3>
          <p>Minim Austin 3 wolf moon scenester aesthetic, umami odio pariatur bitters. Pop-up occaecat taxidermy street art, tattooed beard literally.</p>

          <div class="accordion accordion-group" id="our-values-accordion">
              <div class="card">
                <div class="card-header p-0 bg-transparent" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Safety
                      </button>
                    </h2>
                </div>
              
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#our-values-accordion">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidata
                    </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header p-0 bg-transparent" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Customer Service
                      </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#our-values-accordion">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidata
                    </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header p-0 bg-transparent" id="headingThree">
                    <h2 class="mb-0">
                      <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Integrity
                      </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#our-values-accordion">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidata
                    </div>
                </div>
              </div>
          </div>
          <!--/ Accordion end -->

        </div><!-- Col end -->
    </div><!-- Row end -->
  </div><!-- Container end -->
</section><!-- Feature are end -->
<section id="ts-service-area" class="ts-service-area solid-bg pb-0">
  <div class="container">
    <div class="row text-center">
        <div class="col-12">
          <h2 class="section-title">We Are Specialists In</h2>
          <h3 class="section-sub-title">What We Do</h3>
        </div>
    </div>
    <!--/ Title row end -->

    <div class="row">
        <div class="col-lg-4">
          <div class="ts-service-box d-flex">
              <div class="ts-service-box-img">
                <img loading="lazy" src="pages_assets/images/icon-image/service-icon1.png" alt="service-icon">
              </div>
              <div class="ts-service-box-info">
                <h3 class="service-box-title"><a href="#">Home Construction</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer adipiscing erat</p>
              </div>
          </div><!-- Service 1 end -->

          <div class="ts-service-box d-flex">
              <div class="ts-service-box-img">
                <img loading="lazy" src="pages_assets/images/icon-image/service-icon2.png" alt="service-icon">
              </div>
              <div class="ts-service-box-info">
                <h3 class="service-box-title"><a href="#">Building Remodels</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer adipiscing erat</p>
              </div>
          </div><!-- Service 2 end -->

          <div class="ts-service-box d-flex">
              <div class="ts-service-box-img">
                <img loading="lazy" src="pages_assets/images/icon-image/service-icon3.png"  alt="service-icon">
              </div>
              <div class="ts-service-box-info">
                <h3 class="service-box-title"><a href="#">Interior Design</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer adipiscing erat</p>
              </div>
          </div><!-- Service 3 end -->

        </div><!-- Col end -->

        <div class="col-lg-4 text-center">
          <img loading="lazy" class="img-fluid" src="pages_assets/images/services/service-center.jpg" alt="service-avater-image">
        </div><!-- Col end -->

        <div class="col-lg-4 mt-5 mt-lg-0 mb-4 mb-lg-0">
          <div class="ts-service-box d-flex">
              <div class="ts-service-box-img">
                <img loading="lazy" src="pages_assets/images/icon-image/service-icon4.png" alt="service-icon">
              </div>
              <div class="ts-service-box-info">
                <h3 class="service-box-title"><a href="#">Exterior Design</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer adipiscing erat</p>
              </div>
          </div><!-- Service 4 end -->

          <div class="ts-service-box d-flex">
              <div class="ts-service-box-img">
                <img loading="lazy" src="pages_assets/images/icon-image/service-icon5.png" alt="service-icon">
              </div>
              <div class="ts-service-box-info">
                <h3 class="service-box-title"><a href="#">Renovation</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer adipiscing erat</p>
              </div>
          </div><!-- Service 5 end -->

          <div class="ts-service-box d-flex">
              <div class="ts-service-box-img">
                <img loading="lazy" src="pages_assets/images/icon-image/service-icon6.png" alt="service-icon">
              </div>
              <div class="ts-service-box-info">
                <h3 class="service-box-title"><a href="#">Safety Management</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Integer adipiscing erat</p>
              </div>
          </div><!-- Service 6 end -->
        </div><!-- Col end -->
    </div><!-- Content row end -->

  </div>
  <!--/ Container end -->
</section><!-- Service end -->
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
<section id="news" class="news solid-bg">
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
                    <img loading="lazy" class="img-fluid img-berita" src="<?= base_url('uploads/'.$itemBt['sampul']); ?>" alt="img">
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
                <iframe width="100%" height="100%" class="embed-responsive-item" src="<?= $itemVt['url']; ?>"  allowfullscreen></iframe>
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
<section id="main-container" class="main-container">
  <div class="container">
  <div class="row text-center">
      <div class="col-lg-12">
        <h2 class="section-title">Galeri Kegiatan BPBD Provinsi Kalimantan Timur</h2>
        <h3 class="section-sub-title">Galeri BPBD</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="row shuffle-wrapper">
          <div class="col-1 shuffle-sizer"></div>
          <?php foreach($galleryTerbaru as $gt): ?>
            <div class="col-lg-4 col-md-6 shuffle-item" >
              <div class="project-img-container">
                <a class="gallery-popup" href="<?= base_url('uploads/'.$gt['gambar'][0]['gambar']); ?>">
                  <img class="img-fluid img-berita" src="<?= base_url('uploads/'.$gt['gambar'][0]['gambar']); ?>" alt="project-image">
                  <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                </a>
                <div class="project-item-info">
                  <div class="project-item-info-content">
                    <h3 class="project-item-title">
                      <a href="<?= route_to('pages.detail.gallery',$gt['slug']); ?>"><?= $gt['judul']; ?></a>
                    </h3>
                  </div>
                </div>
              </div>
            </div><!-- shuffle item 1 end -->
          <?php endforeach; ?>

        </div><!-- shuffle end -->
      </div>
    </div><!-- Content row end -->

  </div><!-- Conatiner end -->
</section><!-- Main container end -->
<section id="main-container" class="main-container">
  <div class="container">
    <div class="row text-center">
      <div class="col-12">
        <h2 class="section-title">Sosial Media BPBD Provinsi Kalimantan Timur</h2>
        <h3 class="section-sub-title">Sosial Media</h3>
      </div>
    </div>
    <!--/ Title row end -->

    <div class="row">

      <div class="col-lg-4 col-md-6">
        <div class="ts-pricing-box">
          <div class="ts-pricing-header">
            <h2 class="ts-pricing-name">Ikuti Kami Di Facebook</h2>
          </div><!-- Pricing header -->
          <div class="ts-pricing-features">
            <div class="fb-page" data-href="https://web.facebook.com/BPBD-Kaltim-104711564554260" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://web.facebook.com/BPBD-Kaltim-104711564554260" class="fb-xfbml-parse-ignore"><a href="https://web.facebook.com/BPBD-Kaltim-104711564554260">BPBD Kaltim</a></blockquote></div>
          </div><!-- Features end -->
        </div><!-- Plan 1 end -->
      </div><!-- Col end -->

      <div class="col-lg-4 col-md-6">
        <div class="ts-pricing-box ts-pricing-featured">
          <div class="ts-pricing-header">
            <h2 class="ts-pricing-name">Ikuti Kami Di Twitter</h2>
          </div><!-- Pricing header -->
          <div class="ts-pricing-features">
          <a class="twitter-timeline" data-height="500" href="https://twitter.com/bpbdkaltim?ref_src=twsrc%5Etfw">Tweets by bpbdkaltim</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
          </div>
        </div><!-- Plan 2 end -->
      </div><!-- Col end -->

      <div class="col-lg-4 col-md-6">
        <div class="ts-pricing-box">
          <div class="ts-pricing-header">
            <h2 class="ts-pricing-name">Ikuti Kami Di instagram</h2>
          </div><!-- Pricing header -->
          <div class="ts-pricing-features">
          </div><!-- Features end -->
        </div><!-- Plan 3 end -->
      </div><!-- Col end -->

    </div>
    <!--/ Content row end -->

  </div><!-- Conatiner end -->
</section><!-- Main container end -->
<div id="fb-root"></div>
<?= $this->endSection(); ?>
<?= $this->section('js'); ?>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v10.0" nonce="2koYxy6w"></script>
<script>
$(function () {
  let publishDate = $('.tgl-publish')
  publishDate.each(function(index){
	  $(this).append(moment($(this).data('date')).format('dddd, D MMMM YYYY H:mm')+' WITA')
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


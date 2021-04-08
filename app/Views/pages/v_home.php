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
  
  <?php foreach($beritaTerbaru as $bt): ?>
  <div class="banner-carousel-item" style="background-image:url(uploads/<?= $bt['sampul']; ?>)">
    <div class="slider-content text-left">
        <div class="container h-100">
          <div class="row align-items-center h-100">
              <div class="col-md-12">
                <h2 class="slide-title-box" data-animation-in="slideInDown">Berita</h2>
                <h3 class="slide-title" data-animation-in="fadeIn"><?= $bt['judul']; ?></h3>
                <p data-animation-in="slideInRight">
                    <a href="services.html" class="slider btn btn-primary border">Baca selengkapnya</a>
                </p>
              </div>
          </div>
        </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>

<section class="call-to-action-box no-padding">
  <div class="container">
    <div class="action-style-box">
        <div class="row align-items-center">
          <div class="col-md-8 text-center text-md-left">
              <div class="call-to-action-text">
                <h3 class="action-title">We understand your needs on construction</h3>
              </div>
          </div><!-- Col end -->
          <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
              <div class="call-to-action-btn">
                <a class="btn btn-dark" href="#">Request Quote</a>
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

<section id="facts" class="facts-area dark-bg">
  <div class="container">
    <div class="facts-wrapper">
        <div class="row">
          <div class="col-md-3 col-sm-6 ts-facts">
              <div class="ts-facts-img">
                <img loading="lazy" src="<?= base_url('pages_assets/images/icon-image/fact1.png'); ?>" alt="facts-img">
              </div>
              <div class="ts-facts-content">
                <h2 class="ts-facts-num"><span class="counterUp" data-count="1789">0</span></h2>
                <h3 class="ts-facts-title">Total Projects</h3>
              </div>
          </div><!-- Col end -->

          <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-sm-0">
              <div class="ts-facts-img">
                <img loading="lazy" src="<?= base_url('pages_assets/images/icon-image/fact2.png'); ?>" alt="facts-img">
              </div>
              <div class="ts-facts-content">
                <h2 class="ts-facts-num"><span class="counterUp" data-count="647">0</span></h2>
                <h3 class="ts-facts-title">Staff Members</h3>
              </div>
          </div><!-- Col end -->

          <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
              <div class="ts-facts-img">
                <img loading="lazy" src="<?= base_url('pages_assets/images/icon-image/fact3.png'); ?>" alt="facts-img">
              </div>
              <div class="ts-facts-content">
                <h2 class="ts-facts-num"><span class="counterUp" data-count="4000">0</span></h2>
                <h3 class="ts-facts-title">Hours of Work</h3>
              </div>
          </div><!-- Col end -->

          <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
              <div class="ts-facts-img">
                <img loading="lazy" src="<?= base_url('pages_assets/images/icon-image/fact4.png'); ?>" alt="facts-img">
              </div>
              <div class="ts-facts-content">
                <h2 class="ts-facts-num"><span class="counterUp" data-count="44">0</span></h2>
                <h3 class="ts-facts-title">Countries Experience</h3>
              </div>
          </div><!-- Col end -->

        </div> <!-- Facts end -->
    </div>
    <!--/ Content row end -->
  </div>
  <!--/ Container end -->
</section><!-- Facts end -->

<section id="news" class="news">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mb-5 mb-lg-0">
        <?php foreach($beritaTerbaru as $bt2): ?>
          <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img class="card-img" src="<?= base_url('uploads/'.$bt2['sampul']); ?>" alt="<?= $bt2['sampul']; ?>">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><a href="<?= route_to('pages.detail.berita',$bt2['slug']); ?>"><?= $bt2['judul']; ?></a></h5>
                  <p class="card-text"><?= implode(' ', array_slice(explode(' ', $bt2['deskripsi']), 0, 15)).'... </p>'; ?></p>
                  <p class="card-text"><small class="text-muted tgl-publish" data-date="<?= $bt2['published_at']; ?>"><i class="far fa-calendar"></i>&nbsp;</small></p>
                  <a href="<?= route_to('pages.detail.berita',$bt2['slug']); ?>" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div> <!--/  end col berita -->
      <div class="col-lg-4">
        <div class="sidebar sidebar-right">
            <div class="widget">
              <h3 class="widget-title">Prakiraan cuaca</h3>
              <a class="weatherwidget-io" href="https://forecast7.com/en/0d54116d42/east-kalimantan/" data-label_1="KALIMANTAN TIMUR" data-label_2="WEATHER" data-theme="pure" >CUACA KALIMANTAN TIMUR</a>
            </div>
            <div class="widget">
              <h3 class="widget-title">Video BPBD</h3>
                <?php foreach($videoTerbaru as $vt): ?>
                  <div class="ts-service-box">
                      <div class="ts-service-image-wrapper">
                        <iframe class="embed-responsive-item" src="<?= $vt['url']; ?>"  allowfullscreen></iframe>
                      </div>
                      <div class="d-flex">
                        <div class="ts-service-info">
                            <h3 class="service-box-title"><a href="<?= route_to('pages.detail.video',$vt['slug']); ?>"><?= $vt['judul']; ?></a></h3>
                            <p class="tgl-publish" data-date="<?= $vt['published_at']; ?>"><i class="far fa-calendar"></i>&nbsp;</p>
                            <a class="learn-more d-inline-block" href="<?= route_to('pages.detail.video',$vt['slug']); ?>" aria-label="service-details"><i class="fa fa-caret-right"></i>Lihat Video</a>
                        </div>
                      </div>
                  </div><!-- Service1 end -->
                  <hr>
                <?php endforeach; ?>
            </div>
        </div>
      </div>
    </div>
    <!--/ Content row end -->

    <div class="general-btn text-center mt-4">
        <a class="btn btn-primary" href="news-left-sidebar.html">Berita Terbaru Lainnya</a>
    </div>

  </div>
  <!--/ Container end -->
</section>
<!--/ News end -->
<?= $this->endSection(); ?>
<?= $this->section('js'); ?>
<script>
$(function () {
  let publishDate = $('.tgl-publish')
  publishDate.each(function(index){
	  $(this).append(moment($(this).data('date')).format('dddd, d MMMM YYYY H:mm')+' WITA')
  })
})
</script>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
<?= $this->endSection(); ?>


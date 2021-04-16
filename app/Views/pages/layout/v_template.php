<?php 
use App\Models\KontakModel;
$this->kontakModel = new KontakModel(); 
$tempKontak = $this->kontakModel->first();
?>
<!DOCTYPE html>
<html lang="en">
<?= $this->include('pages/layout/partials/temp_head'); ?>
<body>
  <div class="body-inner">

    <div id="top-bar" class="top-bar">
        <div class="container">
          <div class="row">
              <div class="col-lg-8 col-md-8">
                <ul class="top-info text-center text-md-left">
                    <li><i class="fas fa-map-marker-alt"></i> <p class="info-text"><?= $tempKontak['alamat']; ?></p>
                    </li>
                </ul>
              </div>
              <!--/ Top info end -->
  
              <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
                <ul class="list-unstyled">
                    <li>
                      <a title="Facebook" href="<?= $tempKontak['facebook']; ?>">
                          <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                      </a>
                      <a title="Twitter" href="<?= $tempKontak['twitter']; ?>">
                          <span class="social-icon"><i class="fab fa-twitter"></i></span>
                      </a>
                      <a title="Instagram" href="<?= $tempKontak['instagram']; ?>">
                          <span class="social-icon"><i class="fab fa-instagram"></i></span>
                      </a>
                      <a title="Linkdin" href="<?= $tempKontak['youtube']; ?>">
                          <span class="social-icon"><i class="fab fa-youtube"></i></span>
                      </a>
                    </li>
                </ul>
              </div>
              <!--/ Top social end -->
          </div>
          <!--/ Content row end -->
        </div>
        <!--/ Container end -->
    </div>
    <!--/ Topbar end -->
<!-- Header start -->
<header id="header" class="header-one">
	<?= $this->include('pages/layout/partials/temp_navbar'); ?>
  <!--/ Navigation end -->
</header>
<!--/ Header end -->


	<?= $this->renderSection('content'); ?>
	<?= $this->include('pages/layout/partials/temp_footer'); ?>
  	<?= $this->include('pages/layout/partials/temp_script'); ?>
  </div><!-- Body inner end -->
</body>
</html>
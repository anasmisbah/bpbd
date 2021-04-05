
<!DOCTYPE html>
<html lang="en">
<?= $this->include('pages/layout/partials/temp_head'); ?>
<body>

	<div class="body-inner">

		<div id="top-bar" class="top-bar">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
						<ul class="top-info">
							<li><i class="fa fa-map-marker">&nbsp;</i>
								<p class="info-text">Jl. MT. Haryono No.46, Air Putih, Kota Samarinda</p>
							</li>
						</ul>
					</div>
					<!--/ Top info end -->

					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 top-social text-right">
						<ul class="unstyled">
							<li>
								<a title="Facebook" href="https://facebbok.com/themefisher.com">
									<span class="social-icon"><i class="fa fa-facebook"></i></span>
								</a>
								<a title="Twitter" href="https://twitter.com/themefisher.com">
									<span class="social-icon"><i class="fa fa-twitter"></i></span>
								</a>
								<a title="Instagram" href="https://instagram.com/themefisher.com">
									<span class="social-icon"><i class="fa fa-instagram"></i></span>
								</a>
								<a title="Linkdin" href="https://github.com/themefisher.com">
									<span class="social-icon"><i class="fa fa-github"></i></span>
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
			<div class="container">
				<div class="row">
					<div class="logo-area clearfix">
						<div class="logo col-xs-12 col-md-3">
							<a href="index.html">
								<img src="<?= base_url('pages_assets/images/logo_app.png'); ?>" alt="">
							</a>
						</div><!-- logo end -->

						<div class="col-xs-12 col-md-9 header-right">
							<ul class="top-info-box">
								<li>
									<div class="info-box">
										<div class="info-box-content">
											<p class="info-box-title">No.Telepon</p>
											<p class="info-box-subtitle">(0541) 741040</p>
										</div>
									</div>
								</li>
								<li>
									<div class="info-box">
										<div class="info-box-content">
											<p class="info-box-title">Alamat email</p>
											<p class="info-box-subtitle">bpbd@kaltimprov.go.id</p>
										</div>
									</div>
								</li>
								<li class="last">
									<div class="info-box last">
										<div class="info-box-content">
											<p class="info-box-title">Global Certificate</p>
											<p class="info-box-subtitle">ISO 9001:2017</p>
										</div>
									</div>
								</li>
								<li class="header-get-a-quote">
									<a class="btn btn-primary" href="contact.html">Tanggap Tangkas Tangguh</a>
								</li>
							</ul><!-- Ul end -->
						</div><!-- header right end -->
					</div><!-- logo area end -->

				</div><!-- Row end -->
			</div><!-- Container end -->

            <!-- include navbar -->
            <?= $this->include('pages/layout/partials/temp_navbar'); ?>
		</header>
		<!--/ Header end -->

		
        <?= $this->renderSection('content'); ?>



        <?= $this->include('pages/layout/partials/temp_footer'); ?>
        <?= $this->include('pages/layout/partials/temp_script'); ?>
</body>

</html>
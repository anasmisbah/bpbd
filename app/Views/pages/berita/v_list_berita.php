<?= $this->extend('pages/layout/v_template'); ?>
<?= $this->section('content'); ?>
<div id="banner-area" class="banner-area" style="background-image:url(pages_assets/images/banner/banner1.jpg)">
      <div class="banner-text">
         <div class="container">
            <div class="row">
               <div class="col-xs-12">
                  <div class="banner-heading">
                     <h1 class="banner-title">News</h1>
                     <ol class="breadcrumb">
                        <li>Home</li>
                        <li>News</li>
                        <li><a href="#">News Left Sidebar</a></li>
                     </ol>
                  </div>
               </div><!-- Col end -->
            </div><!-- Row end -->
         </div><!-- Container end -->
      </div><!-- Banner text end -->
   </div><!-- Banner area end --> 


   <section id="main-container" class="main-container">
		<div class="container">
			<div class="row">

				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

					<div class="sidebar sidebar-left">


						<div class="widget recent-posts">
							<h3 class="widget-title">Berita Terbaru</h3>
							<ul class="unstyled clearfix">
							<?php foreach($beritaTerbaru as $bt): ?>
								<li>
									<div class="posts-thumb pull-left"> 
											<a href="news-single.html"><img alt="img" src="<?= base_url('uploads/'.$bt['sampul']); ?>"></a>
									</div>
									<div class="post-info">
										<h4 class="entry-title">
											<a href="news-single.html"><?= $bt['judul']; ?></a>
										</h4>
									</div>
									<div class="clearfix"></div>
								</li><!-- 1st post end-->
							<?php endforeach; ?>

		               </ul>
							
						</div><!-- Recent post end -->

						<div class="widget widget-tags">
							<h3 class="widget-title">Kategori </h3>

							<ul class="unstyled clearfix">
                            <?php foreach($kategori as $kt): ?>
		                        <li><a href="#"><?= $kt['nama']; ?></a></li>
                            <?php endforeach; ?>
			            </ul>
						</div><!-- Tags end -->


					</div><!-- Sidebar end -->
				</div><!-- Sidebar Col end -->

				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<?php foreach($berita as $br): ?>
						<div class="post">
							<div class="post-media post-image">
								<img src="<?= base_url('uploads/'.$br['sampul']); ?>" class="img-responsive" alt="">
							</div>

							<div class="post-body">
								<div class="entry-header">
									<div class="post-meta">
										<span class="post-author">
											<i class="fa fa-user"></i><a href="#"> <?= $br['nama']; ?></a>
										</span>
										<span class="post-cat">
												<i class="fa fa-folder-open"></i><a href="#"> News</a>
										</span>
										<span class="post-meta-date tgl-publish" data-date="<?= $br['published_at']; ?>">
											<i class="fa fa-calendar"></i>
										</span>
									</div>
									<h2 class="entry-title">
										<a href="news-single.html"><?= $br['judul']; ?></a>
									</h2>
								</div><!-- header end -->

								<div class="entry-content">
									<?= implode(' ', array_slice(explode(' ', $br['deskripsi']), 0, 50)).'... </p>'; ?>
								</div>

								<div class="post-footer">
									<a href="news-single.html" class="btn btn-primary">Continue Reading</a>
								</div>

							</div><!-- post-body end -->
						</div><!-- 1st post end -->
					<?php endforeach; ?>
				<div class="paging">
					<?= $pager->links('berita','berita_pagination') ?>
	          	</div>
				  
				</div><!-- Content Col end -->

			</div><!-- Main row end -->

		</div><!-- Container end -->
	</section><!-- Main container end -->
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
<?= $this->endSection(); ?>
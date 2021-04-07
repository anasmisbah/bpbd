<?= $this->extend('pages/layout/v_template'); ?>
<?= $this->section('content'); ?>
<section id="main-container" class="main-container">
      <div class="container">
         <div class="row">

            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

               <div class="post-content post-single">
                  <div class="post-media post-image image-angle">
                     <img src="<?= base_url('uploads/'.$berita['sampul']); ?>" class="img-responsive" alt="">
                  </div>

                  <div class="post-body">
                     <div class="entry-header">
                        <div class="post-meta">
                           <span class="post-author">
                              <i class="fa fa-user"></i><a href="#"> <?= $berita['nama']; ?></a>
                           </span>
                           <span class="post-cat">
                              <i class="fa fa-folder-open"></i><a href="#"> Berita</a>
                           </span>
                           <span class="post-meta-date" id="tgl-publish"><i class="fa fa-calendar"></i></span>
                           <span class="post-comment"><i class="fa fa-eye"></i><a href="#"> <?= $berita['dilihat']; ?></a></span>
                        </div>
                        <h2 class="entry-title">
                           <a href="#"><?= $berita['judul']; ?></a>
                        </h2>
                     </div><!-- header end -->

                     <div class="entry-content">
						<?= $berita['deskripsi']; ?>
                     </div>

                     <div class="tags-area clearfix">
                        <div class="post-tags pull-left">
						<?php foreach($berita['kategori'] as $ktgr): ?>
                           <a href="#"><?= $ktgr['nama']; ?></a>
						<?php endforeach; ?>
                        </div>
                        <div class="share-items pull-right">
                           <ul class="post-social-icons unstyled">
                              <li class="social-icons-head">Share:</li>
                              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                           </ul>
                        </div>
                     </div>
                     
                  </div><!-- post-body end -->
               </div><!-- post content end -->
            </div><!-- Content Col end -->


            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

               <div class="sidebar sidebar-right">


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

         </div><!-- Main row end -->

      </div><!-- Conatiner end -->
   </section><!-- Main container end -->
<?= $this->endSection(); ?>
<?= $this->section('js'); ?>
<script>
$(function () {
  let publishDate = $('#tgl-publish')
  publishDate.append(moment(publishDate.data('date')).format('dddd, d MMMM YYYY H:mm')+' WITA')
})
</script>
<?= $this->endSection(); ?>
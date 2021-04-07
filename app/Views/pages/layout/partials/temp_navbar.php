<div class="bg-white">
    <div class="container">
      <div class="logo-area">
          <div class="row align-items-center">
            <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                <a class="d-block" href="index.html">
                  <img loading="lazy" src="<?= base_url('pages_assets/images/logo_app_bg.png'); ?>" width="200" alt="Constra">
                </a>
            </div><!-- logo end -->
  
            <div class="col-lg-9 header-right">
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
  </div>

  <div class="site-navigation">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div id="navbar-collapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav mr-auto">
                      <li class="nav-item active"><a class="nav-link" href="<?= route_to('pages.beranda'); ?>">Beranda</a></li>
                      <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Profil <i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Sejarah BPBD Kaltim</a></li>
                            <li><a href="#">Visi & Misi BPBD Kaltim</a></li>
                            <li><a href="#">Tugas & Fungsi</a></li>
                            <li><a href="#">Struktur Organisasi</a></li>
                          </ul>
                      </li>
                      <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Layanan <i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a target='_BLANK' href='http://lpse.bnpb.go.id/eproc4'>LPSE</a></li>
                            <li><a target='_BLANK' href='https://lapor.go.id/'>Lapor! </a></li>
                            <li><a target='_BLANK' href='http://dibi.bnpb.go.id/'>DIBI BNPB </a></li>
                            <li><a target='_BLANK' href='http://tv.bnpb.go.id/'>BNPB TV </a></li>
                          </ul>
                      </li>
                      <li class="nav-item"><a class="nav-link" href="<?= route_to('pages.list.berita'); ?>">Berita</a></li>
                      <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Informasi Publik <i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Publikasi</a></li>
                            <li><a href="#">Kerjasama</a></li>
                            <li><a href="#">Buku</a></li>
                            <li><a href="#">Produk Hukum</a></li>
                          </ul>
                      </li>
                      <li class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pengetahuan Bencana <i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Definisi Bencana</a></li>
                            <li><a href="#">Potensi Ancaman Bencana</a></li>
                            <li><a href="#">Sistem Penanggulangan Bencana</a></li>
                          </ul>
                      </li>
                      <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
                    </ul>
                </div>
              </nav>
          </div>
          <!--/ Col end -->
        </div>
        <!--/ Row end -->

        <div class="nav-search">
          <span id="search"><i class="fa fa-search"></i></span>
        </div><!-- Search end -->

        <div class="search-block" style="display: none;">
          <label for="search-field" class="w-100 mb-0">
            <input type="text" class="form-control" id="search-field" placeholder="Cari berita dan informasi seputar BPBP KALTIM">
          </label>
          <span class="search-close">&times;</span>
        </div><!-- Site search end -->
    </div>
    <!--/ Container end -->

  </div>
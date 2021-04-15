  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= route_to('admin.dashboard'); ?>" class="brand-link">
      <img src="<?= base_url('admin_assets/dist/img/bpbd-logo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin BPBD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('admin_assets/dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= session()->get('nama'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= route_to('admin.dashboard'); ?>" class="nav-link" id="nav-dashboard">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda 
              </p>
            </a>
          </li>
          <li class="nav-header">Menu</li>
          <li class="nav-item">
            <a href="<?= route_to('kategori.index'); ?>" class="nav-link" id="nav-kategori">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= route_to('berita.index'); ?>" class="nav-link" id="nav-berita">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Berita
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= route_to('video.index'); ?>" class="nav-link" id="nav-video">
              <i class="nav-icon fas fa-video"></i>
              <p>
                Video
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= route_to('banner.index'); ?>" class="nav-link" id="nav-banner">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Banner
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= route_to('gallery.index'); ?>" class="nav-link" id="nav-gallery">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= route_to('buku.index'); ?>" class="nav-link" id="nav-buku">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Buku
              </p>
            </a>
          </li>
          <li class="nav-item"  id="list-profil">
            <a href="#" class="nav-link" id="nav-profil">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Profil
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= route_to('profil.detail',1); ?>" class="nav-link" id="subnav-profil-1">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sejarah BPBD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= route_to('profil.detail',2); ?>" class="nav-link" id="subnav-profil-2">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Visi dan Misi BPBD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= route_to('profil.detail',3); ?>" class="nav-link" id="subnav-profil-3">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tugas dan Fungsi BPBD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= route_to('profil.detail',4); ?>" class="nav-link" id="subnav-profil-4">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Struktur Organisasi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item"  id="list-bencana">
            <a href="#" class="nav-link" id="nav-bencana">
              <i class="nav-icon fas fa-bookmark"></i>
              <p style="font-size:0.95em">
                Pengetahuan Bencana
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= route_to('bencana.detail',1); ?>" class="nav-link" id="subnav-bencana-1">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Definisi Bencana</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= route_to('bencana.detail',2); ?>" class="nav-link" id="subnav-bencana-2">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="font-size:0.95em">Sistem Penanggulangan Bencana</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= route_to('bencana.detail',3); ?>" class="nav-link" id="subnav-bencana-3">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Potensi Ancaman Bencana</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
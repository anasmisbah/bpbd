  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" >
                     <!-- Profile Image -->
              <div class="card" style="margin-bottom:0px">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url('admin_assets/dist/img/user4-128x128.jpg'); ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= session()->get('nama'); ?></h3>

                <p class="text-muted text-center">Administrator</p>
                <a href="#" class="btn btn-danger btn-block mt-3" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i> <b>Logout</b></a>
                  <form id="logout-form" action="<?= route_to('logout.process'); ?>" method="POST" style="display: none;">
                    <?= csrf_field(); ?>
                  </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
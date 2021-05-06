<?= $this->extend('admin/layout/v_template'); ?>

<?= $this->section('css'); ?>
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url('admin_assets/plugins/daterangepicker/daterangepicker.css'); ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('admin_assets/plugins/summernote/summernote-bs4.min.css'); ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url('admin_assets/plugins/jqvmap/jqvmap.min.css'); ?>">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('admin_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('admin_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
<?= $this->endSection(); ?>
<?= $this->section('content-header'); ?>
    <div class="col-sm-6">
        <h1 class="m-0">Beranda</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="<?= route_to('admin.dashboard'); ?>">Beranda</a></li>
        </ol>
    </div><!-- /.col -->
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-newspaper"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Berita</span>
                <span class="info-box-number">
                  <?= $totalBerita; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-video"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Video</span>
                <span class="info-box-number"><?= $totalVideo; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-images"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Galeri</span>
                <span class="info-box-number"><?= $totalGallery; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-tags"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Kategori</span>
                <span class="info-box-number"><?= $totalKategori; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
              <!-- solid sales graph -->
              <div class="card bg-gradient-info">
                <div class="card-header border-0">
                  <h3 class="card-title">
                    <i class="fas fa-th mr-1"></i>
                    Grafik Pengunjung Website
                  </h3>

                  <div class="card-tools">
                    <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <canvas class="chart" id="visitor-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Chart Data</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Chart Data</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="lineChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
            <!-- PIE CHART -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kategori Berita</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChartKategori" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Kalender
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pengguna</span>
                <span class="info-box-number"><?= $totalUser; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-file"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">File Produk Hukum</span>
                <span class="info-box-number"><?= $totalFilehukum; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Buku</span>
                <span class="info-box-number"><?= $totalBuku; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="far fa-comment"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Kerjasama</span>
                <span class="info-box-number">0</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <!-- PRODUCT LIST -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Berita Terbaru</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="products-list product-list-in-card pl-2 pr-2">
                  <?php foreach($beritaTerbaru as $bt): ?>
                      <li class="item">
                        <div class="product-img">
                          <img src="<?= base_url('uploads/'.$bt['sampul']); ?>" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                          <a href="<?= route_to('berita.detail',$bt['id']); ?>" class="product-title"><?= implode(' ', array_slice(explode(' ', $bt['judul']), 0, 5)).'...'; ?>
                          <span class="product-description">
                          <?= implode(' ', array_slice(explode(' ', $bt['deskripsi']), 0, 5)).'...'; ?>
                          </span>
                        </div>
                      </li>
                      <!-- /.item -->
                  <?php endforeach; ?>
                  </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href="<?= route_to('berita.index'); ?>" class="uppercase">Berita terbaru lainnya</a>
                </div>
                <!-- /.card-footer -->
              </div>
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Buku Terbaru</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="products-list product-list-in-card pl-2 pr-2">
                  <?php foreach($bukuTerbaru as $bt): ?>
                      <li class="item">
                        <div class="product-img">
                          <img src="<?= base_url('uploads/'.$bt['sampul']); ?>" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                          <a href="<?= route_to('berita.detail',$bt['id']); ?>" class="product-title"><?= implode(' ', array_slice(explode(' ', $bt['judul']), 0, 5)).'...'; ?>
                          <span class="product-description">
                          <?= implode(' ', array_slice(explode(' ', $bt['deskripsi']), 0, 5)).'...'; ?>
                          </span>
                        </div>
                      </li>
                      <!-- /.item -->
                  <?php endforeach; ?>
                  </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href="<?= route_to('buku.index'); ?>" class="uppercase">Buku terbaru lainnya</a>
                </div>
                <!-- /.card-footer -->
              </div>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Pengguna Terakhir</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="users-list clearfix">
                    <?php foreach($users as $user): ?>
                      <li>
                        <img src="<?= base_url('uploads/'.$user['avatar']); ?>" alt="User Image">
                        <a class="users-list-name" href="#"><?= $user['nama']; ?></a>
                        <span class="users-list-date last-date" data-date="<?= $user['last_login']; ?>"></span>
                      </li>
                    <?php endforeach; ?>

                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href="<?= route_to('user.index'); ?>">Lihat semua pengguna</a>
                </div>
                <!-- /.card-footer -->
              </div>
              
            </div>
          <!-- /.col -->
        </div>


  <?= $this->endSection(); ?>
<?= $this->section('js'); ?>
<!-- ChartJS -->
<script src="<?= base_url('admin_assets/plugins/chart.js/Chart.min.js'); ?>"></script>
<!-- Sparkline -->
<script src="<?= base_url('admin_assets/plugins/sparklines/sparkline.js'); ?>"></script>
<!-- JQVMap -->
<script src="<?= base_url('admin_assets/plugins/jqvmap/jquery.vmap.min.js'); ?>"></script>
<script src="<?= base_url('admin_assets/plugins/jqvmap/maps/jquery.vmap.usa.js'); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('admin_assets/plugins/jquery-knob/jquery.knob.min.js'); ?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('admin_assets/plugins/moment/moment.min.js'); ?>"></script>
<script src="<?= base_url('admin_assets/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('admin_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
<!-- Summernote -->
<script src="<?= base_url('admin_assets/plugins/summernote/summernote-bs4.min.js'); ?>"></script>

<script>
moment.locale('id')
const pieChartCanvasKategori = $('#pieChartKategori').get(0).getContext('2d')
const lineChartCanvas = $('#lineChart').get(0).getContext('2d')
const lineChartTwoCanvas = $('#lineChart2').get(0).getContext('2d')
const visitorGraphChartCanvas = $('#visitor-chart').get(0).getContext('2d')
const urlData = "<?= route_to('data.chart'); ?>"
const setBg = () => {
  const randomColor = Math.floor(Math.random()*16777215).toString(16);
  return "#" + randomColor;
}
$.ajax({
  type: 'get',
  url: urlData,
  success: function (data) {
    console.log(data);
    
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    let bgColor = data.datakategori.data.map((data) => setBg())
    var pieChartKategoriData = {
      labels: data.datakategori.labels,
      datasets: [
        {
          data: data.datakategori.data,
          backgroundColor : bgColor,
        }
      ]
    }
    new Chart(pieChartCanvasKategori, {
      type: 'pie',
      data: pieChartKategoriData,
      options: pieOptions
    })

    
    var lineChartOptions ={
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: 'top',
        },
        
      }
    }
    let datasetLineChart = data.dataChartLine.dataset.map(function (data){
      let color = setBg()
      return {
          label               : data.label,
          borderColor         : color,
          backgroundColor     : `${color}00`,
          pointRadius         : false,
          data                : data.data
        };
    });
    var lineChartData = {
      labels  : data.dataChartLine.labels,
      datasets: datasetLineChart
    }

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })
    let datasetLineChartTwo = data.dataChartLineTwo.dataset.map(function (data){
      let color = setBg()
      return {
          label               : data.label,
          borderColor         : color,
          backgroundColor     : `${color}00`,
          pointRadius         : false,
          data                : data.data
        };
    });
    var lineChartDataTwo = {
      labels  : data.dataChartLineTwo.labels,
      datasets: datasetLineChartTwo
    }

    var lineChart = new Chart(lineChartTwoCanvas, {
      type: 'line',
      data: lineChartDataTwo,
      options: lineChartOptions
    })

    // Sales graph chart
    

    var visitorGraphChartData = {
      labels: data.dataChartVisitor.labels,
      datasets: [
        {
          label: 'Pengunjung',
          fill: false,
          borderWidth: 2,
          lineTension: 0,
          spanGaps: true,
          borderColor: '#efefef',
          pointRadius: 3,
          pointHoverRadius: 7,
          pointColor: '#efefef',
          pointBackgroundColor: '#efefef',
          data: data.dataChartVisitor.data
        }
      ]
    }

    var visitorGraphChartOptions = {
      maintainAspectRatio: false,
      responsive: true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          ticks: {
            fontColor: '#efefef'
          },
          gridLines: {
            display: false,
            color: '#efefef',
            drawBorder: false
          }
        }],
        yAxes: [{
          ticks: {
            stepSize: 5000,
            fontColor: '#efefef'
          },
          gridLines: {
            display: true,
            color: '#efefef',
            drawBorder: false
          }
        }]
      }
    }

    var salesGraphChart = new Chart(visitorGraphChartCanvas, { // lgtm[js/unused-local-variable]
      type: 'line',
      data: visitorGraphChartData,
      options: visitorGraphChartOptions
    })

  }
})

let lastLoginDate = $('.last-date')

lastLoginDate.each(function(index){
  if ($(this).data('date')) {
    $(this).append(moment($(this).data('date')).startOf('hour').fromNow())
  }
})  
    
    // var barChartData = $.extend(true, {}, areaChartData)
    // var temp0 = areaChartData.datasets[0]
    // var temp1 = areaChartData.datasets[1]
    // barChartData.datasets[0] = temp1
    // barChartData.datasets[1] = temp0
// The Calender
$('#calendar').datetimepicker({
    format: 'L',
    inline: true
  })
</script>
<?= $this->endSection(); ?>
  

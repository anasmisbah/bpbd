<?php 
use App\Models\KontakModel;
use App\Models\VisitorModel;

$this->kontakModel = new KontakModel(); 
$this->visitorModel = new VisitorModel(); 

$tempKontak = $this->kontakModel->first();
$total = $this->visitorModel->countAll();
?>
<footer id="footer" class="footer bg-overlay">
    <div class="footer-main">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-3 col-md-6 footer-widget footer-about">
            <h3 class="widget-title">About Us</h3>
            <img loading="lazy" class="footer-logo" src="<?= base_url('pages_assets/images/logo_app_bg.png'); ?>" alt="Constra">
            <p>BPBD Provinsi Kalimantan Timur Merupakan Lembaga Teknis Yang Mempunyai Tugas Untuk Melakukan Koordinasi Dan Penyelenggaraan Serta Pelayanan Administrasi Di Bidang Penanggulangan Bencana.</p>
            <div class="footer-social">
              <ul>
                <li><a href="<?= $tempKontak['facebook']; ?>" aria-label="Facebook"><i
                      class="fab fa-facebook-f"></i></a></li>
                <li><a href="<?= $tempKontak['twitter']; ?>" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                </li>
                <li><a href="<?= $tempKontak['instagram']; ?>" aria-label="Instagram"><i
                      class="fab fa-instagram"></i></a></li>
                <li><a href="<?= $tempKontak['youtube']; ?>" aria-label="Github"><i class="fab fa-youtube"></i></a></li>
              </ul>
            </div><!-- Footer social end -->
          </div><!-- Col end -->

          <div class="col-lg-3 col-md-6 footer-widget mt-5 mt-md-0">
            <h3 class="widget-title">Alamat & Jam Pelayanan</h3>
            <div class="working-hours">
              Jl. MT. Haryono No.46, Air Putih, Kec. Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75124
              <br><br> Senin - Kamis: <span class="text-right">07:30 - 16:00 </span>
              <br> Jumat: <span class="text-right">07:30 - 11:30</span>
              <br> Sabtu - Minggu: <span class="text-right">Tutup</span>
            </div>
          </div><!-- Col end -->

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
            <h3 class="widget-title">Profil</h3>
            <ul class="list-arrow">
                <li><a href="<?= route_to('pages.detail.profil','sejarah-bpbd-provinsi-kaltim'); ?>">Sejarah BPBD Kaltim</a></li>
                <li><a href="<?= route_to('pages.detail.profil','visi-dan-misi-bpbd-provinsi-kaltim'); ?>">Visi & Misi BPBD Kaltim</a></li>
                <li><a href="<?= route_to('pages.detail.profil','tugas-dan-fungsi-bpbd-provinsi-kaltim'); ?>">Tugas & Fungsi</a></li>
                <li><a href="<?= route_to('pages.detail.profil','struktur-organisasi-bpbd-provinsi-kaltim'); ?>">Struktur Organisasi</a></li>
            </ul>
          </div><!-- Col end -->
          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
            <h3 class="widget-title">Statistik Pengunjung <i class="fas fa-chart-line"></i></h3>
            <div class="tick" data-value="<?= sprintf("%08d", $total); ?>" id="visitor">
              <span id="my-flip" data-view="flip"></span>
            </div>
            <div class="working-hours">
              <br>Pengunjung hari ini: <span class="badge badge-danger text-right mt-2" id="today-visitor"></span>
              <br> Total pengunjung: <span class="badge badge-primary text-right mt-2" id="total-visitor"></span>
              <br> Pengunjung online: <span class="badge badge-warning text-right mt-2" id="online-visitor"></span>
            </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Footer main end -->

    <div class="copyright">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="copyright-info">
              <span>Copyright &copy; 
                  2021, Badan Penanggulangan Bencana Daerah PROVINSI KALIMANTAN TIMUR</span>
            </div>
          </div>
        </div><!-- Row end -->

        <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
          <button class="btn btn-primary" title="Back to Top">
            <i class="fa fa-angle-double-up"></i>
          </button>
        </div>

      </div><!-- Container end -->
    </div><!-- Copyright end -->
  </footer><!-- Footer end -->
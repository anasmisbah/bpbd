<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\KategoriModel;
use App\Models\VideoModel;
use App\Models\UserModel;
use App\Models\BukuModel;
use App\Models\FilehukumModel;
use App\Models\KategoriberitaModel;
use App\Models\GalleryModel;
use CodeIgniter\I18n\Time;
class DashboardController extends BaseController
{
	protected $beritaModel;
	protected $kategoriModel;
	protected $videoModel;
	protected $userModel;
	protected $bukuModel;
	protected $filehukumModel;
	protected $kategoriberitaModel;
	protected $galleryModel;
	public function __construct()
	{
		$this->beritaModel = new BeritaModel(); 
		$this->kategoriModel = new KategoriModel(); 
		$this->videoModel = new VideoModel(); 
		$this->userModel = new UserModel(); 
		$this->bukuModel = new BukuModel(); 
		$this->filehukumModel = new FilehukumModel(); 
		$this->kategoriberitaModel = new KategoriberitaModel(); 
		$this->galleryModel = new GalleryModel(); 
	}
	public function dashboard()
	{
		$totalBerita = $this->beritaModel->countAll();
		$totalVideo = $this->videoModel->countAll();
		$totalKategori = $this->kategoriModel->countAll();
		$totalUser = $this->userModel->countAll();
		$totalBuku = $this->bukuModel->countAll();
		$totalFilehukum = $this->filehukumModel->countAll();
		$totalGallery = $this->galleryModel->countAll();

		$allKategori = $this->kategoriModel->findAll();
		$beritaTerbaru = $this->beritaModel->getLatestBerita();
		$bukuTerbaru = $this->bukuModel->getLatestBuku();

		$users = $this->userModel->latestUserLogin();

		$data = [
			'totalBerita'=>$totalBerita,
			'totalVideo'=>$totalVideo,
			'totalKategori'=>$totalKategori,
			'totalUser'=>$totalUser,
			'totalBuku'=>$totalBuku,
			'totalFilehukum'=>$totalFilehukum,
			'allKategori'=>$allKategori,
			'beritaTerbaru'=>$beritaTerbaru,
			'bukuTerbaru'=>$bukuTerbaru,
			'totalGallery'=>$totalGallery,
			'users'=>$users,
		];
		return view('admin/v_dashboard',$data);
	}

	public function dataChart()
	{
		// get data chart kategori
		$allKategori = $this->kategoriModel->findAll();
		$dataChartKategori = [];
		foreach ($allKategori as $i => $kategori) {
			$dataChartKategori['labels'][] = $kategori['nama'];
			$dataChartKategori['data'][] = $this->kategoriberitaModel->where('kategori_id',$kategori['id'])->countAllResults();
		}

		$dateNow = new Time('now');
		$dataChartLine = [];
		$dataChartLine['labels']=['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
		// dd($dateNow->getYear());
		// get Data year berita
		$dataChartLine['dataset'][0]['label'][]= 'Berita';
        for ($i=0; $i < count($dataChartLine['labels']); $i++) {
            $totalMonth = $this->beritaModel->where('YEAR(published_at)', $dateNow->getYear())->where('month(published_at)', $i+1)->countAllResults();
            $dataChartLine['dataset'][0]['data'][] = $totalMonth;
        }
		// get Data Video
		$dataChartLine['dataset'][1]['label'][]= 'Video';
        for ($i=0; $i < count($dataChartLine['labels']); $i++) {
            $totalMonth = $this->videoModel->where('YEAR(published_at)', $dateNow->getYear())->where('month(published_at)', $i+1)->countAllResults();
            $dataChartLine['dataset'][1]['data'][] = $totalMonth;
        }
		// get Data Gallery
		$dataChartLine['dataset'][2]['label'][]= 'Galeri';
        for ($i=0; $i < count($dataChartLine['labels']); $i++) {
            $totalMonth = $this->galleryModel->where('YEAR(published_at)', $dateNow->getYear())->where('month(published_at)', $i+1)->countAllResults();
            $dataChartLine['dataset'][2]['data'][] = $totalMonth;
        }

		$dataChartLineTwo = [];
		$dataChartLineTwo['labels']=['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
		// dd($dateNow->getYear());
		// get Data year file produk hukum
		$dataChartLineTwo['dataset'][0]['label'][]= 'File produk hukum';
        for ($i=0; $i < count($dataChartLineTwo['labels']); $i++) {
            $totalMonth = $this->filehukumModel->where('YEAR(published_at)', $dateNow->getYear())->where('month(published_at)', $i+1)->countAllResults();
            $dataChartLineTwo['dataset'][0]['data'][] = $totalMonth;
        }
		// get Data Buku
		$dataChartLineTwo['dataset'][1]['label'][]= 'Buku';
        for ($i=0; $i < count($dataChartLineTwo['labels']); $i++) {
            $totalMonth = $this->bukuModel->where('YEAR(published_at)', $dateNow->getYear())->where('month(published_at)', $i+1)->countAllResults();
            $dataChartLineTwo['dataset'][1]['data'][] = $totalMonth;
        }

		$data = [
			'status'=>'Berhasil',
			'datakategori'=>$dataChartKategori,
			'dataChartLine'=>$dataChartLine,
			'dataChartLineTwo'=>$dataChartLineTwo,
		];

		return $this->response->setJSON($data);
	}
}

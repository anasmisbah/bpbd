<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\VideoModel;
use App\Models\BannerModel;
use App\Models\GalleryModel;
use App\Models\PhotogalleryModel;
use App\Models\LayananModel;
use App\Models\ItemlayananModel;
use App\Models\TentangkamiModel;
use App\Models\KelebihankamiModel;
use App\Models\NilaikamiModel;

use App\Models\VisitorModel;

class HomeController extends BaseController
{
	protected $beritaModel;
	protected $videoModel;
	protected $bannerModel;
	protected $galleryModel;
	protected $photogalleryModel;
	protected $layananModel;
	protected $itemlayananModel;
	protected $tentangkamiModel;
	protected $kelebihankamiModel;
	protected $nilaikamiModel;

	protected $visitorModel;

	public function __construct()
	{
		$this->beritaModel = new BeritaModel(); 
		$this->videoModel = new VideoModel(); 
		$this->bannerModel = new BannerModel(); 
		$this->galleryModel = new GalleryModel(); 
		$this->photogalleryModel = new PhotogalleryModel();
		$this->layananModel = new LayananModel();  
		$this->itemlayananModel = new ItemlayananModel(); 
		$this->tentangkamiModel = new TentangkamiModel(); 
		$this->kelebihankamiModel = new KelebihankamiModel(); 
		$this->nilaikamiModel = new NilaikamiModel();

		$this->visitorModel = new VisitorModel(); 
	}
	public function index()
	{
		$beritaTerbaru = $this->beritaModel->getLatestBerita();
		$videoTerbaru = $this->videoModel->getLatestVideo();
		$galleryData = $this->galleryModel->getLatestGallery();
		$galleryTerbaru = $this->photogalleryModel->listPhotoGallery($galleryData);
		$banner = $this->bannerModel->findAll();

		$layanan = $this->layananModel->first();
		$itemlayanan = array_chunk($this->itemlayananModel->findAll(),$this->itemlayananModel->countAll()/2);

		$tentangkami = $this->tentangkamiModel->first();
		$kelebihankami = array_chunk($this->kelebihankamiModel->findAll(),2);
		$titlenilaikami = $this->nilaikamiModel->first();
		$itemnilaikami = $this->nilaikamiModel->where('id >=',2)->findAll();

		// $dataStatistik = $this->visitorModel->getStatistikVisitor('180.248.123.45');

		$data = [
			'beritaTerbaru' =>$beritaTerbaru,
			'videoTerbaru' =>$videoTerbaru,
			'galleryTerbaru' =>$galleryTerbaru,
			'banner' =>$banner,
			'layanan' =>$layanan,
			'itemlayanan' =>$itemlayanan,
			'tentangkami' =>$tentangkami,
			'kelebihankami' =>$kelebihankami,
			'titlenilaikami' =>$titlenilaikami,
			'itemnilaikami' =>$itemnilaikami,
		];
		// dd($data);
		return view('pages/v_home',$data);
	}
	public function admin()
	{
		return redirect()->route('admin.dashboard');
	}

	public function default($url)
	{
		return redirect()->route('pages.beranda');
	}

	public function getVisitor($ipaddress)
	{
		$dataStatistik = $this->visitorModel->getStatistikVisitor($ipaddress);
		return $this->response->setJSON($dataStatistik);
	}
}

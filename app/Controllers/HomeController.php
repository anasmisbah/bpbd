<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\VideoModel;
use App\Models\BannerModel;
use App\Models\GalleryModel;
use App\Models\PhotogalleryModel;

class HomeController extends BaseController
{
	protected $beritaModel;
	protected $videoModel;
	protected $bannerModel;
	protected $galleryModel;
	protected $photogalleryModel;
	public function __construct()
	{
		$this->beritaModel = new BeritaModel(); 
		$this->videoModel = new VideoModel(); 
		$this->bannerModel = new BannerModel(); 
		$this->galleryModel = new GalleryModel(); 
		$this->photogalleryModel = new PhotogalleryModel(); 
	}
	public function index()
	{
		$beritaTerbaru = $this->beritaModel->getLatestBerita();
		$videoTerbaru = $this->videoModel->getLatestVideo();
		$galleryData = $this->galleryModel->getLatestGallery();
		$galleryTerbaru = $this->photogalleryModel->listPhotoGallery($galleryData);
		$banner = $this->bannerModel->findAll();
		$data = [
			'beritaTerbaru' =>$beritaTerbaru,
			'videoTerbaru' =>$videoTerbaru,
			'galleryTerbaru' =>$galleryTerbaru,
			'banner' =>$banner,
		];
		// dd($data);
		return view('pages/v_home',$data);
	}
	public function admin()
	{
		return redirect()->route('admin.dashboard');
	}
}

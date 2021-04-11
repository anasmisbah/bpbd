<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\VideoModel;
use App\Models\BannerModel;

class HomeController extends BaseController
{
	protected $beritaModel;
	protected $videoModel;
	protected $bannerModel;
	public function __construct()
	{
		$this->beritaModel = new BeritaModel(); 
		$this->videoModel = new VideoModel(); 
		$this->bannerModel = new BannerModel(); 
	}
	public function index()
	{
		$beritaTerbaru = $this->beritaModel->getLatestBerita();
		$videoTerbaru = $this->videoModel->getLatestVideo();
		$banner = $this->bannerModel->findAll();
		$data = [
			'beritaTerbaru' =>$beritaTerbaru,
			'videoTerbaru' =>$videoTerbaru,
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

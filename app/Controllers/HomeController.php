<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\VideoModel;

class HomeController extends BaseController
{
	protected $beritaModel;
	protected $VideoModel;
	public function __construct()
	{
		$this->beritaModel = new BeritaModel(); 
		$this->videoModel = new VideoModel(); 
	}
	public function index()
	{
		$beritaTerbaru = $this->beritaModel->getLatestBerita();
		$videoTerbaru = $this->videoModel->getLatestVideo();
		$data = [
			'beritaTerbaru' =>$beritaTerbaru,
			'videoTerbaru' =>$videoTerbaru,
		];
		// dd($data);
		return view('pages/v_home',$data);
	}
}

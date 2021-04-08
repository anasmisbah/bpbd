<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VideoModel;
use App\Models\BeritaModel;

class VideoController extends BaseController
{
	protected $videoModel;
	protected $beritaModel;
	public function __construct()
	{
		$this->videoModel = new VideoModel();
		$this->beritaModel = new BeritaModel();  
	}
	public function index()
	{
		//
	}

	public function detail($slug)
	{
		$beritaTerbaru = $this->beritaModel->getLatestBerita();
		$video = $this->videoModel->getDataVideo($slug);
		$data = [
			'video' =>$video,
			'beritaTerbaru' =>$beritaTerbaru,
		];
		$this->videoModel->save([
			'id'=>$video['id'],
			'dilihat'=>$video['dilihat']+1
		]);
		return view('pages/video/v_detail_video',$data);
	}
}

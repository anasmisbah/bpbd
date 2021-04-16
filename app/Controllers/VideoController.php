<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VideoModel;
use App\Models\BeritaModel;
use App\Models\KategoriModel;

class VideoController extends BaseController
{
	protected $videoModel;
	protected $beritaModel;
	protected $kategoriModel;
	public function __construct()
	{
		$this->videoModel = new VideoModel();
		$this->beritaModel = new BeritaModel();  
		$this->kategoriModel = new KategoriModel(); 
	}
	public function index()
	{
		$beritaTerbaru = $this->beritaModel->getLatestBerita();
		$kategori = $this->kategoriModel->findAll();
		$video = $this->videoModel->listVideo();
		$data = [
			'video' =>$video,
			'kategori' =>$kategori,
			'beritaTerbaru' =>$beritaTerbaru,
			'pager' => $this->videoModel->pager,
		];
		return view('pages/video/v_list_video',$data);
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

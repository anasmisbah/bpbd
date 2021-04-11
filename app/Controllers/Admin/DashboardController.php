<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\KategoriModel;
use App\Models\VideoModel;
use App\Models\UserModel;
class DashboardController extends BaseController
{
	protected $beritaModel;
	protected $kategoriModel;
	protected $videoModel;
	protected $userModel;
	public function __construct()
	{
		$this->beritaModel = new BeritaModel(); 
		$this->kategoriModel = new KategoriModel(); 
		$this->videoModel = new VideoModel(); 
		$this->userModel = new UserModel(); 
	}
	public function dashboard()
	{
		$totalBerita = $this->beritaModel->countAll();
		$totalVideo = $this->videoModel->countAll();
		$totalKategori = $this->kategoriModel->countAll();
		$totalUser = $this->userModel->countAll();
		$data = [
			'totalBerita'=>$totalBerita,
			'totalVideo'=>$totalVideo,
			'totalKategori'=>$totalKategori,
			'totalUser'=>$totalUser,
		];
		return view('admin\v_dashboard',$data);
	}
}

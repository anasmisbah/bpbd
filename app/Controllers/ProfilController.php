<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\ProfilModel;
use App\Models\KategoriBeritaModel;

class ProfilController extends BaseController
{
	protected $beritaModel;
	protected $profilModel;
	public function __construct()
	{
		$this->beritaModel = new BeritaModel(); 
		$this->profilModel = new ProfilModel(); 
	}
	public function detail($slug)
	{
		$beritaTerbaru = $this->beritaModel->getLatestBerita();
		$profil = $this->profilModel->getDataProfil($slug);
		$data = [
			'profil' =>$profil,
			'beritaTerbaru' =>$beritaTerbaru,
		];
		return view('pages/profil/v_detail_profil',$data);
	}
}

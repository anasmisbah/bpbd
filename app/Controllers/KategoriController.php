<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriModel;
use App\Models\BeritaModel;
use App\Models\KategoriberitaModel;

class KategoriController extends BaseController
{
	protected $beritaModel;
	protected $kategoriModel;
	protected $kategoriBeritaModel;
	public function __construct()
	{
		$this->beritaModel = new BeritaModel(); 
		$this->kategoriModel = new KategoriModel(); 
		$this->kategoriBeritaModel = new KategoriberitaModel(); 
	}
	public function index()
	{
		//
	}

	public function detail($slug)
	{
		$beritaTerbaru = $this->beritaModel->getLatestBerita();
		$kategoriDetail = $this->kategoriModel->where('slug',$slug)->first();
		$kategori = $this->kategoriModel->findAll();
		$berita = $this->kategoriBeritaModel->getListBeritaByKategori($kategoriDetail['id']);
		$data = [
			'kategoriDetail'=>$kategoriDetail,
			'berita'=>$berita,
			'beritaTerbaru' =>$beritaTerbaru,
			'kategori' =>$kategori,
			'pager' => $this->kategoriBeritaModel->pager,
		];
		// dd($data);
		return view('pages/kategori/v_list_berita_kategori',$data);
	}
}

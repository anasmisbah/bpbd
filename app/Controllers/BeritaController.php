<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\KategoriModel;
use App\Models\KategoriBeritaModel;

class BeritaController extends BaseController
{
	protected $beritaModel;
	protected $kategoriModel;
	protected $kategoriBeritaModel;
	public function __construct()
	{
		$this->beritaModel = new BeritaModel(); 
		$this->kategoriModel = new KategoriModel(); 
		$this->kategoriBeritaModel = new kategoriBeritaModel(); 
	}
	public function index()
	{
		$beritaTerbaru = $this->beritaModel->getLatestBerita();
		$kategori = $this->kategoriModel->findAll();
		$berita = $this->beritaModel->listBerita();
		$data = [
			'berita' =>$berita,
			'kategori' =>$kategori,
			'beritaTerbaru' =>$beritaTerbaru,
			'pager' => $this->beritaModel->pager,
		];
		return view('pages/berita/v_list_berita',$data);
	}

	public function detail($slug)
	{
		$beritaTerbaru = $this->beritaModel->getLatestBerita();
		$berita = $this->beritaModel->getDataBerita($slug);
		$berita['kategori'] = $this->kategoriBeritaModel->getKategoriBerita($berita['id']);
		$kategori = $this->kategoriModel->findAll();
		$data = [
			'berita' =>$berita,
			'kategori' =>$kategori,
			'beritaTerbaru' =>$beritaTerbaru,
		];
		$this->beritaModel->save([
			'id'=>$berita['id'],
			'dilihat'=>$berita['dilihat']+1
		]);
		return view('pages/berita/v_detail_berita',$data);
	}
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BukuModel;
use CodeIgniter\Files\File;

class BukuController extends BaseController
{
	protected $bukuModel;
	public function __construct()
	{
		$this->bukuModel = new BukuModel(); 
	}
	public function index()
	{
		$buku = $this->bukuModel->listBuku();
		$data = [
			'buku' =>$buku,
			'pager' => $this->bukuModel->pager,
		];
		return view('pages/buku/v_list_buku',$data);
	}
	public function detail($slug)
	{
		$buku = $this->bukuModel->getDataBuku($slug);
		$data = [
			'buku' =>$buku,
		];
		return view('pages/buku/v_detail_buku',$data);
	}

	public function download($slug)
	{
		$buku = $this->bukuModel->getDataBuku($slug);
		if (empty($buku)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('buku '.$id.' tidak ditemukan');
		}
		$path = 'uploads/'.$buku['buku'];
		$file = new File($path);
		return $this->response->download($path, null)->setFileName($buku['judul'].'.'.$file->guessExtension());
	}
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukhukumModel;
use App\Models\FilehukumModel;
use CodeIgniter\Files\File;

class ProdukhukumController extends BaseController
{
	protected $produkhukumModel;
	protected $filehukumModel;
	public function __construct()
	{
		$this->produkhukumModel = new ProdukhukumModel(); 
		$this->filehukumModel = new FilehukumModel(); 
	}
	public function index()
	{
		$semuaProdukHukum = $this->produkhukumModel->findAll();
		$produkhukum =  $this->produkhukumModel->first();
		$filehukum = $this->filehukumModel->where('produk_hukum_id',$produkhukum['id'])->findAll();
		$data = [
			'semuaprodukhukum'=>$semuaProdukHukum,
			'produkhukum'=>$produkhukum,
			'filehukum'=>$filehukum,
		];
		// dd($data);

		return view('pages/produkhukum/v_produkhukum',$data);
	}
	public function detail($slug)
	{
		$semuaProdukHukum = $this->produkhukumModel->findAll();
		$produkhukum =  $this->produkhukumModel->where('slug',$slug)->first();
		if (empty($produkhukum)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
		$filehukum = $this->filehukumModel->where('produk_hukum_id',$produkhukum['id'])->findAll();
		$data = [
			'semuaprodukhukum'=>$semuaProdukHukum,
			'produkhukum'=>$produkhukum,
			'filehukum'=>$filehukum,
		];
		// dd($data);

		return view('pages/produkhukum/v_produkhukum',$data);
	}
	public function download($slug)
	{
		$filehukum = $this->filehukumModel->where('slug',$slug)->first();
		if (empty($filehukum)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('filehukum '.$id.' tidak ditemukan');
		}
		$this->filehukumModel->save([
			'id'=>$filehukum['id'],
			'dilihat'=>$filehukum['dilihat']+1
		]);
		$path = 'uploads/'.$filehukum['file'];
		$file = new File($path);
		return $this->response->download($path, null)->setFileName($filehukum['judul'].'.'.$file->guessExtension());
	}

	public function detailFileHukum($slug)
	{
		$filehukum = $this->filehukumModel->where('slug',$slug)->first();
		if (empty($filehukum)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
		$data = [
			'filehukum'=>$filehukum,
		];
		// dd($data);

		return view('pages/produkhukum/v_detail_filehukum',$data);
	}

}

<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BannerModel;

class BannerController extends BaseController
{
	protected $banner;
	public function __construct()
	{
		$this->bannerModel = new BannerModel(); 
	}
	public function index()
	{
		$banner = $this->bannerModel->findAll();
		$data = [
			'banner' =>$banner
		];
		return view('admin/banner/v_index',$data);
	}

	public function detail($id)
	{
		$banner = $this->bannerModel->find($id);
		$data = [
			'banner'=>$banner
		];
		if (empty($data['banner'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('banner '.$id.' tidak ditemukan');
		}
		return view('admin/banner/v_detail',$data);
	}

	public function create()
	{
		$data = [
			'validation'=>\Config\Services::validation(),
		];
		return view('admin/banner/v_create',$data);
	}

	public function store()
	{
		// TODO : setting validation here
		// validasi input
		// dd($this->request->getFile('gambar'));
		if (!$this->validate([
			'gambar'=>[
				'rules'=> 'uploaded[gambar]|max_size[gambar,5000]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
				'errors'=>[
					'uploaded'=>'gambar tidak boleh kosong',
					'max_size' =>'Ukuran gambar terlalu besar',
					'is_image'=> 'Yang anda pilih bukan gambar',
					'mime_in'=> 'Yang anda pilih bukan gambar',
				]
			]
		])) {
			return redirect()->route('banner.create')->withInput();
		}
		
		// ambil gambar
		$filegambar = $this->request->getFile('gambar');
		// generate nama file sampul
		$namaBanner = 'banner/'.$filegambar->getRandomName();
		// pindahkan file ke folder sampul
		$filegambar->move('uploads',$namaBanner);
		$dataSave = [
			'gambar'=>$namaBanner,
		];
		$this->bannerModel->save($dataSave);

		session()->setFlashdata('pesan','Data banner berhasil ditambahkan');

		return redirect()->route('banner.index');
	}

	public function edit($id)
	{
		$banner = $this->bannerModel->find($id);
		$data = [
			'banner'=>$banner,
			'validation'=>\Config\Services::validation(),
		];
		if (empty($data['banner'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('banner '.$id.' tidak ditemukan');
		}
		return view('admin/banner/v_edit',$data);
	}

	public function update()
	{
		// dd($this->request->getVar());
		$bannerLama = $this->bannerModel->find($this->request->getVar('id'));
		// TODO : add validation
		if (!$this->validate([
			'gambar'=>[
				'rules'=> 'max_size[gambar,5000]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
				'errors'=>[
					'max_size' =>'Ukuran gambar terlalu besar',
					'is_image'=> 'Yang anda pilih bukan gambar',
					'mime_in'=> 'Yang anda pilih bukan gambar',
				]
			]
		])) {
			return redirect()->route('banner.edit',[$bannerLama['id']])->withInput();
		}
		// ambil gambar
		$fileBanner = $this->request->getFile('gambar');

		// cek gambar apakah tetap gambar lama
		if ($fileBanner->getError() == 4) {
			$namaBanner = $this->request->getVar('gambarLama');
		}else{
			// generate nama file sampul
			$namaBanner = 'banner/'.$fileBanner->getRandomName();
			// pindahkan file ke folder img
			$fileBanner->move('uploads/',$namaBanner);
			// Hapus Gambar
			if ($bannerLama['gambar'] != 'banner/default.jpg') {
				unlink('uploads/'.$bannerLama['gambar']);
			}
			
		}
		$dataUpdate = [
			'id'=>$this->request->getVar('id'),
			'gambar'=>$namaBanner,
		];
		// dd($dataUpdate);
		$this->bannerModel->save($dataUpdate);

		session()->setFlashdata('pesan','Data banner berhasil diubah');

		return redirect()->route('banner.index');
	}

	public function delete()
	{
		$banner = $this->bannerModel->find($this->request->getVar('id'));
		if (empty($banner)) {
			session()->setFlashdata('error','Data banner gagal dihapus');
			return redirect()->route('banner.index');
		}
		// cek gambar default
		if ($banner['gambar'] && $banner['gambar'] != 'banner/default.jpg') {
			// Hapus Gambar
			unlink('uploads/'.$banner['gambar']);
		}
		$this->bannerModel->delete($this->request->getVar('id'));
		session()->setFlashdata('pesan','Data berhasil dihapus');
		return redirect()->route('banner.index');
	}
}

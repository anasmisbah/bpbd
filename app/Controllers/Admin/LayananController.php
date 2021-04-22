<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LayananModel;

class LayananController extends BaseController
{
	protected $layananModel;
	public function __construct()
	{
		$this->layananModel = new LayananModel(); 
	}
	public function detail()
	{
		$layanan = $this->layananModel->first();
		$data = [
			'layanan' =>$layanan
		];
		return view('admin/layanan/v_detail',$data);
	}
	public function edit()
	{
		$layanan = $this->layananModel->first();
		$data = [
			'layanan' =>$layanan,
			'validation'=>\Config\Services::validation()
		];
		return view('admin/layanan/v_edit',$data);
	}

	public function update()
	{
		// dd($this->request->getVar());
		$layananLama = $this->layananModel->find($this->request->getVar('id'));
		// TODO : add validation
		if (!$this->validate([
			'judul' =>[
				'rules'=>'required',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
				],
			],
			'subjudul' =>[
				'rules'=>'required',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
				],
			],
			'gambar'=>[
				'rules'=> 'max_size[gambar,5000]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
				'errors'=>[
					'max_size' =>'Ukuran gambar terlalu besar',
					'is_image'=> 'Yang anda pilih bukan gambar',
					'mime_in'=> 'Yang anda pilih bukan gambar',
				]
			],
		])) {
			return redirect()->route('layanan.edit')->withInput();
		}
		// ambil gambar
		$fileGambar = $this->request->getFile('gambar');
				
		// apakah tidak ada gambar yg diupoload
		if ($fileGambar->getError() == 4) {
			$namaGambar = 'gambar/default.png';
		}else{
			// generate nama file gambar
			$namaGambar = 'gambar/'.$fileGambar->getRandomName();
			// pindahkan file ke folder gambar
			$fileGambar->move('uploads',$namaGambar);
		}
		$dataUpdate = [
			'id'=>$this->request->getVar('id'),
			'judul'=>$this->request->getVar('judul'),
			'subjudul'=>$this->request->getVar('subjudul'),
			'gambar'=>$namaGambar,
		];
		// dd($dataUpdate);
		$this->layananModel->save($dataUpdate);
		session()->setFlashdata('pesan','Data layanan berhasil diubah');

		return redirect()->route('layanan.detail');
	}
}

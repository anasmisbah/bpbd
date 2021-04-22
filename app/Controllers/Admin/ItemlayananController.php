<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ItemlayananModel;

class ItemlayananController extends BaseController
{
	protected $itemlayananModel;
	public function __construct()
	{
		$this->itemlayananModel = new ItemlayananModel(); 
	}
	public function index()
	{
		$itemlayanan = $this->itemlayananModel->findAll();
		$data = [
			'itemlayanan' =>$itemlayanan
		];
		return view('admin/itemlayanan/v_index',$data);
	}

	public function detail($id)
	{
		$itemlayanan = $this->itemlayananModel->find($id);
		$data = [
			'itemlayanan'=>$itemlayanan
		];
		if (empty($data['itemlayanan'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('layanan '.$id.' tidak ditemukan');
		}
		return view('admin/itemlayanan/v_detail',$data);
	}

	public function create()
	{
		$data = [
			'validation'=>\Config\Services::validation(),
		];
		return view('admin/itemlayanan/v_create',$data);
	}

	public function store()
	{
		// TODO : setting validation here
		// validasi input
		if (!$this->validate([
			'judul' =>[
				'rules'=>'required',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
				],
			],
			'deskripsi' =>[
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
			]
		])) {
			return redirect()->route('itemlayanan.create')->withInput();
		}
		// dd($this->request->getVar());
		// ambil gambar
		$fileGambar = $this->request->getFile('gambar');
		
		// apakah tidak ada gambar yg diupoload
		if ($fileGambar->getError() == 4) {
			$namaGambar = 'gambar/default-item.png';
		}else{
			// generate nama file gambar
			$namaGambar = 'gambar/'.$fileGambar->getRandomName();
			// pindahkan file ke folder gambar
			$fileGambar->move('uploads',$namaGambar);
		}
		$dataSave = [
			'judul'=>$this->request->getVar('judul'),
			'deskripsi'=>$this->request->getVar('deskripsi'),
			'gambar'=>$namaGambar,
		];
		$this->itemlayananModel->save($dataSave);

		session()->setFlashdata('pesan','Data layanan berhasil ditambahkan');

		return redirect()->route('itemlayanan.index');
	}

	public function edit($id)
	{
		$itemlayanan = $this->itemlayananModel->find($id);
		$data = [
			'itemlayanan'=>$itemlayanan,
			'validation'=>\Config\Services::validation(),
		];
		if (empty($data['itemlayanan'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('layanan '.$id.' tidak ditemukan');
		}
		return view('admin/itemlayanan/v_edit',$data);
	}

	public function update()
	{
		// dd($this->request->getVar());
		$itemlayananLama = $this->itemlayananModel->find($this->request->getVar('id'));
		// TODO : add validation
		if (!$this->validate([
			'judul' =>[
				'rules'=>'required',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
				],
			],
			'deskripsi' =>[
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
			]
		])) {
			return redirect()->route('itemlayanan.edit',[$itemlayananLama['id']])->withInput();
		}
		// ambil gambar
		$fileGambar = $this->request->getFile('gambar');

		// cek gambar apakah tetap gambar lama
		if ($fileGambar->getError() == 4) {
			$namaGambar = $this->request->getVar('gambarLama');
		}else{
			// generate nama file gambar
			$namaGambar = 'gambar/'.$fileGambar->getRandomName();
			// pindahkan file ke folder img
			$fileGambar->move('uploads/',$namaGambar);
			// Hapus Gambar
			if ($itemlayananLama['gambar'] != 'gambar/default-item.png') {
				unlink('uploads/'.$itemlayananLama['gambar']);
			}
			
		}
		$slug = url_title($this->request->getVar('judul'),'-',true);
		$dataUpdate = [
			'id'=>$this->request->getVar('id'),
			'judul'=>$this->request->getVar('judul'),
			'deskripsi'=>$this->request->getVar('deskripsi'),
			'gambar'=>$namaGambar,
		];
		// dd($dataUpdate);
		$this->itemlayananModel->save($dataUpdate);
		session()->setFlashdata('pesan','Data layanan berhasil diubah');

		return redirect()->route('itemlayanan.index');
	}

	public function delete()
	{
		$itemlayanan = $this->itemlayananModel->find($this->request->getVar('id'));
		if (empty($itemlayanan)) {
			session()->setFlashdata('error','Data layanan gagal dihapus');
			return redirect()->route('itemlayanan.index');
		}
		// cek gambar default
		if ($itemlayanan['gambar'] != 'gambar/default-item.png') {
			// Hapus Gambar
			unlink('uploads/'.$itemlayanan['gambar']);
		}
		$this->itemlayananModel->delete($this->request->getVar('id'));
		session()->setFlashdata('pesan','Data berhasil dihapus');
		return redirect()->route('itemlayanan.index');
	}
}

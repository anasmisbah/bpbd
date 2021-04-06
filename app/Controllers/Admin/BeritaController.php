<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\KategoriModel;
use App\Models\KategoriBeritaModel;
use CodeIgniter\I18n\Time;

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
		$berita = $this->beritaModel->findAll();
		$data = [
			'berita' =>$berita
		];
		return view('admin/berita/v_index',$data);
	}

	public function detail($id)
	{
		$berita = $this->beritaModel->find($id);
		$berita['kategori'] = $this->kategoriBeritaModel->getKategoriBerita($berita['id']);
		$data = [
			'berita'=>$berita
		];
		if (empty($data['berita'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('berita '.$id.' tidak ditemukan');
		}
		return view('admin/berita/v_detail',$data);
	}

	public function create()
	{
		$kategori = $this->kategoriModel->findAll();
		$data = [
			'validation'=>\Config\Services::validation(),
			'kategori'=>$kategori
		];
		return view('admin/berita/v_create',$data);
	}

	public function store()
	{
		// TODO : setting validation here
		// validasi input
		if (!$this->validate([
			'judul' =>[
				'rules'=>'required|is_unique[berita.judul]',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} berita sudah terdaftar'
				],
			],
			'penulis' =>[
				'rules'=>'required',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
				],
			],
			'kategori' =>[
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
			'sampul'=>[
				'rules'=> 'max_size[sampul,5000]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
				'errors'=>[
					'max_size' =>'Ukuran gambar terlalu besar',
					'is_image'=> 'Yang anda pilih bukan gambar',
					'mime_in'=> 'Yang anda pilih bukan gambar',
				]
			]
		])) {
			return redirect()->route('berita.create')->withInput();
		}
		// dd($this->request->getVar());
		// ambil gambar
		$fileSampul = $this->request->getFile('sampul');
		
		// apakah tidak ada gambar yg diupoload
		if ($fileSampul->getError() == 4) {
			$namaSampul = 'sampul/default.jpg';
		}else{
			// generate nama file sampul
			$namaSampul = 'sampul/'.$fileSampul->getRandomName();
			// pindahkan file ke folder sampul
			$fileSampul->move('uploads',$namaSampul);
		}
		$slug = url_title($this->request->getVar('judul'),'-',true);
		$dataSave = [
			'judul'=>$this->request->getVar('judul'),
			'deskripsi'=>$this->request->getVar('deskripsi'),
			'penulis'=>$this->request->getVar('penulis'),
			'status'=>$this->request->getVar('status'),
			'sampul'=>$namaSampul,
			'slug'=>$slug,
			'user_id'=>session()->get('id')
		];
		if ($this->request->getVar('status') == 0) {
			$dataSave['published_at'] = new Time('now');
		}
		$this->beritaModel->save($dataSave);

		// dd($this->beritaModel->getInsertID());
		$resultDataKategori=$this->arrayKategori($this->request->getVar('kategori'),$this->beritaModel->getInsertID());
		// save kategori berita
		$this->kategoriBeritaModel->insertBatch($resultDataKategori);

		session()->setFlashdata('pesan','Data berita berhasil ditambahkan');

		return redirect()->route('berita.index');
	}

	public function edit($id)
	{
		$berita = $this->beritaModel->find($id);
		$kategori = $this->kategoriModel->findAll();
		$berita['kategori'] = $this->kategoriBeritaModel->getKategoriBerita($id);
		$kategoriId =[]; 
		foreach ($berita['kategori'] as $item) {
			$kategoriId[] = $item['kategori_id'];	
		}
		$data = [
			'berita'=>$berita,
			'validation'=>\Config\Services::validation(),
			'kategori'=>$kategori,
			'kategoriId'=>$kategoriId
		];
		if (empty($data['berita'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('berita '.$id.' tidak ditemukan');
		}
		return view('admin/berita/v_edit',$data);
	}

	public function update()
	{
		// dd($this->request->getVar());
		$beritaLama = $this->beritaModel->find($this->request->getVar('id'));
		// TODO : add validation
		if (!$this->validate([
			'judul' =>[
				'rules'=>'required|is_unique[berita.judul,id,'.$this->request->getVar('id').']',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} berita sudah terdaftar'
				],
			],
			'penulis' =>[
				'rules'=>'required',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
				],
			],
			'kategori' =>[
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
			'sampul'=>[
				'rules'=> 'max_size[sampul,5000]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
				'errors'=>[
					'max_size' =>'Ukuran gambar terlalu besar',
					'is_image'=> 'Yang anda pilih bukan gambar',
					'mime_in'=> 'Yang anda pilih bukan gambar',
				]
			]
		])) {
			return redirect()->route('berita.edit',[$beritaLama['id']])->withInput();
		}
		// ambil gambar
		$fileSampul = $this->request->getFile('sampul');

		// cek gambar apakah tetap gambar lama
		if ($fileSampul->getError() == 4) {
			$namaSampul = $this->request->getVar('sampulLama');
		}else{
			// generate nama file sampul
			$namaSampul = 'sampul/'.$fileSampul->getRandomName();
			// pindahkan file ke folder img
			$fileSampul->move('uploads/',$namaSampul);
			// Hapus Gambar
			if ($beritaLama['sampul'] != 'sampul/default.jpg') {
				unlink('uploads/'.$beritaLama['sampul']);
			}
			
		}
		$slug = url_title($this->request->getVar('judul'),'-',true);
		$dataUpdate = [
			'id'=>$this->request->getVar('id'),
			'judul'=>$this->request->getVar('judul'),
			'deskripsi'=>$this->request->getVar('deskripsi'),
			'penulis'=>$this->request->getVar('penulis'),
			'status'=>$this->request->getVar('status'),
			'sampul'=>$namaSampul,
			'slug'=>$slug,
		];
		if ($this->request->getVar('status') == 0 && $this->request->getVar('status') != $beritaLama['status'] ) {
			$dataUpdate['published_at'] = new Time('now');
		}
		// dd($dataUpdate);
		$this->beritaModel->save($dataUpdate);

		// sync kategori berita
		$resultDataKategori=$this->arrayKategori($this->request->getVar('kategori'),$beritaLama['id']);
		$this->kategoriBeritaModel->syncKategoriBerita($resultDataKategori,$beritaLama['id']);

		session()->setFlashdata('pesan','Data berita berhasil diubah');

		return redirect()->route('berita.index');
	}

	public function delete()
	{
		$berita = $this->beritaModel->find($this->request->getVar('id'));
		if (empty($berita)) {
			session()->setFlashdata('error','Data berita gagal dihapus');
			return redirect()->route('berita.index');
		}
		// cek gambar default
		if ($berita['sampul'] != 'sampul/default.jpg') {
			// Hapus Gambar
			unlink('uploads/'.$berita['sampul']);
		}
		$this->beritaModel->delete($this->request->getVar('id'));
		session()->setFlashdata('pesan','Data berhasil dihapus');
		return redirect()->route('berita.index');
	}

	private function arrayKategori($inputKategori,$beritaId)
	{
		$dataKategori = [];
		for ($i=0; $i < count($inputKategori); $i++) { 
			$dataKategori[] = [
				'kategori_id'=>$inputKategori[$i],
				'berita_id'=>$beritaId
			];
		}
		return $dataKategori;
	}

	public function publish($id)
	{
		$berita = $this->beritaModel->find($id);
		if (empty($berita)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('berita '.$id.' tidak ditemukan');
		}
		$this->beritaModel->save([
			'id'=>$berita['id'],
			'status'=>0,
			'published_at'=>new Time('now')
		]);
		return redirect()->route('berita.detail',[$berita['id']]);
	}

	public function draft($id)
	{
		$berita = $this->beritaModel->find($id);
		if (empty($berita)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('berita '.$id.' tidak ditemukan');
		}
		$this->beritaModel->save([
			'id'=>$berita['id'],
			'status'=>1,
		]);
		return redirect()->route('berita.detail',[$berita['id']]);
	}
}

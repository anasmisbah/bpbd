<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BukuModel;
use CodeIgniter\I18n\Time;
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
		$buku = $this->bukuModel->findAll();
		$data = [
			'buku' =>$buku
		];
		return view('admin/buku/v_index',$data);
	}

	public function detail($id)
	{
		$buku = $this->bukuModel->find($id);
		$data = [
			'buku'=>$buku
		];
		if (empty($data['buku'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('buku '.$id.' tidak ditemukan');
		}
		return view('admin/buku/v_detail',$data);
	}

	public function create()
	{
		$data = [
			'validation'=>\Config\Services::validation(),
		];
		return view('admin/buku/v_create',$data);
	}

	public function store()
	{
		// TODO : setting validation here
		// validasi input
		if (!$this->validate([
			'judul' =>[
				'rules'=>'required|is_unique[buku.judul]',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} buku sudah terdaftar'
				],
			],
			'sampul'=>[
				'rules'=> 'uploaded[sampul]|max_size[sampul,5000]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
				'errors'=>[
					'uploaded'=>'gambar tidak boleh kosong',
					'max_size' =>'Ukuran gambar terlalu besar',
					'is_image'=> 'Yang anda pilih bukan gambar',
					'mime_in'=> 'Yang anda pilih bukan gambar',
				]
			],
			'buku'=>[
				'rules'=> 'uploaded[buku]|max_size[buku,40000]',
				'errors'=>[
					'uploaded'=>'Buku tidak boleh kosong',
					'max_size' =>'Ukuran Buku terlalu besar',
				]
			],
		])) {
			return redirect()->route('buku.create')->withInput();
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
		// ambil buku
		$fileBuku = $this->request->getFile('buku');
		
		// apakah tidak ada buku yg diupoload
		if ($fileBuku->getError() != 4) {
			// generate nama file sampul
			$namaBuku = 'buku/'.$fileBuku->getRandomName();
			// pindahkan file ke folder buku
			$fileBuku->move('uploads',$namaBuku);
		}
		$slug = url_title($this->request->getVar('judul'),'-',true);
		$dataSave = [
			'judul'=>$this->request->getVar('judul'),
			'deskripsi'=>$this->request->getVar('deskripsi'),
			'penulis'=>$this->request->getVar('penulis'),
			'penerbit'=>$this->request->getVar('penerbit'),
			'status'=>$this->request->getVar('status'),
			'sampul'=>$namaSampul,
			'buku'=>$namaBuku,
			'slug'=>$slug,
			'user_id'=>session()->get('id')
		];
		if ($this->request->getVar('status') == 0) {
			$dataSave['published_at'] = new Time('now');
		}
		$this->bukuModel->save($dataSave);


		session()->setFlashdata('pesan','Data buku berhasil ditambahkan');

		return redirect()->route('buku.index');
	}

	public function edit($id)
	{
		$buku = $this->bukuModel->find($id);
		$data = [
			'buku'=>$buku,
			'validation'=>\Config\Services::validation(),
		];
		if (empty($data['buku'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('buku '.$id.' tidak ditemukan');
		}
		return view('admin/buku/v_edit',$data);
	}

	public function update()
	{
		// dd($this->request->getVar());
		$bukuLama = $this->bukuModel->find($this->request->getVar('id'));
		// TODO : add validation
		if (!$this->validate([
			'judul' =>[
				'rules'=>'required|is_unique[buku.judul,id,'.$this->request->getVar('id').']',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} buku sudah terdaftar'
				],
			],
			'sampul'=>[
				'rules'=> 'max_size[sampul,5000]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
				'errors'=>[
					'max_size' =>'Ukuran gambar terlalu besar',
					'is_image'=> 'Yang anda pilih bukan gambar',
					'mime_in'=> 'Yang anda pilih bukan gambar',
				]
			],
			'buku'=>[
				'rules'=> 'max_size[buku,5000]',
				'errors'=>[
					'max_size' =>'Ukuran Buku terlalu besar',
				]
			],
		])) {
			return redirect()->route('buku.edit',[$bukuLama['id']])->withInput();
		}
		// dd($this->request->getVar());
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
			if ($bukuLama['sampul'] != 'sampul/default.jpg') {
				unlink('uploads/'.$bukuLama['sampul']);
			}
			
		}
		// ambil buku
		$fileBuku = $this->request->getFile('buku');

		// cek buku apakah tetap buku lama
		if ($fileBuku->getError() == 4) {
			$namaBuku = $this->request->getVar('bukuLama');
		}else{
			// generate nama file buku
			$namaBuku = 'buku/'.$fileBuku->getRandomName();
			// pindahkan file ke folder img
			$fileBuku->move('uploads/',$namaBuku);
			// Hapus buku
			unlink('uploads/'.$bukuLama['buku']);
			
		}
		$slug = url_title($this->request->getVar('judul'),'-',true);
		$dataUpdate = [
			'id'=>$this->request->getVar('id'),
			'judul'=>$this->request->getVar('judul'),
			'deskripsi'=>$this->request->getVar('deskripsi'),
			'penulis'=>$this->request->getVar('penulis'),
			'penerbit'=>$this->request->getVar('penerbit'),
			'status'=>$this->request->getVar('status'),
			'sampul'=>$namaSampul,
			'buku'=>$namaBuku,
			'slug'=>$slug,
		];
		if ($this->request->getVar('status') == 0 && $this->request->getVar('status') != $bukuLama['status'] ) {
			$dataUpdate['published_at'] = new Time('now');
		}
		// dd($dataUpdate);
		$this->bukuModel->save($dataUpdate);

		session()->setFlashdata('pesan','Data buku berhasil diubah');

		return redirect()->route('buku.index');
	}

	public function delete()
	{
		$buku = $this->bukuModel->find($this->request->getVar('id'));
		if (empty($buku)) {
			session()->setFlashdata('error','Data buku gagal dihapus');
			return redirect()->route('buku.index');
		}
		// cek gambar default
		if ($buku['sampul'] != 'sampul/default.jpg') {
			// Hapus Gambar
			unlink('uploads/'.$buku['sampul']);
		}
		unlink('uploads/'.$buku['buku']);
		$this->bukuModel->delete($this->request->getVar('id'));
		session()->setFlashdata('pesan','Data berhasil dihapus');
		return redirect()->route('buku.index');
	}

	public function publish($id)
	{
		$buku = $this->bukuModel->find($id);
		if (empty($buku)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('buku '.$id.' tidak ditemukan');
		}
		$this->bukuModel->save([
			'id'=>$buku['id'],
			'status'=>0,
			'published_at'=>new Time('now')
		]);
		return redirect()->route('buku.detail',[$buku['id']]);
	}

	public function draft($id)
	{
		$buku = $this->bukuModel->find($id);
		if (empty($buku)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('buku '.$id.' tidak ditemukan');
		}
		$this->bukuModel->save([
			'id'=>$buku['id'],
			'status'=>1,
		]);
		return redirect()->route('buku.detail',[$buku['id']]);
	}

	public function download($id)
	{
		$buku = $this->bukuModel->find($id);
		if (empty($buku)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('buku '.$id.' tidak ditemukan');
		}
		$path = 'uploads/'.$buku['buku'];
		$file = new File($path);
		return $this->response->download($path, null)->setFileName($buku['judul'].'.'.$file->guessExtension());
	}
}

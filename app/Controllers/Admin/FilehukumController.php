<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FilehukumModel;
use CodeIgniter\I18n\Time;
use CodeIgniter\Files\File;
use App\Models\ProdukhukumModel;

class FilehukumController extends BaseController
{
	protected $filehukumModel;
	protected $produkhukumModel;
	public function __construct()
	{
		$this->filehukumModel = new FilehukumModel(); 
		$this->produkhukumModel = new ProdukhukumModel(); 
	}
	public function index($id)
	{
		$filehukum = $this->filehukumModel->where('produk_hukum_id',$id)->findAll();
		$produkhukum = $this->produkhukumModel->find($id);
		if (empty($produkhukum)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('produk hukum '.$id.' tidak ditemukan');
		}
		$data = [
			'filehukum' =>$filehukum,
			'produkhukum'=> $produkhukum
		];
		return view('admin/filehukum/v_index',$data);
	}

	public function detail($id)
	{
		$filehukum = $this->filehukumModel->find($id);
		if (empty($filehukum)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('file hukum '.$id.' tidak ditemukan');
		}
		$filehukum['produkhukum'] = $this->produkhukumModel->find($filehukum['produk_hukum_id']);
		$data = [
			'filehukum'=>$filehukum
		];
		
		// dd($data); 
		return view('admin/filehukum/v_detail',$data);
	}

	public function create($id)
	{
		$produkhukum = $this->produkhukumModel->find($id);
		if (empty($produkhukum)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('produk hukum '.$id.' tidak ditemukan');
		}
		$data = [
			'validation'=>\Config\Services::validation(),
			'produkhukum'=> $produkhukum,
		];
		return view('admin/filehukum/v_create',$data);
	}

	public function store()
	{
		// TODO : setting validation here
		// validasi input
		if (!$this->validate([
			'judul' =>[
				'rules'=>'required|is_unique[file_hukum.judul]',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} file hukum sudah terdaftar'
				],
			],
			'file'=>[
				'rules'=> 'uploaded[file]|max_size[file,40000]',
				'errors'=>[
					'uploaded'=>'file tidak boleh kosong',
					'max_size' =>'Ukuran file terlalu besar',
				]
			],
		])) {
			return redirect()->route('filehukum.create',[$this->request->getVar('produk_hukum_id')])->withInput();
		}
		// dd($this->request->getVar());
		// ambil buku
		$fileHukum = $this->request->getFile('file');
		
		// apakah tidak ada buku yg diupoload
		if ($fileHukum->getError() != 4) {
			// generate nama file sampul
			$namaFile = 'file/'.$fileHukum->getRandomName();
			// pindahkan file ke folder buku
			$fileHukum->move('uploads',$namaFile);
		}
		$slug = url_title($this->request->getVar('judul'),'-',true);
		$dataSave = [
			'judul'=>$this->request->getVar('judul'),
			'tentang'=>$this->request->getVar('tentang'),
			'status'=>$this->request->getVar('status'),
			'file'=>$namaFile,
			'slug'=>$slug,
			'user_id'=>session()->get('id'),
			'produk_hukum_id'=>$this->request->getVar('produk_hukum_id'),
		];
		if ($this->request->getVar('status') == 0) {
			$dataSave['published_at'] = new Time('now');
		}
		$this->filehukumModel->save($dataSave);


		session()->setFlashdata('pesan','Data file hukum berhasil ditambahkan');

		return redirect()->route('filehukum.index',[$this->request->getVar('produk_hukum_id')]);
	}

	public function edit($id)
	{
		$filehukum = $this->filehukumModel->find($id);
		if (empty($filehukum)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('file hukum '.$id.' tidak ditemukan');
		}
		$data = [
			'filehukum'=>$filehukum,
			'validation'=>\Config\Services::validation(),
		];
		return view('admin/filehukum/v_edit',$data);
	}

	public function update()
	{
		// dd($this->request->getVar());
		$filehukumLama = $this->filehukumModel->find($this->request->getVar('id'));
		// TODO : add validation
		if (!$this->validate([
			'judul' =>[
				'rules'=>'required|is_unique[file_hukum.judul,id,'.$this->request->getVar('id').']',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} file hukum sudah terdaftar'
				],
			],
			'file'=>[
				'rules'=> 'max_size[file,40000]',
				'errors'=>[
					'max_size' =>'Ukuran file terlalu besar',
				]
			],
		])) {
			return redirect()->route('filehukum.edit',[$filehukumLama['id']])->withInput();
		}
		// dd($this->request->getVar());
		// ambil buku
		$fileHukum = $this->request->getFile('file');

		// cek buku apakah tetap buku lama
		if ($fileHukum->getError() == 4) {
			$namaFile = $this->request->getVar('filehukumLama');
		}else{
			// generate nama file buku
			$namaFile = 'file/'.$fileHukum->getRandomName();
			// pindahkan file ke folder img
			$fileHukum->move('uploads/',$namaFile);
			// Hapus buku
			unlink('uploads/'.$filehukumLama['file']);
			
		}
		$slug = url_title($this->request->getVar('judul'),'-',true);
		$dataUpdate = [
			'id'=>$this->request->getVar('id'),
			'judul'=>$this->request->getVar('judul'),
			'tentang'=>$this->request->getVar('tentang'),
			'status'=>$this->request->getVar('status'),
			'file'=>$namaFile,
			'slug'=>$slug,
		];
		if ($this->request->getVar('status') == 0 && $this->request->getVar('status') != $filehukumLama['status'] ) {
			$dataUpdate['published_at'] = new Time('now');
		}
		// dd($dataUpdate);
		$this->filehukumModel->save($dataUpdate);

		session()->setFlashdata('pesan','Data file hukum berhasil diubah');

		return redirect()->route('filehukum.index',[$filehukumLama['produk_hukum_id']]);
	}

	public function delete()
	{
		$filehukum = $this->filehukumModel->find($this->request->getVar('id'));
		if (empty($filehukum)) {
			session()->setFlashdata('error','Data file hukum gagal dihapus');
			return redirect()->route('filehukum.index');
		}
		unlink('uploads/'.$filehukum['file']);
		$this->filehukumModel->delete($this->request->getVar('id'));
		session()->setFlashdata('pesan','Data file hukum berhasil dihapus');
		return redirect()->route('filehukum.index',[$filehukum['produk_hukum_id']]);
	}

	public function publish($id)
	{
		$filehukum = $this->filehukumModel->find($id);
		if (empty($filehukum)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('file hukum '.$id.' tidak ditemukan');
		}
		$this->filehukumModel->save([
			'id'=>$filehukum['id'],
			'status'=>0,
			'published_at'=>new Time('now')
		]);
		return redirect()->route('filehukum.detail',[$filehukum['id']]);
	}

	public function draft($id)
	{
		$filehukum = $this->filehukumModel->find($id);
		if (empty($filehukum)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('file hukum '.$id.' tidak ditemukan');
		}
		$this->filehukumModel->save([
			'id'=>$filehukum['id'],
			'status'=>1,
		]);
		return redirect()->route('filehukum.detail',[$filehukum['id']]);
	}

	public function download($id)
	{
		$filehukum = $this->filehukumModel->find($id);
		if (empty($filehukum)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('filehukum '.$id.' tidak ditemukan');
		}
		$path = 'uploads/'.$filehukum['file'];
		$file = new File($path);
		return $this->response->download($path, null)->setFileName($filehukum['judul'].'.'.$file->guessExtension());
	}
}

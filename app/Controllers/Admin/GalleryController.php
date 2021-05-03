<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GalleryModel;
use App\Models\PhotogalleryModel;
use CodeIgniter\I18n\Time;

class GalleryController extends BaseController
{
	protected $galleryModel;
	protected $photogalleryModel;
	public function __construct()
	{
		$this->galleryModel = new GalleryModel(); 
		$this->photogalleryModel = new PhotogalleryModel(); 
	}
	public function index()
	{
		$gallery = $this->galleryModel->findAll();
		$data = [
			'gallery' =>$gallery
		];
		return view('admin/gallery/v_index',$data);
	}

	public function create()
	{
		$data = [
			'validation'=>\Config\Services::validation()
		];
		return view('admin/gallery/v_create',$data);
	}
	public function store()
	{
		// dd(json_decode($this->request->getVar('gambar')));
		// TODO : setting validation here
		// validasi input
		if (!$this->validate([
			'judul' =>[
				'rules'=>'required|is_unique[gallery.judul]',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} gallery sudah terdaftar'
				],
			],
		])) {
			return redirect()->route('gallery.create')->withInput();
		}
		// dd($this->request->getVar());
		$slug = url_title($this->request->getVar('judul'),'-',true);
		$dataSave = [
			'judul'=>$this->request->getVar('judul'),
			'status'=>$this->request->getVar('status'),
			'slug'=>$slug,
			'user_id'=>session()->get('id')
		];
		if ($this->request->getVar('status') == 0) {
			$dataSave['published_at'] = new Time('now');
		}
		$this->galleryModel->save($dataSave);
		$resultDataGambar=$this->arrayGambar(json_decode($this->request->getVar('gambar')),$this->galleryModel->getInsertID());
		// save kategori berita
		$this->photogalleryModel->insertBatch($resultDataGambar);

		session()->setFlashdata('pesan','Data gallery berhasil ditambahkan');

		return redirect()->route('gallery.index');
	}

	public function edit($id)
	{
		$gallery = $this->galleryModel->find($id);
		if (empty($gallery)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('gallery '.$id.' tidak ditemukan');
		}
		$gallery['photo'] = $this->photogalleryModel->getPhotogallery($id);
		$data = [
			'gallery'=>$gallery,
			'validation'=>\Config\Services::validation(),
		];
		return view('admin/gallery/v_edit',$data);
	}
	public function detail($id)
	{
		$gallery = $this->galleryModel->find($id);
		if (empty($gallery)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('gallery '.$id.' tidak ditemukan');
		}
		$gallery['photo'] = $this->photogalleryModel->getPhotogallery($id);
		$data = [
			'gallery'=>$gallery,
		];
		
		return view('admin/gallery/v_detail',$data);
	}

	public function update()
	{
		// dd(json_decode($this->request->getVar('gambar')));
		// TODO : setting validation here
		// validasi input
		$galleryLama = $this->galleryModel->find($this->request->getVar('id'));
		if (!$this->validate([
			'judul' =>[
				'rules'=>'required|is_unique[gallery.judul,id,'.$this->request->getVar('id').']',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} gallery sudah terdaftar'
				],
			],
		])) {
			return redirect()->route('gallery.edit',[$this->request->getVar('gallery_id')]);
		}
		// dd($this->request->getVar());
		$slug = url_title($this->request->getVar('judul'),'-',true);
		$dataUpdate = [
			'id'=>$this->request->getVar('id'),
			'judul'=>$this->request->getVar('judul'),
			'status'=>$this->request->getVar('status'),
			'slug'=>$slug,
			'user_id'=>session()->get('id')
		];
		if ($this->request->getVar('status') == 0 && $this->request->getVar('status') != $galleryLama['status'] ) {
			$dataUpdate['published_at'] = new Time('now');
		}
		$this->galleryModel->save($dataUpdate);

		if ($this->request->getVar('gambar')) {
			# code...
			$resultDataGambar=$this->arrayGambar(json_decode($this->request->getVar('gambar')),$galleryLama['id']);
			// save kategori berita
			$this->photogalleryModel->insertBatch($resultDataGambar);
		}

		session()->setFlashdata('pesan','Data gallery berhasil diubah');

		return redirect()->route('gallery.index');
	}

	public function delete()
	{
		$gallery = $this->galleryModel->find($this->request->getVar('id'));
		$gallery['photo'] = $this->photogalleryModel->getPhotogallery($this->request->getVar('id'));
		if (empty($gallery)) {
			session()->setFlashdata('error','Data gallery gagal dihapus');
			return redirect()->route('gallery.index');
		}

		foreach ($gallery['photo'] as $key => $photo) {
			# code...
			// cek gambar default
			if ($photo['gambar'] != 'gambar/default.jpg') {
				// Hapus Gambar
				unlink('uploads/'.$photo['gambar']);
			}
		}
		$this->galleryModel->delete($this->request->getVar('id'));
		session()->setFlashdata('pesan','Data berhasil dihapus');
		return redirect()->route('gallery.index');
	}
	public function deletePhotoGallery()
	{
		$photo = $this->photogalleryModel->find($this->request->getVar('id'));
		// cek gambar default
		if ($photo['gambar'] != 'gambar/default.jpg') {
			// Hapus Gambar
			unlink('uploads/'.$photo['gambar']);
		}
		$this->photogalleryModel->delete($this->request->getVar('id'));
		session()->setFlashdata('pesan','photo gallery berhasil dihapus');
		return redirect()->route('gallery.edit',[$this->request->getVar('gallery_id')]);
	}

	private function arrayGambar($inputGambar,$galleryId)
	{
		$dataGambar = [];
		
		// dd($inputGambar);
		for ($i=0; $i < count($inputGambar); $i++) { 
			$dataGambar[] = [
				'gambar'=>$inputGambar[$i],
				'gallery_id'=>$galleryId
			];
		}
		// dd($dataGambar);
		return $dataGambar;
		
	}

	public function publish($id)
	{
		$gallery = $this->galleryModel->find($id);
		if (empty($gallery)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('gallery '.$id.' tidak ditemukan');
		}
		$this->galleryModel->save([
			'id'=>$gallery['id'],
			'status'=>0,
			'published_at'=>new Time('now')
		]);
		return redirect()->route('gallery.detail',[$gallery['id']]);
	}

	public function draft($id)
	{
		$gallery = $this->galleryModel->find($id);
		if (empty($gallery)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('gallery '.$id.' tidak ditemukan');
		}
		$this->galleryModel->save([
			'id'=>$gallery['id'],
			'status'=>1,
		]);
		return redirect()->route('gallery.detail',[$gallery['id']]);
	}
}

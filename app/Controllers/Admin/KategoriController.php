<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class KategoriController extends BaseController
{
	protected $kategoriModel;
	public function __construct()
	{
		$this->kategoriModel = new KategoriModel(); 
	}
	public function index()
	{
		$kategori = $this->kategoriModel->findAll();
		$data = [
			'kategori' =>$kategori
		];
		return view('admin/kategori/v_index',$data);
	}

	public function detail($id)
	{
		$kategori = $this->kategoriModel->find($id);
		$data = [
			'kategori'=>$kategori
		];
		if (empty($data['kategori'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Kategori '.$id.' tidak ditemukan');
		}
		return view('admin/kategori/v_detail',$data);
	}

	public function create()
	{
		$data = [
			'validation'=>\Config\Services::validation()
		];
		return view('admin/kategori/v_create',$data);
	}

	public function store()
	{
		// dd($this->request->getVar());
		// TODO : setting validation here
		// validasi input
		if (!$this->validate([
			'nama' =>[
				'rules'=>'required|is_unique[kategori.nama]',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} kategori sudah terdaftar'
				],
			],
		])) {
			return redirect()->route('kategori.create')->withInput();
		}
		// dd($this->request->getVar());
		$slug = url_title($this->request->getVar('nama'),'-',true);
		$this->kategoriModel->save([
			'nama'=>$this->request->getVar('nama'),
			'slug'=>$slug,
		]);

		session()->setFlashdata('pesan','Data Kategori berhasil ditambahkan');

		return redirect()->route('kategori.index');
	}

	public function edit($id)
	{
		$kategori = $this->kategoriModel->find($id);
		$data = [
			'kategori'=>$kategori,
			'validation'=>\Config\Services::validation()
		];
		if (empty($data['kategori'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Kategori '.$id.' tidak ditemukan');
		}
		return view('admin/kategori/v_edit',$data);
	}

	public function update()
	{
		
		$kategoriLama = $this->kategoriModel->find($this->request->getVar('id'));
		// TODO check old & new nama
		if ($kategoriLama['nama'] == $this->request->getVar('nama')) {
			$rule_nama = 'required';
		} else {
			$rule_nama = 'required|is_unique[kategori.nama]';
		}
		// TODO : add validation
		if (!$this->validate([
			'nama' =>[
				'rules'=>$rule_nama,
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} kategori sudah terdaftar'
				],
			],
		])) {
			return redirect()->route('kategori.edit',[$kategoriLama['id']])->withInput();
		}
		// dd($this->request->getVar());
		$slug = url_title($this->request->getVar('nama'),'-',true);
		$this->kategoriModel->save([
			'id'=>$this->request->getVar('id'),
			'nama'=>$this->request->getVar('nama'),
			'slug'=>$slug,
		]);

		session()->setFlashdata('pesan','Data Kategori berhasil diubah');

		return redirect()->route('kategori.index');
	}

	public function delete()
	{
		$kategori = $this->kategoriModel->find($this->request->getVar('id'));
		if (empty($kategori)) {
			session()->setFlashdata('error','Data kategori gagal dihapus');
			return redirect()->route('kategori.index');
		}
		$this->kategoriModel->delete($this->request->getVar('id'));
		session()->setFlashdata('pesan','Data berhasil dihapus');
		return redirect()->route('kategori.index');
	}
}

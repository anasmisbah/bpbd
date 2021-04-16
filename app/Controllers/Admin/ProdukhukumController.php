<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProdukhukumModel;

class ProdukhukumController extends BaseController
{
	protected $produkhukumModel;
	public function __construct()
	{
		$this->produkhukumModel = new ProdukhukumModel(); 
	}
	public function index()
	{
		$produkhukum = $this->produkhukumModel->findAll();
		$data = [
			'produkhukum' =>$produkhukum
		];
		return view('admin/produkhukum/v_index',$data);
	}

	public function detail($id)
	{
		$produkhukum = $this->produkhukumModel->find($id);
		$data = [
			'produkhukum'=>$produkhukum
		];
		if (empty($data['produkhukum'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('produkhukum '.$id.' tidak ditemukan');
		}
		return view('admin/produkhukum/v_detail',$data);
	}

	public function create()
	{
		$data = [
			'validation'=>\Config\Services::validation()
		];
		return view('admin/produkhukum/v_create',$data);
	}

	public function store()
	{
		// dd($this->request->getVar());
		// TODO : setting validation here
		// validasi input
		if (!$this->validate([
			'nama' =>[
				'rules'=>'required|is_unique[produk_hukum.nama]',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} produk hukum sudah terdaftar'
				],
			],
		])) {
			return redirect()->route('produkhukum.create')->withInput();
		}
		// dd($this->request->getVar());
		$slug = url_title($this->request->getVar('nama'),'-',true);
		$this->produkhukumModel->save([
			'nama'=>$this->request->getVar('nama'),
			'slug'=>$slug,
		]);

		session()->setFlashdata('pesan','Data produkhukum berhasil ditambahkan');

		return redirect()->route('produkhukum.index');
	}

	public function edit($id)
	{
		$produkhukum = $this->produkhukumModel->find($id);
		$data = [
			'produkhukum'=>$produkhukum,
			'validation'=>\Config\Services::validation()
		];
		if (empty($data['produkhukum'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('produkhukum '.$id.' tidak ditemukan');
		}
		return view('admin/produkhukum/v_edit',$data);
	}

	public function update()
	{
		$produkhukumLama = $this->produkhukumModel->find($this->request->getVar('id'));
		// TODO check old & new nama
		if ($produkhukumLama['nama'] == $this->request->getVar('nama')) {
			$rule_nama = 'required';
		} else {
			$rule_nama = 'required|is_unique[produk_hukum.nama]';
		}
		// TODO : add validation
		if (!$this->validate([
			'nama' =>[
				'rules'=>$rule_nama,
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} produk hukum sudah terdaftar'
				],
			],
		])) {
			return redirect()->route('produkhukum.edit',[$produkhukumLama['id']])->withInput();
		}
		// dd($this->request->getVar());
		$slug = url_title($this->request->getVar('nama'),'-',true);
		$this->produkhukumModel->save([
			'id'=>$this->request->getVar('id'),
			'nama'=>$this->request->getVar('nama'),
			'slug'=>$slug,
		]);

		session()->setFlashdata('pesan','Data produkhukum berhasil diubah');

		return redirect()->route('produkhukum.index');
	}

	public function delete()
	{
		$produkhukum = $this->produkhukumModel->find($this->request->getVar('id'));
		if (empty($produkhukum)) {
			session()->setFlashdata('error','Data produkhukum gagal dihapus');
			return redirect()->route('produkhukum.index');
		}
		$this->produkhukumModel->delete($this->request->getVar('id'));
		session()->setFlashdata('pesan','Data berhasil dihapus');
		return redirect()->route('produkhukum.index');
	}
}

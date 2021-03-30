<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\KategoriModel;

class KategoriController extends BaseController
{
	protected $kategoriModel;
	public function __constructor()
	{
		$this->kategoriModel = new KategoriModel(); 
	}
	public function index()
	{
		$kategori = $this->kategoriModel->find();
		$data = [
			'kategori' =>$kategori
		];
		return view('admin/kategori/v_index',$data);
	}

	public function detail($id)
	{
		$kategori = $this->kategoriModel->find($id);
		$data = [
			'katgori'=>$kategori
		];
		if (empty($data['katgori'])) {
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
		// TODO : setting validation here


		$slug = url_title($this->request->getVar('nama'),'-',true);
		$this->kategoriModel->save([
			'nama'=>$this->request->getVar('nama'),
			'slug'=>$slug,
		]);

		session()->setFlashdata('pesan','Data berhasil ditambahkan');

		return redirect()->route('kategori.index');
	}

	public function edit($id)
	{
		$kategori = $this->kategoriModel->find($id);
		$data = [
			'katgori'=>$kategori,
			'validation'=>\Config\Services::validation()
		];
		if (empty($data['katgori'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Kategori '.$id.' tidak ditemukan');
		}
		return view('admin/kategori/v_edit',$data);
	}

	public function update()
	{
		$kategoriLama = $this->kategoriModel->find($this->request->getVar('id'));
		// TODO : add validation

		// TODO check old & new nama

		$slug = url_title($this->request->getVar('nama'),'-',true);
		$this->kategoriModel->save([
			'id'=>$this->request->getVar('id'),
			'nama'=>$this->request->getVar('nama'),
			'slug'=>$slug,
		]);

		session()->setFlashdata('pesan','Data berhasil diubah');

		return redirect()->route('kategori.index');
	}

	public function delete()
	{
		$this->kategoriModel->delete($id);
		session()->setFlashdata('pesan','Data berhasil dihapus');
		return redirect()->route('kategori.index');
	}
}

<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProfilModel;

class ProfilController extends BaseController
{
	protected $profilModel;
	public function __construct()
	{
		$this->profilModel = new ProfilModel(); 
	}
	public function detail($id)
	{
		$profil = $this->profilModel->find($id);
		if (empty($profil)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('profil '.$id.' tidak ditemukan');
		}
		$data = [
			'profil' =>$profil
		];
		return view('admin/profil/v_detail',$data);
	}
	public function edit($id)
	{
		$profil = $this->profilModel->find($id);
		if (empty($profil)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('profil '.$id.' tidak ditemukan');
		}
		$data = [
			'profil' =>$profil,
			'validation'=>\Config\Services::validation()
		];
		return view('admin/profil/v_edit',$data);
	}

	public function update()
	{
		// dd($this->request->getVar());
		$profilLama = $this->profilModel->find($this->request->getVar('id'));
		// TODO : add validation
		if (!$this->validate([
			'judul' =>[
				'rules'=>'required',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
				],
			],
		])) {
			return redirect()->route('profil.edit',[$profilLama['id']])->withInput();
		}

		$dataUpdate = [
			'id'=>$this->request->getVar('id'),
			'judul'=>$this->request->getVar('judul'),
			'deskripsi'=>$this->request->getVar('deskripsi'),
		];
		// dd($dataUpdate);
		$this->profilModel->save($dataUpdate);
		session()->setFlashdata('pesan','Data profil berhasil diubah');

		return redirect()->route('profil.detail',[$profilLama['id']]);
	}
}

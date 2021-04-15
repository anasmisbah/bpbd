<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KontakModel;

class KontakController extends BaseController
{
	protected $kontakModel;
	public function __construct()
	{
		$this->kontakModel = new KontakModel(); 
	}
	public function detail()
	{
		$kontak = $this->kontakModel->first();
		$data = [
			'kontak' =>$kontak
		];
		return view('admin/kontak/v_detail',$data);
	}
	public function edit()
	{
		$kontak = $this->kontakModel->first();
		$data = [
			'kontak' =>$kontak,
			'validation'=>\Config\Services::validation()
		];
		return view('admin/kontak/v_edit',$data);
	}

	public function update()
	{
		// dd($this->request->getVar());
		$kontakLama = $this->kontakModel->find($this->request->getVar('id'));
		// TODO : add validation
		if (!$this->validate([
			'email' =>[
				'rules'=>'required',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
				],
			],
			'no_telepon' =>[
				'rules'=>'required',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
				],
			],
			'alamat' =>[
				'rules'=>'required',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
				],
			],
			'facebook' =>[
				'rules'=>'required',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
				],
			],
			'twitter' =>[
				'rules'=>'required',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
				],
			],
			'youtube' =>[
				'rules'=>'required',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
				],
			],
			'instagram' =>[
				'rules'=>'required',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
				],
			],
		])) {
			return redirect()->route('kontak.edit')->withInput();
		}

		$dataUpdate = [
			'id'=>$this->request->getVar('id'),
			'email'=>$this->request->getVar('email'),
			'no_telepon'=>$this->request->getVar('no_telepon'),
			'alamat'=>$this->request->getVar('alamat'),
			'facebook'=>$this->request->getVar('facebook'),
			'twitter'=>$this->request->getVar('twitter'),
			'instagram'=>$this->request->getVar('instagram'),
			'youtube'=>$this->request->getVar('youtube'),
		];
		// dd($dataUpdate);
		$this->kontakModel->save($dataUpdate);
		session()->setFlashdata('pesan','Data kontak berhasil diubah');

		return redirect()->route('kontak.detail');
	}
}

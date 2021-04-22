<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TentangkamiModel;

class TentangkamiController extends BaseController
{
	protected $tentangkamiModel;
	public function __construct()
	{
		$this->tentangkamiModel = new TentangkamiModel(); 
	}
	public function detail()
	{
		$tentangkami = $this->tentangkamiModel->first();
		$data = [
			'tentangkami' =>$tentangkami
		];
		return view('admin/tentangkami/v_detail',$data);
	}
	public function edit()
	{
		$tentangkami = $this->tentangkamiModel->first();
		$data = [
			'tentangkami' =>$tentangkami,
			'validation'=>\Config\Services::validation()
		];
		return view('admin/tentangkami/v_edit',$data);
	}

	public function update()
	{
		// dd($this->request->getVar());
		$tentangkamiLama = $this->tentangkamiModel->find($this->request->getVar('id'));
		// TODO : add validation
		if (!$this->validate([
			'judul' =>[
				'rules'=>'required',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
				],
			],
			'subjudul' =>[
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
		])) {
			return redirect()->route('tentangkami.edit')->withInput();
		}

		$dataUpdate = [
			'id'=>$this->request->getVar('id'),
			'judul'=>$this->request->getVar('judul'),
			'subjudul'=>$this->request->getVar('subjudul'),
			'deskripsi'=>$this->request->getVar('deskripsi'),
		];
		// dd($dataUpdate);
		$this->tentangkamiModel->save($dataUpdate);
		session()->setFlashdata('pesan','Data tentang kami berhasil diubah');

		return redirect()->route('tentangkami.detail');
	}
}

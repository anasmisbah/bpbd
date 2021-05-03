<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BencanaModel;

class BencanaController extends BaseController
{
	protected $bencanaModel;
	public function __construct()
	{
		$this->bencanaModel = new BencanaModel(); 
	}
	public function detail($id)
	{
		$bencana = $this->bencanaModel->find($id);
		if (empty($bencana)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('bencana '.$id.' tidak ditemukan');
		}
		$data = [
			'bencana' =>$bencana
		];
		return view('admin/bencana/v_detail',$data);
	}
	public function edit($id)
	{
		$bencana = $this->bencanaModel->find($id);
		if (empty($bencana)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('bencana '.$id.' tidak ditemukan');
		}
		$data = [
			'bencana' =>$bencana,
			'validation'=>\Config\Services::validation()
		];
		return view('admin/bencana/v_edit',$data);
	}

	public function update()
	{
		// dd($this->request->getVar());
		$bencanaLama = $this->bencanaModel->find($this->request->getVar('id'));
		// TODO : add validation
		if (!$this->validate([
			'judul' =>[
				'rules'=>'required',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
				],
			],
		])) {
			return redirect()->route('bencana.edit',[$bencanaLama['id']])->withInput();
		}

		$dataUpdate = [
			'id'=>$this->request->getVar('id'),
			'judul'=>$this->request->getVar('judul'),
			'deskripsi'=>$this->request->getVar('deskripsi'),
		];
		// dd($dataUpdate);
		$this->bencanaModel->save($dataUpdate);
		session()->setFlashdata('pesan','Data bencana berhasil diubah');

		return redirect()->route('bencana.detail',[$bencanaLama['id']]);
	}
}

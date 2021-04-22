<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\NilaikamiModel;

class NilaikamiController extends BaseController
{
	protected $nilaikamiModel;
	public function __construct()
	{
		$this->nilaikamiModel = new NilaikamiModel(); 
	}
	public function index()
	{
		$nilaikami = $this->nilaikamiModel->findAll();
		$data = [
			'nilaikami' =>$nilaikami
		];
		return view('admin/nilaikami/v_index',$data);
	}

	public function detail($id)
	{
		$nilaikami = $this->nilaikamiModel->find($id);
		$data = [
			'nilaikami'=>$nilaikami
		];
		if (empty($data['nilaikami'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('nilai kami '.$id.' tidak ditemukan');
		}
		return view('admin/nilaikami/v_detail',$data);
	}

	public function create()
	{
		$data = [
			'validation'=>\Config\Services::validation()
		];
		return view('admin/nilaikami/v_create',$data);
	}

	public function store()
	{
		// dd($this->request->getVar());
		// TODO : setting validation here
		// validasi input
		if (!$this->validate([
			'judul' =>[
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
			return redirect()->route('nilaikami.create')->withInput();
		}
		$this->nilaikamiModel->save([
			'judul'=>$this->request->getVar('judul'),
			'deskripsi'=>$this->request->getVar('deskripsi'),
		]);

		session()->setFlashdata('pesan','Data nilai kami berhasil ditambahkan');

		return redirect()->route('nilaikami.index');
	}

	public function edit($id)
	{
		$nilaikami = $this->nilaikamiModel->find($id);
		$data = [
			'nilaikami'=>$nilaikami,
			'validation'=>\Config\Services::validation()
		];
		if (empty($data['nilaikami'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('nilai kami '.$id.' tidak ditemukan');
		}
		return view('admin/nilaikami/v_edit',$data);
	}

	public function update()
	{
		
		$nilaikamiLama = $this->nilaikamiModel->find($this->request->getVar('id'));
		if (!$this->validate([
			'judul' =>[
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
			return redirect()->route('nilaikami.edit',[$nilaikamiLama['id']])->withInput();
		}
		// dd($this->request->getVar());
		$this->nilaikamiModel->save([
			'id'=>$this->request->getVar('id'),
			'judul'=>$this->request->getVar('judul'),
			'deskripsi'=>$this->request->getVar('deskripsi'),
		]);

		session()->setFlashdata('pesan','Data nilai kami berhasil diubah');

		return redirect()->route('nilaikami.index');
	}

	public function delete()
	{
		$nilaikami = $this->nilaikamiModel->find($this->request->getVar('id'));
		if (empty($nilaikami)) {
			session()->setFlashdata('error','Data nilai kami gagal dihapus');
			return redirect()->route('nilaikami.index');
		}
		$this->nilaikamiModel->delete($this->request->getVar('id'));
		session()->setFlashdata('pesan','Data berhasil dihapus');
		return redirect()->route('nilaikami.index');
	}
}

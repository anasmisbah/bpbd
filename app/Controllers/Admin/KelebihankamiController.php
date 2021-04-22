<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KelebihankamiModel;

class KelebihankamiController extends BaseController
{
	protected $kelebihankamiModel;
	public function __construct()
	{
		$this->kelebihankamiModel = new KelebihankamiModel(); 
	}
	public function index()
	{
		$kelebihankami = $this->kelebihankamiModel->findAll();
		$data = [
			'kelebihankami' =>$kelebihankami
		];
		return view('admin/kelebihankami/v_index',$data);
	}

	public function detail($id)
	{
		$kelebihankami = $this->kelebihankamiModel->find($id);
		$data = [
			'kelebihankami'=>$kelebihankami
		];
		if (empty($data['kelebihankami'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('kelebihan kami '.$id.' tidak ditemukan');
		}
		return view('admin/kelebihankami/v_detail',$data);
	}

	public function create()
	{
		$data = [
			'validation'=>\Config\Services::validation()
		];
		return view('admin/kelebihankami/v_create',$data);
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
			'icon' =>[
				'rules'=>'required',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
				],
			],
		])) {
			return redirect()->route('kelebihankami.create')->withInput();
		}
		$this->kelebihankamiModel->save([
			'judul'=>$this->request->getVar('judul'),
			'icon'=>$this->request->getVar('icon'),
		]);

		session()->setFlashdata('pesan','Data kelebihan kami berhasil ditambahkan');

		return redirect()->route('kelebihankami.index');
	}

	public function edit($id)
	{
		$kelebihankami = $this->kelebihankamiModel->find($id);
		$data = [
			'kelebihankami'=>$kelebihankami,
			'validation'=>\Config\Services::validation()
		];
		if (empty($data['kelebihankami'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('kelebihan kami '.$id.' tidak ditemukan');
		}
		return view('admin/kelebihankami/v_edit',$data);
	}

	public function update()
	{
		
		$kelebihankamiLama = $this->kelebihankamiModel->find($this->request->getVar('id'));
		if (!$this->validate([
			'judul' =>[
				'rules'=>'required',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
				],
			],
			'icon' =>[
				'rules'=>'required',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
				],
			],
		])) {
			return redirect()->route('kelebihankami.edit',[$kelebihankamiLama['id']])->withInput();
		}
		// dd($this->request->getVar());
		$this->kelebihankamiModel->save([
			'id'=>$this->request->getVar('id'),
			'judul'=>$this->request->getVar('judul'),
			'icon'=>$this->request->getVar('icon'),
		]);

		session()->setFlashdata('pesan','Data kelebihan kami berhasil diubah');

		return redirect()->route('kelebihankami.index');
	}

	public function delete()
	{
		$kelebihankami = $this->kelebihankamiModel->find($this->request->getVar('id'));
		if (empty($kelebihankami)) {
			session()->setFlashdata('error','Data kelebihan kami gagal dihapus');
			return redirect()->route('kelebihankami.index');
		}
		$this->kelebihankamiModel->delete($this->request->getVar('id'));
		session()->setFlashdata('pesan','Data berhasil dihapus');
		return redirect()->route('kelebihankami.index');
	}
}

<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;
use App\Models\VideoModel;

class VideoController extends BaseController
{
	protected $videoModel;
	public function __construct()
	{
		$this->videoModel = new VideoModel(); 
	}
	public function index()
	{
		$video = $this->videoModel->findAll();
		$data = [
			'video' =>$video
		];
		return view('admin/video/v_index',$data);
	}

	public function detail($id)
	{
		$video = $this->videoModel->find($id);
		$data = [
			'video'=>$video
		];
		if (empty($data['video'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('video '.$id.' tidak ditemukan');
		}
		return view('admin/video/v_detail',$data);
	}

	public function create()
	{
		$data = [
			'validation'=>\Config\Services::validation(),
		];
		return view('admin/video/v_create',$data);
	}

	public function store()
	{
		// TODO : setting validation here
		// validasi input
		if (!$this->validate([
			'judul' =>[
				'rules'=>'required|is_unique[video.judul]',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} video sudah terdaftar'
				],
			],
			'url'=>[
				'rules'=> 'required|valid_url',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
					'valid_url' => '{field} tidak valid',
				]
			]
		])) {
			return redirect()->route('video.create')->withInput();
		}
		// dd($this->request->getVar());
		$slug = url_title($this->request->getVar('judul'),'-',true);
		$dataSave = [
			'judul'=>$this->request->getVar('judul'),
			'deskripsi'=>$this->request->getVar('deskripsi'),
			'status'=>$this->request->getVar('status'),
			'url'=>$this->request->getVar('url'),
			'slug'=>$slug,
			'user_id'=>session()->get('id')
		];
		if ($this->request->getVar('status') == 0) {
			$dataSave['published_at'] = new Time('now');
		}
		$this->videoModel->save($dataSave);

		session()->setFlashdata('pesan','Data video berhasil ditambahkan');

		return redirect()->route('video.index');
	}

	public function edit($id)
	{
		$video = $this->videoModel->find($id);
		$data = [
			'video'=>$video,
			'validation'=>\Config\Services::validation(),
		];
		if (empty($data['video'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('video '.$id.' tidak ditemukan');
		}
		return view('admin/video/v_edit',$data);
	}

	public function update()
	{
		// dd($this->request->getVar());
		$videoLama = $this->videoModel->find($this->request->getVar('id'));
		// TODO : add validation
		if (!$this->validate([
			'judul' =>[
				'rules'=>'required|is_unique[video.judul,id,'.$this->request->getVar('id').']',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} video sudah terdaftar'
				],
			],
			'url'=>[
				'rules'=> 'required',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
				]
			]
		])) {
			return redirect()->route('video.edit',[$videoLama['id']])->withInput();
		}

		$slug = url_title($this->request->getVar('judul'),'-',true);
		$dataUpdate = [
			'id'=>$this->request->getVar('id'),
			'judul'=>$this->request->getVar('judul'),
			'deskripsi'=>$this->request->getVar('deskripsi'),
			'url'=>$this->request->getVar('url'),
			'slug'=>$slug,
		];
		if ($this->request->getVar('status') == 0 && $this->request->getVar('status') != $videoLama['status'] ) {
			$dataUpdate['published_at'] = new Time('now');
		}
		// dd($dataUpdate);
		$this->videoModel->save($dataUpdate);
		session()->setFlashdata('pesan','Data video berhasil diubah');

		return redirect()->route('video.index');
	}

	public function delete()
	{
		$video = $this->videoModel->find($this->request->getVar('id'));
		if (empty($video)) {
			session()->setFlashdata('error','Data video gagal dihapus');
			return redirect()->route('video.index');
		}
		$this->videoModel->delete($this->request->getVar('id'));
		session()->setFlashdata('pesan','Data berhasil dihapus');
		return redirect()->route('video.index');
	}

	public function publish($id)
	{
		$video = $this->videoModel->find($id);
		if (empty($video)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('video '.$id.' tidak ditemukan');
		}
		$this->videoModel->save([
			'id'=>$video['id'],
			'status'=>0,
			'published_at'=>new Time('now')
		]);
		return redirect()->route('video.detail',[$video['id']]);
	}

	public function draft($id)
	{
		$video = $this->videoModel->find($id);
		if (empty($video)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('video '.$id.' tidak ditemukan');
		}
		$this->videoModel->save([
			'id'=>$video['id'],
			'status'=>1,
		]);
		return redirect()->route('video.detail',[$video['id']]);
	}
}

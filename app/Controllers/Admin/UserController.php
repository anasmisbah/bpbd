<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
	protected $userModel;
	public function __construct()
	{
		$this->userModel = new UserModel(); 
	}
	public function index()
	{
		$user = $this->userModel->findAll();
		$data = [
			'user' =>$user
		];
		return view('admin/user/v_index',$data);
	}

	public function detail($id)
	{
		$user = $this->userModel->find($id);
		$data = [
			'user'=>$user
		];
		if (empty($data['user'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('user '.$id.' tidak ditemukan');
		}
		return view('admin/user/v_detail',$data);
	}

	public function create()
	{
		$data = [
			'validation'=>\Config\Services::validation(),
		];
		return view('admin/user/v_create',$data);
	}

	public function store()
	{
		// TODO : setting validation here
		// validasi input
		if (!$this->validate([
			'email' =>[
				'rules'=>'required|is_unique[users.email]',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} pengguna sudah terdaftar'
				],
			],
			'password' =>[
				'rules'=>'required',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
				],
			],
			'nama' =>[
				'rules'=>'required',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
				],
			],
			'avatar'=>[
				'rules'=> 'max_size[avatar,5000]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]',
				'errors'=>[
					'max_size' =>'Ukuran gambar terlalu besar',
					'is_image'=> 'Yang anda pilih bukan gambar',
					'mime_in'=> 'Yang anda pilih bukan gambar',
				]
			]
		])) {
			return redirect()->route('user.create')->withInput();
		}
		// dd($this->request->getVar());
		// ambil gambar
		$fileAvatar = $this->request->getFile('avatar');
		
		// apakah tidak ada gambar yg diupoload
		if ($fileAvatar->getError() == 4) {
			$namaAvatar = 'avatar/default.png';
		}else{
			// generate nama file sampul
			$namaAvatar = 'avatar/'.$fileAvatar->getRandomName();
			// pindahkan file ke folder sampul
			$fileAvatar->move('uploads',$namaAvatar);
		}
		$dataSave = [
			'nama'=>$this->request->getVar('nama'),
			'email'=>$this->request->getVar('email'),
			'password'=>password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
			'avatar'=>$namaAvatar,
		];

		$this->userModel->save($dataSave);

		session()->setFlashdata('pesan','Data user berhasil ditambahkan');

		return redirect()->route('user.index');
	}

	public function edit($id)
	{
		$user = $this->userModel->find($id);
		$data = [
			'user'=>$user,
			'validation'=>\Config\Services::validation(),
		];
		if (empty($data['user'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('user '.$id.' tidak ditemukan');
		}
		return view('admin/user/v_edit',$data);
	}

	public function update()
	{
		// dd($this->request->getVar());
		$userLama = $this->userModel->find($this->request->getVar('id'));
		// TODO : add validation
		if (!$this->validate([
			'email' =>[
				'rules'=>'required|is_unique[users.email,id,'.$this->request->getVar('id').']',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
					'is_unique' => '{field} pengguna sudah terdaftar'
				],
			],
			'nama' =>[
				'rules'=>'required',
				'errors'=>[
					'required' => '{field} tidak boleh kosong',
				],
			],
			'avatar'=>[
				'rules'=> 'max_size[avatar,5000]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]',
				'errors'=>[
					'max_size' =>'Ukuran gambar terlalu besar',
					'is_image'=> 'Yang anda pilih bukan gambar',
					'mime_in'=> 'Yang anda pilih bukan gambar',
				]
			]
		])) {
			return redirect()->route('berita.edit',[$userLama['id']])->withInput();
		}
		// dd($this->request->getVar());
		// ambil gambar
		$fileAvatar = $this->request->getFile('avatar');

		// cek gambar apakah tetap gambar lama
		if ($fileAvatar->getError() == 4) {
			$namaAvatar = $this->request->getVar('avatarLama');
		}else{
			// generate nama file avatar
			$namaAvatar = 'avatar/'.$fileAvatar->getRandomName();
			// pindahkan file ke folder img
			$fileAvatar->move('uploads/',$namaAvatar);
			// Hapus Gambar
			if ($userLama['avatar'] != 'avatar/default.png') {
				unlink('uploads/'.$userLama['avatar']);
			}
			
		}
		$dataUpdate = [
			'id'=>$this->request->getVar('id'),
			'nama'=>$this->request->getVar('nama'),
			'email'=>$this->request->getVar('email'),
			'avatar'=>$namaAvatar,
		];
		if ($this->request->getVar('password')) {
			$verify_pass = password_verify($this->request->getVar('password'), $userLama['password']);
			if (!$verify_pass) {
				$dataUpdate['password'] = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
			}
		}
		// dd($dataUpdate);
		$this->userModel->save($dataUpdate);
		$session = session();
		$ses_data = [
			'id'       => $this->request->getVar('id'),
			'nama'     => $this->request->getVar('nama'),
			'email'    => $this->request->getVar('email'),
			'avatar'   => $namaAvatar,
			'last_login'=>$userLama['last_login'], 
			'logged_in'     => TRUE
		];
		$session->set($ses_data);
		session()->setFlashdata('pesan','Data berita berhasil diubah');

		return redirect()->route('pengguna.profile');
	}

	public function delete()
	{
		$user = $this->userModel->find($this->request->getVar('id'));
		if (empty($user)) {
			session()->setFlashdata('error','Data user gagal dihapus');
			return redirect()->route('user.index');
		}
		// cek gambar default
		if ($user['avatar'] != 'avatar/default.png') {
			// Hapus Gambar
			unlink('uploads/'.$user['avatar']);
		}
		$this->userModel->delete($this->request->getVar('id'));
		session()->setFlashdata('pesan','Data berhasil dihapus');
		return redirect()->route('user.index');
	}

	public function profile()
	{
		$idUser = session()->get('id');
		$user = $this->userModel->find($idUser);
		$data = [
			'user'=>$user
		];
		if (empty($data['user'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('user '.$id.' tidak ditemukan');
		}
		return view('admin/auth/v_profile',$data);
	}

	public function profileEdit()
	{
		$idUser = session()->get('id');
		$user = $this->userModel->find($idUser);
		$data = [
			'user'=>$user,
			'validation'=>\Config\Services::validation(),
		];
		if (empty($data['user'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('user '.$id.' tidak ditemukan');
		}
		return view('admin/auth/v_edit_profile',$data);
	}
}

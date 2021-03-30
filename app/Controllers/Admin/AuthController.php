<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
	public function loginPage()
	{
		$session = session();
		if(session()->get('logged_in')){
			// maka redirct ke halaman login
			return redirect()->back(); 
		}
		return view('admin/auth/v_login');
	}

	public function login()
	{
		$session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'id'       => $data['id'],
                    'nama'     => $data['nama'],
                    'email'    => $data['email'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->route('admin.dashboard');
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->route('login.page');
            }
        }else{
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->route('login.page');
        }
	}

	public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->route('login.page');
    }
}

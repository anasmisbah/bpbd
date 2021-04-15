<?php

namespace App\Controllers;

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
		return view('pages/kontak/v_detail_kontak',$data);
	}
}

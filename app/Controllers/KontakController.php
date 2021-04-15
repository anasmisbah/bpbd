<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class KontakController extends BaseController
{
	public function detail()
	{
		return view('pages/kontak/v_detail_kontak');
	}
}

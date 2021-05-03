<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ErrorController extends BaseController
{
	public function show404()
	{
		if (url_is('admin*')) { 
			echo view('admin/errors/v_404');
		}else{
			echo view('pages/errors/v_404');
		}
	}
}

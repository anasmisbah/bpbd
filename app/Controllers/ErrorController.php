<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ErrorController extends BaseController
{
	public function show404()
	{
		echo view('admin/errors/v_404');
	}
}

<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
	public function dashboard()
	{
		// dd($this->request->uri->getSegment(2));
		return view('admin\v_dashboard');
	}
}

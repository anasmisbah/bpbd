<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

class HomeController extends BaseController
{
	protected $beritaModel;
	public function __construct()
	{
		$this->beritaModel = new BeritaModel(); 
	}
	public function index()
	{
		$beritaTerbaru = $this->beritaModel->getLatestBerita();
		$data = [
			'beritaTerbaru' =>$beritaTerbaru,
		];
		return view('pages/v_home',$data);
	}
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\BencanaModel;

class BencanaController extends BaseController
{
	protected $beritaModel;
	protected $bencanaModel;
	public function __construct()
	{
		$this->beritaModel = new BeritaModel(); 
		$this->bencanaModel = new BencanaModel(); 
	}
	public function detail($slug)
	{
		$beritaTerbaru = $this->beritaModel->getLatestBerita();
		$bencana = $this->bencanaModel->getDataBencana($slug);
		$data = [
			'bencana' =>$bencana,
			'beritaTerbaru' =>$beritaTerbaru,
		];
		return view('pages/bencana/v_detail_bencana',$data);
	}
}

<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class UploadController extends BaseController
{
	// upload image from summernote
	public function uploadImage()
	{
		$gambar = $this->request->getFile('image');
		// dd($gambar);
		// apakah tidak ada gambar yg diupoload
		if ($gambar->getError() == 4) {
			return false;
		}else{
			// generate nama file sampul
			$namaGambar = 'gambar/'.$gambar->getRandomName();
			// pindahkan file ke folder sampul
			$gambar->move('uploads',$namaGambar);
		}
		$data = [
			'gambar'=>base_url('uploads/'.$namaGambar)
		];
		// $data = [
		// 	'gambar'=>$gambar->getName()
		// ];
		return $this->response->setJSON($data);
	}

	//Delete image summernote
    function deleteImage(){
        $src = $this->request->getVar('src');
        $file_name = str_replace(base_url().'/', '', $src);
        if(unlink($file_name))
        {
			$data = [
				'status'=>'File Delete Successfully'
			];
			return $this->response->setJSON($data);
        }
    }
}

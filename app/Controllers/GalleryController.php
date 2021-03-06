<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GalleryModel;
use App\Models\PhotogalleryModel;

class GalleryController extends BaseController
{
	protected $galleryModel;
	protected $photogalleryModel;
	public function __construct()
	{
		$this->galleryModel = new GalleryModel(); 
		$this->photogalleryModel = new PhotogalleryModel(); 
	}
	public function index()
	{
		$gallery = $this->galleryModel->listGallery();
		$galleryPhoto = $this->photogalleryModel->listPhotoGallery($gallery);

		$data = [
			'gallery' =>$galleryPhoto,
			'pager' => $this->galleryModel->pager,
		];
		return view('pages/gallery/v_list_gallery',$data);
	}

	public function detail($slug)
	{
		$gallery = $this->galleryModel->getDataBuku($slug);
		if (empty($gallery)) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
		$gallery['gambar'] = $this->photogalleryModel->getPhotoGallery($gallery['id']);
		$data = [
			'gallery' =>$gallery,
		];
		$this->galleryModel->save([
			'id'=>$gallery['id'],
			'dilihat'=>$gallery['dilihat']+1
		]);
		return view('pages/gallery/v_detail_gallery',$data);
	}
}

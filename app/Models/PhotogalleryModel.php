<?php

namespace App\Models;

use CodeIgniter\Model;

class PhotogalleryModel extends Model
{
	protected $table                = 'photo_gallery';
	// Dates
	protected $useTimestamps        = true;
	protected $allowedFields = ['gallery_id','gambar'];

	public function getPhotogallery($id)
	{
		return $this->select('photo_gallery.id,photo_gallery.gambar')->join('gallery', 'gallery.id = photo_gallery.gallery_id')->where('gallery_id',$id)->findAll();
	}
	public function listPhotoGallery($data)
	{
		foreach ($data as $i => $d) {
			$data[$i]['gambar'] = 	$this->select('photo_gallery.id,photo_gallery.gambar')->where('gallery_id',$d['id'])->findAll();
		}
		return $data;
	}
}

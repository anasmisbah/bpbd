<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
	protected $table                = 'gallery';
	// Dates
	protected $useTimestamps        = true;
	protected $allowedFields = ['judul','status','dilihat','published_at','slug','user_id'];

	public function listGallery()
	{
		return $this->select('gallery.id,gallery.slug,gallery.judul,gallery.published_at,gallery.dilihat,users.nama')
		->join('users', 'users.id = gallery.user_id')->where('status',0)->orderBy('gallery.published_at','DESC')->findAll();
	}

	public function getDataBuku($slug)
	{
		return $this->select('gallery.id,gallery.slug,gallery.judul,gallery.published_at,gallery.dilihat,users.nama')
		->join('users', 'users.id = gallery.user_id')->where('slug',$slug)->first();
	}
}

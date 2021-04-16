<?php

namespace App\Models;

use CodeIgniter\Model;

class VideoModel extends Model
{
	protected $table                = 'video';
	protected $primaryKey           = 'id';
	// Dates
	protected $useTimestamps        = true;
	protected $allowedFields = ['judul','deskripsi','url','slug','user_id','status','published_at','dilihat'];
	public function getLatestVideo()
	{
		return $this->select('video.id,video.slug,video.judul,video.url,video.published_at,video.deskripsi')->where('status',0)->orderBy('published_at','DESC')->findAll(3);
	}

	public function getDataVideo($slug)
	{
		return $this->select('video.id,video.judul,video.published_at,video.url,video.deskripsi,video.slug,video.dilihat')
		->where('slug',$slug)->first();
	}
	public function listVideo()
	{
		return $this->select('video.id,video.slug,video.judul,video.published_at,video.url,video.deskripsi,video.dilihat,users.nama')
		->join('users', 'users.id = video.user_id')->where('status',0)->orderBy('video.published_at','DESC')->paginate(5,'video');
	}
}

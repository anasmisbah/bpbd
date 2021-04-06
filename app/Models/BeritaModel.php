<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
	protected $table                = 'berita';
	protected $primaryKey           = 'id';
	// Dates
	protected $useTimestamps        = true;
	protected $allowedFields = ['judul','deskripsi','sampul','slug','penulis','user_id','status','published_at'];

	public function listBerita()
	{
		return $this->select('berita.id,berita.judul,berita.published_at,berita.sampul,berita.deskripsi,users.nama')
		->join('users', 'users.id = berita.user_id')->where('status',0)->orderBy('berita.published_at','DESC')->paginate(5,'berita');
	}

	public function getLatestBerita()
	{
		return $this->select('berita.id,berita.judul,berita.sampul,berita.published_at')->where('status',0)->orderBy('published_at','DESC')->findAll(3);
	}
}

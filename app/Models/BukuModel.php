<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
	protected $table                = 'buku';
	protected $primaryKey           = 'id';
	// Dates
	protected $useTimestamps        = true;
	protected $allowedFields = ['judul','deskripsi','sampul','slug','penulis','user_id','status','published_at','dilihat','penerbit','buku'];

	public function listBuku()
	{
		return $this->select('buku.id,buku.slug,buku.judul,buku.published_at,buku.sampul,buku.deskripsi,buku.dilihat,buku.penerbit,users.nama')
		->join('users', 'users.id = buku.user_id')->where('status',0)->orderBy('buku.published_at','DESC')->paginate(6,'buku');
	}
	public function getDataBuku($slug)
	{
		return $this->select('buku.id,buku.judul,buku.published_at,buku.sampul,buku.deskripsi,buku.slug,buku.penulis,buku.dilihat,users.nama,buku.penerbit,buku.buku')
		->join('users', 'users.id = buku.user_id')->where('slug',$slug)->first();
	}
}

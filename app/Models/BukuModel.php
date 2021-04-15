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
}

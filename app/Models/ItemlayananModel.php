<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemlayananModel extends Model
{
	protected $table                = 'item_layanan';
	// Dates
	protected $useTimestamps        = true;
	protected $allowedFields = ['judul','deskripsi','gambar'];
}

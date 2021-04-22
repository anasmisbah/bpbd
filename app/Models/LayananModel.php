<?php

namespace App\Models;

use CodeIgniter\Model;

class LayananModel extends Model
{
	protected $table                = 'layanan';
	// Dates
	protected $useTimestamps        = true;
	protected $allowedFields = ['judul','subjudul','gambar'];
}

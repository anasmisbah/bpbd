<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
	protected $table                = 'kategori';
	// Dates
	protected $useTimestamps        = true;
	protected $allowedFields = ['nama','slug'];
}

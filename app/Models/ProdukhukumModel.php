<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukhukumModel extends Model
{
	protected $table                = 'produk_hukum';
	// Dates
	protected $useTimestamps        = true;
	protected $allowedFields = ['nama','slug'];
}

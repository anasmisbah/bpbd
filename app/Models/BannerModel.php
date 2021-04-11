<?php

namespace App\Models;

use CodeIgniter\Model;

class BannerModel extends Model
{
	protected $table                = 'banner';
	// Dates
	protected $useTimestamps        = true;
	protected $allowedFields = ['gambar'];
}

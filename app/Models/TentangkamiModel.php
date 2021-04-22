<?php

namespace App\Models;

use CodeIgniter\Model;

class TentangkamiModel extends Model
{
	protected $table                = 'tentang_kami';
	// Dates
	protected $useTimestamps        = true;
	protected $allowedFields = ['judul','subjudul','deskripsi'];
}

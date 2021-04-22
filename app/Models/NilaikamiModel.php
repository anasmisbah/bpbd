<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaikamiModel extends Model
{
	protected $table                = 'nilai_kami';
	// Dates
	protected $useTimestamps        = true;
	protected $allowedFields = ['judul','deskripsi'];
}

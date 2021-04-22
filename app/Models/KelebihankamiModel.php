<?php

namespace App\Models;

use CodeIgniter\Model;

class KelebihankamiModel extends Model
{
	protected $table                = 'kelebihan_kami';
	// Dates
	protected $useTimestamps        = true;
	protected $allowedFields = ['judul','icon'];
}

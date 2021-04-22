<?php

namespace App\Models;

use CodeIgniter\Model;

class KontakModel extends Model
{
	protected $table                = 'kontak';
	// Dates
	protected $useTimestamps        = true;
	protected $allowedFields = ['email','alamat','no_telepon','facebook','youtube','twitter','instagram'];
}

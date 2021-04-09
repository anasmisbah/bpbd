<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
	protected $table                = 'profil';
	protected $primaryKey           = 'id';
	// Dates
	protected $useTimestamps        = true;
	protected $allowedFields = ['judul','deskripsi','slug'];
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class BencanaModel extends Model
{
	protected $table                = 'bencana';
	protected $primaryKey           = 'id';
	// Dates
	protected $useTimestamps        = true;
	protected $allowedFields = ['judul','deskripsi','slug'];
}

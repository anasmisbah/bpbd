<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
	protected $table                = 'gallery';
	// Dates
	protected $useTimestamps        = true;
	protected $allowedFields = ['judul','status','dilihat','published_at','slug','user_id'];
}

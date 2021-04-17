<?php

namespace App\Models;

use CodeIgniter\Model;

class FilehukumModel extends Model
{
	protected $table                = 'file_hukum';
	protected $primaryKey           = 'id';
	// Dates
	protected $useTimestamps        = true;
	protected $allowedFields = ['judul','tentang','file','slug','user_id','status','published_at','didownload','produk_hukum_id'];
}

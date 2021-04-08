<?php

namespace App\Models;

use CodeIgniter\Model;

class VideoModel extends Model
{
	protected $table                = 'video';
	protected $primaryKey           = 'id';
	// Dates
	protected $useTimestamps        = true;
	protected $allowedFields = ['judul','deskripsi','url','slug','user_id','status','published_at','dilihat'];
}

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

	public function getDataBencana($slug)
	{
		return $this->select('bencana.id,bencana.judul,bencana.deskripsi,bencana.slug')->where('slug',$slug)->first();
	}
}

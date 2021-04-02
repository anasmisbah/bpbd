<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriberitaModel extends Model
{
	protected $table                = 'kategori_berita';
	protected $primaryKey           = 'id';
	// Dates
	protected $useTimestamps        = true;
	protected $allowedFields = ['berita_id','kategori_id'];
	
	public function getKategoriBerita($id)
	{
		return $this->select('kategori_berita.kategori_id,kategori.nama')->join('kategori', 'kategori.id = kategori_berita.kategori_id')->where('berita_id',$id)->findAll();
	}

	public function syncKategoriBerita($dataKategori,$berita_id)
	{
		$this->where('berita_id',$berita_id)->delete();
		$this->insertBatch($dataKategori);
	}
}

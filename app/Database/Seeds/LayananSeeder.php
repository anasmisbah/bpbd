<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class LayananSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'judul' => 'Layanan Kami',
				'subjudul' => 'Layanan BPBD provinsi Kalimantar Timur',
				'gambar' => 'gambar/default.png',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
		];
		// Using Query Builder
		// $this->db->table('orang')->insert($data);
		$this->db->table('layanan')->insertBatch($data);
	}
}

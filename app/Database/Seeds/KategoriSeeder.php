<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class KategoriSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'nama' => 'Pemerintahan',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],	
			[
				'nama' => 'Umum',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],	
			[
				'nama' => 'Sosial',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],	
			[
				'nama' => 'Pendidikan',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'nama' => 'Pelatihan',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'nama' => 'Lingkungan',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'nama' => 'Agama',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'nama' => 'Wisata',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'nama' => 'Politik',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'nama' => 'Hukum',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'nama' => 'Seni Budaya & Hiburan',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],	
			[
				'nama' => 'Hiburan',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
		];
		// Using Query Builder
		// $this->db->table('orang')->insert($data);
		$this->db->table('kategori')->insertBatch($data);
	}
}

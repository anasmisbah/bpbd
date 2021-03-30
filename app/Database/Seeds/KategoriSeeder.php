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
				'slug' =>'pemerintahan',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],	
			[
				'nama' => 'Umum',
				'slug' =>'umum',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],	
			[
				'nama' => 'Sosial',
				'slug' =>'sosial',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],	
			[
				'nama' => 'Pendidikan',
				'slug' =>'pendidikan',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'nama' => 'Pelatihan',
				'slug' =>'pelatihan',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'nama' => 'Lingkungan',
				'slug' =>'lingkungan',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'nama' => 'Agama',
				'slug' =>'agama',
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
				'slug' =>'politik',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'nama' => 'Hukum',
				'slug' =>'hukum',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'nama' => 'Seni Budaya',
				'slug' =>'seni-budaya',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],	
			[
				'nama' => 'Hiburan',
				'slug' =>'hiburan',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
		];
		// Using Query Builder
		// $this->db->table('orang')->insert($data);
		$this->db->table('kategori')->insertBatch($data);
	}
}

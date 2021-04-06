<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
class KategoriberitaSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'kategori_id' =>2,
				'berita_id'    =>1,
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'kategori_id' =>2,
				'berita_id'    =>2,
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'kategori_id' =>3,
				'berita_id'    =>2,
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'kategori_id' =>3,
				'berita_id'    =>3,
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'kategori_id' =>6,
				'berita_id'    =>3,
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'kategori_id' =>1,
				'berita_id'    =>5,
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'kategori_id' =>2,
				'berita_id'    =>5,
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'kategori_id' =>6,
				'berita_id'    =>5,
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'kategori_id' =>2,
				'berita_id'    =>6,
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'kategori_id' =>6,
				'berita_id'    =>6,
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'kategori_id' =>2,
				'berita_id'    =>7,
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'kategori_id' =>3,
				'berita_id'    =>7,
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'kategori_id' =>3,
				'berita_id'    =>8,
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'kategori_id' =>6,
				'berita_id'    =>9,
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'kategori_id' =>1,
				'berita_id'    =>10,
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'kategori_id' =>6,
				'berita_id'    =>4,
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
		];
		// Using Query Builder
		// $this->db->table('orang')->insert($data);
		$this->db->table('kategori_berita')->insertBatch($data);
	}
}

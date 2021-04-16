<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ProdukhukumSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'nama' => 'Undang-undang',
				'slug' =>url_title('Undang-undang','-',true),
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'nama' => 'Peraturan Presiden',
				'slug' =>url_title('Peraturan Presiden','-',true),
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'nama' => 'Peraturan Pemerintah',
				'slug' =>url_title('Peraturan Pemerintah','-',true),
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'nama' => 'Peraturan Kepala BNPB',
				'slug' =>url_title('Peraturan Kepala BNPB','-',true),
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
		];
		// Using Query Builder
		// $this->db->table('orang')->insert($data);
		$this->db->table('produk_hukum')->insertBatch($data);
	}
}

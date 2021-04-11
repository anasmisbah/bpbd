<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class BannerSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'gambar' => 'banner/banner1.png',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
		];
	// Using Query Builder
	// $this->db->table('orang')->insert($data);
	$this->db->table('banner')->insertBatch($data);
	}
}

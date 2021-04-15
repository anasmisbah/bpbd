<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
class KontakSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'email' => 'bpbd@kaltimprov.go.id',
				'alamat' => 'Jl. MT. Haryono No.46, Air Putih, Kec. Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75124',
				'no_telepon' => '(0541) 741040',
				'facebook' => 'www.facebook.com',
				'twitter' => 'www.twitter.com',
				'instagram' => 'www.instagram.com',
				'youtube' => 'www.youtube.com',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
		];
	// Using Query Builder
	// $this->db->table('orang')->insert($data);
	$this->db->table('kontak')->insertBatch($data);
	}
}

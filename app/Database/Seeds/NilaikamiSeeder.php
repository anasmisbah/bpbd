<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class NilaikamiSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'judul' => 'Nilai Kami',
				'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pretium nunc sed tortor facilisis mattis. Pellentesque dignissim nisi ac tortor dignissim, id vulputate nulla volutpat.',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
		];
		// Using Query Builder
		// $this->db->table('orang')->insert($data);
		$this->db->table('nilai_kami')->insertBatch($data);
	}
}

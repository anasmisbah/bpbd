<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class BencanaSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'judul' => 'DEFINISI BENCANA',
				'slug'=>'definisi-bencana',
				'deskripsi'=>'',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'judul' => 'SISTEM PENANGGULANGAN BENCANA',
				'slug'=>'sistem-penanggulangan-bencana',
				'deskripsi'=>'',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'judul' => 'POTENSI ANCAMAN BENCANA',
				'slug'=>'potensi-ancaman-bencana',
				'deskripsi'=>'',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
		];

		$this->db->table('bencana')->insertBatch($data);
	}
}

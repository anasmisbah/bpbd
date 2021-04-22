<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class TentangkamiSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'judul' => 'Tentang Kami',
				'subjudul' => 'BPBD provinsi Kalimantar Timur',
				'deskripsi' => 'BPBD Provinsi Kalimantan Timur Merupakan Lembaga Teknis Yang Mempunyai Tugas Untuk Melakukan Koordinasi Dan Penyelenggaraan Serta Pelayanan Administrasi Di Bidang Penanggulangan Bencana.',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
		];
		// Using Query Builder
		// $this->db->table('orang')->insert($data);
		$this->db->table('tentang_kami')->insertBatch($data);
	}
}

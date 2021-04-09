<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ProfilSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'judul' => 'Sejarah BPBD Provinsi Kalimantan Timur',
				'slug'=>'sejarah-bpbd-provinsi-kaltim',
				'deskripsi'=>'',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'judul' => 'Visi dan Misi BPBD Provinsi Kalimantan Timur',
				'slug'=>'visi-dan-misi-bpbd-provinsi-kaltim',
				'deskripsi'=>'',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'judul' => 'Tugas dan Fungsi BPBD Provinsi Kalimantan Timur',
				'slug'=>'tugas-dan-fungsi-bpbd-provinsi-kaltim',
				'deskripsi'=>'',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'judul' => 'Struktur Organisasi BPBD Provinsi Kalimantan Timur',
				'slug'=>'struktur-organisasi-bpbd-provinsi-kaltim',
				'deskripsi'=>'',
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
		];

		$this->db->table('profil')->insertBatch($data);
	}
}

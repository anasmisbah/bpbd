<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class BukuSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'judul' => 'Rencana Nasional Penanggulangan Bencana 2020-2024',
				'sampul'=> 'sampul/buku_1.png',
				'buku'=> 'buku/buku_1.pdf',
				'slug'=> url_title('Rencana Nasional Penanggulangan Bencana 2020-2024','-',true),
				'deskripsi'=>'Rencana Nasional Penanggulangan Bencana 2020-2024',
				'status'=>0,
				'penulis' => 'Bidang Informasi',
				'penerbit' => 'Bidang Data',
				'user_id'=>1,
				'published_at'=>new Time('now'),
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'judul' => 'Buku Saku Tanggap Tangkas Tangguh Cetakan Kelima 2020',
				'sampul'=> 'sampul/buku_2.png',
				'buku'=> 'buku/buku_2.pdf',
				'slug'=> url_title('Buku Saku Tanggap Tangkas Tangguh Cetakan Kelima 2020','-',true),
				'deskripsi'=>'Hai #SahabatTangguh , Indonesia dikenal sebagai negara yang rawan bencana. Yuk tingkatkan kesiapsiagaan kita menghadapi bencana dengan mengenali dan mempelajari potensi bahaya bencana yang ada disekitar kita.',
				'status'=>0,
				'penulis' => 'Superaadmin Humas',
				'penerbit' => 'Pusat Data Informasi dan Komunikasi Kebencanaan BNPB',
				'user_id'=>1,
				'published_at'=>new Time('now'),
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'judul' => 'INDONESIAS EXPERIENCE IN COVID-19 CONTROL',
				'sampul'=> 'sampul/buku_3.png',
				'buku'=> 'buku/buku_3.pdf',
				'slug'=> url_title('INDONESIAS EXPERIENCE IN COVID-19 CONTROL','-',true),
				'deskripsi'=>'INDONESIAS EXPERIENCE IN COVID-19 CONTROL',
				'status'=>0,
				'penulis' => 'Bidang Informasi',
				'penerbit' => 'BNPB',
				'user_id'=>1,
				'published_at'=>new Time('now'),
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'judul' => 'JURNAL DIALOG PENANGGULANGAN BENCANA Volume 11, Nomor 2, Tahun 2020',
				'sampul'=> 'sampul/buku_4.png',
				'buku'=> 'buku/buku_4.pdf',
				'slug'=> url_title('JURNAL DIALOG PENANGGULANGAN BENCANA Volume 11, Nomor 2, Tahun 2020','-',true),
				'deskripsi'=>'JURNAL DIALOG PENANGGULANGAN BENCANA Volume 11, Nomor 2, Tahun 2020 Dalam Jurnal Dialog Penanggulangan Bencana Volume 11 No. 2 Tahun 2020 ini berisi 8 (delapan)',
				'status'=>0,
				'penulis' => 'Bidang Informasi',
				'penerbit' => 'BNPB',
				'user_id'=>1,
				'published_at'=>new Time('now'),
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'judul' => 'Gema BNPB - Awas Pandemik Covid-19',
				'sampul'=> 'sampul/buku_5.jpeg',
				'buku'=> 'buku/buku_5.pdf',
				'slug'=> url_title('Gema BNPB - Awas Pandemik Covid-19','-',true),
				'deskripsi'=>'Gema BNPB - Awas Pandemik Covid-19',
				'status'=>0,
				'penulis' => 'Superadmin Data',
				'penerbit' => 'BNPB',
				'user_id'=>1,
				'published_at'=>new Time('now'),
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'judul' => 'Rekomendasi Standar Penggunaan APD Untuk Penanganan COVID-19 Di Indonesia',
				'sampul'=> 'sampul/buku_6.png',
				'buku'=> 'buku/buku_6.pdf',
				'slug'=> url_title('Rekomendasi Standar Penggunaan APD Untuk Penanganan COVID-19 Di Indonesia','-',true),
				'deskripsi'=>'Rekomendasi Standar Penggunaan APD Untuk Penanganan COVID-19 Di Indonesia',
				'status'=>0,
				'penulis' => 'Andri Sucipto',
				'penerbit' => 'Badan Nasional Penanggulangan Bencana',
				'user_id'=>1,
				'published_at'=>new Time('now'),
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
		];
		// Using Query Builder
		// $this->db->table('orang')->insert($data);
		$this->db->table('buku')->insertBatch($data);
	}
}

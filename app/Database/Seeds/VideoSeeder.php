<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class VideoSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'judul' => 'Pengurangan Risiko Bencana dalam Adaptasi Kebiasaan Baru',
				'url'=> 'https://www.youtube.com/embed/cVBgKn0Ml8c',
				'slug'=>'pengurangan-risiko-bencana-dalam-adaptasi-kebiasaan-baru',
				'deskripsi'=>'<p>Bencana bisa terjadi kapan saja dan dimana saja. Yuk belajar mengurangi risiko bencana melalui video pengurangan risiko bencana dalam adaptasi kebiasaan baru berikut.</p>',
				'status'=>0,
				'user_id'=>1,
				'published_at'=>new Time('now'),
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'judul' => 'Kenali COVID-19 dan Cara Mencegahnya',
				'url'=> 'https://www.youtube.com/embed/eHFKu9pfbZ8',
				'slug'=>'kenali-covid-19-dan-cara-mencegahnya',
				'deskripsi'=>'<p>Berikut adalah karya video iklan layanan masyarakat (ILM) yang dibuat oleh Nadiah Ariqah dari Sulawesi Selatan. Video ini berisi pengenalan serta tips menghadapi pandemi COVID-19 dan menjadi juara pertama dalam Tangguh Awards 2020. </p>',
				'status'=>0,
				'user_id'=>1,
				'published_at'=>new Time('now'),
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
			[
				'judul' => 'Komunikasi Risiko Bencana melalui InaRisk',
				'url'=> 'https://www.youtube.com/embed/16-pJfGrpF0',
				'slug'=>'komunikasi-risiko-bencana-melalui-ina-risk',
				'deskripsi'=>'<p>Tahukah kamu hasil kemajuan pembangunan bisa mengalami kemunduran akibat bencana? Tetapi tahukah juga bahwa “risiko” merupakan suatu potensi yang belum tentu bisa terjadi tetapi suatu risiko bencana dapat dipahami, dikaji, diukur dan dikurangi dengan tujuan pencegahan dan pengurangan dampak sebuah bencana</p>',
				'status'=>0,
				'user_id'=>1,
				'published_at'=>new Time('now'),
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],
		];

		$this->db->table('video')->insertBatch($data);
	}
}

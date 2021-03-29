<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'username' => 'admin',
				'email'    => 'admin@mail.com',
				'password'=> password_hash('123123', PASSWORD_DEFAULT),
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],	
			[
				'username' => 'admin2',
				'email'    => 'admin2@mail.com',
				'password'=> password_hash('123123', PASSWORD_DEFAULT),
				'created_at'=>new Time('now'),
				'updated_at'=>new Time('now')
			],	
		];
	// Using Query Builder
	// $this->db->table('orang')->insert($data);
	$this->db->table('users')->insertBatch($data);
	}
}

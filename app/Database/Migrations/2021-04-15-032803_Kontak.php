<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kontak extends Migration
{
	public function up()
	{
		$this->forge->addField([
				'id'          => [
					'type'           => 'INT',
					'constraint'     => 5,
					'unsigned'       => true,
					'auto_increment' => true,
				],
				'email'       => [
					'type'       => 'VARCHAR',
					'constraint' => '255',
				],
				'alamat'       => [
					'type'       => 'VARCHAR',
					'constraint' => '255',
				],
				'no_telepon'       => [
					'type'       => 'VARCHAR',
					'constraint' => '255',
				],
				'facebook'       => [
					'type'       => 'VARCHAR',
					'constraint' => '255',
				],
				'twitter'       => [
					'type'       => 'VARCHAR',
					'constraint' => '255',
				],
				'instagram'       => [
					'type'       => 'VARCHAR',
					'constraint' => '255',
				],
				'youtube'       => [
					'type'       => 'VARCHAR',
					'constraint' => '255',
				],
				'created_at' =>[
					'type'=>'DATETIME',
					'null'=>true
				],
				'updated_at' =>[
					'type'=>'DATETIME',
					'null'=>true
				]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('kontak');
	}

	public function down()
	{
		$this->forge->dropTable('kontak');
	}
}

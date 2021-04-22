<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Nilaikami extends Migration
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
				'judul'       => [
					'type'       => 'VARCHAR',
					'constraint' => '255',
				],
				'deskripsi'       => [
					'type'       => 'TEXT',
					'null'=>true,
				],
				'created_at' =>[
					'type'=>'DATETIME',
					'null'=>true,
				],
				'updated_at' =>[
					'type'=>'DATETIME',
					'null'=>true
				]
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('nilai_kami');
	}

	public function down()
	{
		$this->forge->dropTable('nilai_kami');
	}
}

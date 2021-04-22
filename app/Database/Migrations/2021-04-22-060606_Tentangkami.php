<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tentangkami extends Migration
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
				'subjudul'       => [
					'type'       => 'VARCHAR',
					'constraint' => '255',
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
		$this->forge->createTable('tentang_kami');
	}

	public function down()
	{
		$this->forge->dropTable('tentang_kami');
	}
}

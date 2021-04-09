<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bencana extends Migration
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
					'unique'         => true,
				],
				'deskripsi'       => [
					'type'       => 'TEXT',
					'null'=>true
				],
				'slug'       => [
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
		$this->forge->createTable('bencana');
	}

	public function down()
	{
		$this->forge->dropTable('bencana');
	}
}

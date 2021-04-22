<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kelebihankami extends Migration
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
				'icon'       => [
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
		$this->forge->createTable('kelebihan_kami');
	}

	public function down()
	{
		$this->forge->dropTable('kelebihan_kami');
	}
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\I18n\Time;

class Visitor extends Migration
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
				'ipaddress'       => [
					'type'       => 'VARCHAR',
					'constraint' => '255',
				],
				'date'       => [
					'type'       => 'DATE',
				],
				'hits'          => [
					'type'           => 'INT',
					'constraint'     => 11,
				],
				'online'          => [
					'type'           => 'DATETIME',
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
		$this->forge->createTable('visitor');
	}

	public function down()
	{
		$this->forge->dropTable('visitor');
	}
}

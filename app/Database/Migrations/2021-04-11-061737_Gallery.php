<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Gallery extends Migration
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
				'slug'       => [
					'type'       => 'VARCHAR',
					'constraint' => '255',
				],
				'status'       => [
					'type'       => 'INT',
					'constraint' => 5,
				],
				'dilihat'       => [
					'type'       => 'INT',
					'constraint' => 11,
					'default'=>0
				],
				'user_id'       => [
					'type'       	=> 'INT',
					'constraint'	=> 5,
					'unsigned'		=> true,
				],
				'published_at' =>[
					'type'=>'DATETIME',
					'null'=>true
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
		$this->forge->addForeignKey('user_id','users','id','CASCADE','CASCADE');
		$this->forge->createTable('gallery');
	}

	public function down()
	{
		$this->forge->dropTable('gallery');
	}
}

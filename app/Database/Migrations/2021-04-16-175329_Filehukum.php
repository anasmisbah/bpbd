<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Filehukum extends Migration
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
				'tentang'       => [
					'type'       => 'TEXT',
					'null'=>true,
				],
				'file'       => [
					'type'       => 'VARCHAR',
					'constraint' => '255',
				],
				'slug'       => [
					'type'       => 'VARCHAR',
					'constraint' => '255',
				],
				'status'       => [
					'type'       => 'INT',
					'constraint' => 5,
				],
				'didownload'       => [
					'type'       => 'INT',
					'constraint' => 11,
					'default'=>0
				],
				'user_id'       => [
					'type'       	=> 'INT',
					'constraint'	=> 5,
					'unsigned'		=> true,
				],
				'produk_hukum_id'       => [
					'type'       	=> 'INT',
					'constraint'	=> 5,
					'unsigned'		=> true,
				],
				'created_at' =>[
					'type'=>'DATETIME',
					'null'=>true,
				],
				'published_at' =>[
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
		$this->forge->addForeignKey('produk_hukum_id','produk_hukum','id','CASCADE','CASCADE');
		$this->forge->createTable('file_hukum');
	}

	public function down()
	{
		$this->forge->dropTable('file_hukum');
	}
}

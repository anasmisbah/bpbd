<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Photogallery extends Migration
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
				'gambar'       => [
					'type'       => 'VARCHAR',
					'constraint' => '255',
					'unique'         => true,
				],
				'gallery_id'       => [
					'type'       	=> 'INT',
					'constraint'	=> 5,
					'unsigned'		=> true,
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
		$this->forge->addForeignKey('gallery_id','gallery','id','CASCADE','CASCADE');
		$this->forge->createTable('photo_gallery');
	}

	public function down()
	{
		$this->forge->dropTable('photo_gallery');
	}
}

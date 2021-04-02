<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KategoriBerita extends Migration
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
				'kategori_id'       => [
					'type'       	=> 'INT',
					'constraint'	=> 5,
					'unsigned'		=> true,
				],
				'berita_id'       => [
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
		$this->forge->addForeignKey('kategori_id','kategori','id','CASCADE','CASCADE');
		$this->forge->addForeignKey('berita_id','berita','id','CASCADE','CASCADE');
		$this->forge->createTable('kategori_berita');
	}

	public function down()
	{
		$this->forge->dropTable('kategori_berita');
	}
}

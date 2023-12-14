<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pesanan extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id_pesanan' => [
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => true,
        'auto_increment' => true
      ],
      'user_id' => [
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => true,
      ],
      'produk_id' => [
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => true,
      ],
      'jumlah_produk' => [
        'type' => 'INT',
        'constraint' => 5,
      ],
      'total_harga' => [
        'type' => 'DECIMAL',
        'constraint' => '10,2',
      ],
      'tipe_pengiriman' => [
        'type' => 'ENUM',
        'constraint' => ['instant', 'next-day', 'regular'],
        'default' => 'instant',
      ],
      'created_at' => [
        'type' => 'DATETIME',
        'null' => true,
      ],
      'updated_at' => [
        'type' => 'DATETIME',
        'null' => true,
      ],
    ]);

    // Menambahkan foreign key ke user_id
    $this->forge->addForeignKey('user_id', 'user', 'id', 'CASCADE', 'CASCADE');

    // Menambahkan foreign key ke produk_id
    $this->forge->addForeignKey('produk_id', 'produk', 'id', 'CASCADE', 'CASCADE');

    $this->forge->addKey('id_pesanan', true);
    $this->forge->createTable('pesanan');
  }

  public function down()
  {
    $this->forge->dropTable('pesanan');
  }
}

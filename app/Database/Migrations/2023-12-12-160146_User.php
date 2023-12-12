<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id' => [
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => true,
        'auto_increment' => true
      ],
      'username' => [
        'type' => 'VARCHAR',
        'constraint' => 100,
      ],
      'password' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
      ],
      'alamat' => [
        'type' => 'VARCHAR',
        'constraint' => 255,
      ],
      'no_telepon' => [
        'type' => 'VARCHAR',
        'constraint' => 20,
      ],
      'created_at' => [
        'type' => 'DATETIME',
        'null' => true,
      ],
      'updated_at' => [
        'type' => 'DATETIME',
        'null' => true,
      ]
    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('user');
  }

  public function down()
  {
    $this->forge->dropTable('user');
  }
}

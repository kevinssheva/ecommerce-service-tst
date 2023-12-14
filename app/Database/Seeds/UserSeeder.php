<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'username' => 'amjad',
        'password' => 'amjadjugabiargampang',
        'alamat' => 'Jl. Tubagus Ismail XVI',
        'no_telepon' => '081219908333',
        'created_at' => Time::now(),
        'updated_at' => Time::now(),
      ],
      [
        'username' => 'iskandar',
        'password' => 'skandarrrr',
        'alamat' => 'Jl. Cisitu Ismail VI',
        'no_telepon' => '081392902233',
        'created_at' => Time::now(),
        'updated_at' => Time::now(),
      ],
    ];

    // Simple Queries
    // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

    // Using Query Builder
    $this->db->table('user')->insertBatch($data);
  }
}

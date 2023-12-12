<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ProdukSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'nama' => 'Laptop Pro X',
        'deskripsi' => 'Laptop powerful dengan spesifikasi tinggi',
        'harga' => '1500.00',
        'gambar' => 'laptop.jpg',
        'created_at' => Time::now(),
        'updated_at' => Time::now(),
      ],
      [
        'nama' => 'Smartphone Elite Z',
        'deskripsi' => 'Smartphone canggih dengan kamera terbaik',
        'harga' => '899.99',
        'gambar' => 'hp.jpg',
        'created_at' => Time::now(),
        'updated_at' => Time::now(),
      ],
      [
        'nama' => 'Kamera Profesional Y',
        'deskripsi' => 'Kamera untuk fotografer profesional',
        'harga' => '2000.50',
        'gambar' => 'kamera.jpg',
        'created_at' => Time::now(),
        'updated_at' => Time::now(),
      ],
    ];

    // Simple Queries
    // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

    // Using Query Builder
    $this->db->table('produk')->insertBatch($data);
  }
}

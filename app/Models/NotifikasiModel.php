<?php

namespace App\Models;

use CodeIgniter\Model;

class NotifikasiModel extends Model
{
  protected $table = 'notifikasi';
  protected $useTimestamps = true;
  protected $primaryKey = 'id_notifikasi';
  protected $allowedFields = ['user_id', 'status_pengiriman', 'id_pesanan'];

  public function tambahNotifikasi($userId, $statusPengiriman, $idPesanan)
  {
    $data = [
      'user_id' => $userId,
      'status_pengiriman' => $statusPengiriman,
      'id_pesanan' => $idPesanan,
    ];

    // Menambahkan notifikasi ke tabel notifikasi
    return $this->insert($data);
  }

  public function getNotifikasiByUserId($userId)
  {
    if ($userId == false) {
      return $this->findAll();
    }
    return $this->where(['user_id' => $userId])->orderBy('created_at', 'DESC')->findAll();
  }
}

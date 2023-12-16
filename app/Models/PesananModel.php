<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
  protected $table = 'pesanan';
  protected $useTimestamps = true;
  protected $allowedFields = ['id_pesanan','user_id', 'produk_id', 'tipe_pengiriman', 'jumlah_produk', 'total_harga'];

  public function getHistory($id_pesanan = false)
    {
        if ($id_pesanan == false) {
            return $this->findAll();
        }

        return $this->where(['id_pesanan' => $id_pesanan])->first();
    }
}

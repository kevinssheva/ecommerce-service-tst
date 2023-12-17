<?php

namespace App\Controllers;

use App\Models\PesananModel;
use App\Models\ProdukModel;

class History extends BaseController
{
  protected $pesananModel;
  protected $produkModel;

  public function __construct()
  {
    $this->pesananModel = new PesananModel();
    $this->produkModel = new ProdukModel();
  }

  public function index(): string
  {
    $data = [
      'title' => 'Daftar Produk',
      'orderHistory' => $this->pesananModel->findAll(),
      'produk' => $this->produkModel->findAll(),
      'notifikasi' => $this->notifikasiModel->getNotifikasiByUserId(session()->get('user_id'))
    ];
    return view('orderHistory/indeks', $data);
  }

  public function detail($id_pesanan)
  {
    $pesanan = $this->pesananModel->getHistory($id_pesanan);

    $data = [
      'title' => 'detail history pesanan',
      'pesanan' => $pesanan,
      'produk' => $this->produkModel->findAll(),
      'notifikasi' => $this->notifikasiModel->getNotifikasiByUserId(session()->get('user_id'))
    ];
    return view('orderHistory/detail', $data);
  }
}

<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Home extends BaseController
{
  protected $produkModel;
  public function __construct()
  {
    $this->produkModel = new ProdukModel();
  }
  public function index(): string
  {
    $data = [
      'title' => 'Daftar Produk',
      'produk' => $this->produkModel->findAll(),
      'notifikasi' => $this->notifikasiModel->getNotifikasiByUserId(session()->get('user_id'))
    ];
    return view('home/page', $data);
  }
}

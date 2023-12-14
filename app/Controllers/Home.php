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
      'produk' => $this->produkModel->findAll()
    ];
    return view('home/page', $data);
  }
}

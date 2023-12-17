<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Produk extends BaseController
{
  protected $produkModel;

  public function __construct()
  {
    $this->produkModel = new ProdukModel();
  }

  public function index(): string
  {
    // dd($this->produkModel->findAll());
    return view('home/page');
  }

  public function order($id = 0): string
  {
    // session();
    $produk = $this->produkModel->find($id);
    $validation = \Config\Services::validation();
    $data = [
      'title' => 'Order Produk',
      'produk' => $produk,
      'validation_errors' => session()->getFlashdata('validation_errors') ?? ''
    ];
    return view('produk/order', $data);
  }

  public function produkAPI()
  {
    $produk = $this->produkModel->findAll();
    return $this->response->setJSON($produk);
  }

  public function produkDetailAPI($id = 0)
  {
    $produk = $this->produkModel->find($id);
    return $this->response->setJSON($produk);
  }
}

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
      'validation_errors' => session()->getFlashdata('validation_errors') ?? '',
      'notifikasi' => $this->notifikasiModel->getNotifikasiByUserId(session()->get('user_id'))
    ];
    return view('produk/order', $data);
  }

  public function getAllProduct()
  {
    try {
      $produk = $this->produkModel->findAll();

      $response = [
        'status' => 'success',
        'data' => $produk,
      ];

      return $this->response->setJSON($response);
    } catch (\Exception $e) {
      $response = [
        'status' => 'error',
        'message' => 'An error occurred',
      ];

      return $this->response->setStatusCode(500)->setJSON($response);
    }
  }

  public function getProductById($id = 0)
  {
    try {
      $produk = $this->produkModel->find($id);

      if ($produk) {
        $response = [
          'status' => 'success',
          'data' => $produk,
        ];

        return $this->response->setJSON($response);
      } else {
        $response = [
          'status' => 'error',
          'message' => 'Pesanan not found',
        ];
        return $this->response->setStatusCode(404)->setJSON($response);
      }
    } catch (\Exception $e) {
      $response = [
        'status' => 'error',
        'message' => 'An error occurred',
      ];
      return $this->response->setStatusCode(500)->setJSON($response);
    }
  }
}

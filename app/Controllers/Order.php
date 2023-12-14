<?php

namespace App\Controllers;

use App\Models\PesananModel;

class Order extends BaseController
{
  protected $pesananModel;

  public function __construct()
  {
    $this->pesananModel = new PesananModel();
  }

  public function index(): string
  {
    // dd($this->produkModel->findAll());
    return view('home/page');
  }

  public function checkout()
  {
    // dd($this->request->getVar());
    if (!$this->validate([
      'tipe-pengiriman' => 'required',
    ])) {
      $validation = \Config\Services::validation();
      // dd($validation);
      // return redirect()->to('/produk/3')->withInput()->with('validation', $validation);
      return redirect()->to('/produk/3')->withInput();
    }
    $this->pesananModel->save([
      'user_id' => 1,
      'produk_id' => $this->request->getVar('id'),
      'jumlah_produk' => $this->request->getVar('quantity'),
      'tipe_pengiriman' => $this->request->getVar('tipe-pengiriman'),
      'total_harga' => $this->request->getVar('total-belanja')
    ]);

    return redirect()->to('/produk/3');
  }
}
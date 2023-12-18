<?php

namespace App\Controllers;

use App\Models\PesananModel;
use App\Models\ProdukModel;

class Order extends BaseController
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
    // dd($this->produkModel->findAll());
    return view('home/page');
  }

  public function checkout()
  {
    // dd($this->request->getVar());
    if (!$this->validate([
      'tipe-pengiriman' => 'required',
    ])) {
      session()->setFlashdata('validation_errors', $this->validator->getErrors());
      return redirect()->back()->withInput();
    }

    // dd($this->request->getVar());
    $this->pesananModel->save([
      'user_id' => session()->get('user_id'),
      'produk_id' => $this->request->getVar('id'),
      'jumlah_produk' => $this->request->getVar('quantity'),
      'tipe_pengiriman' => $this->request->getVar('tipe-pengiriman'),
      'total_harga' => $this->request->getVar('total-belanja'),
      'nama_penerima' => $this->request->getVar('nama'),
      'telepon' => $this->request->getVar('telepon'),
      'alamat' => $this->request->getVar('alamat'),
    ]);

    session()->setFlashdata('pesan', 'Pesanan berhasil dibuat');
    return redirect()->to('/orderHistory');
  }

  public function orderAPI()
  {
    $pesanan = $this->pesananModel->findAll();

    foreach ($pesanan as &$p) {
      $produkId = $p["produk_id"];
      $p['gambarFileName'] = $this->produkModel->find($produkId)["gambar"];
    }

    return $this->response->setJSON($pesanan);
  }

  public function orderDetailAPI($id_pesanan = 0)
  {
    $pesanan = $this->pesananModel->find($id_pesanan);

    return $this->response->setJSON($pesanan);
  }
}

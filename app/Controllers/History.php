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

  public function index()
  {
    $apiUrl = 'http://localhost:8081/api/pengiriman';

    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); // Waktu maksimal 10 detik
    $response = curl_exec($ch);
    curl_close($ch);


    if ($response) {
      $pengirimanList = json_decode($response, true)['data'];
    } else {
      $pengirimanList = [];
    }

    $pesanan = $this->pesananModel->findAll();
    // Membuat array asosiatif dari array2 berdasarkan id
    $array2Assoc = [];
    foreach ($pengirimanList as $item2) {
      $array2Assoc[$item2['id_pesanan']] = $item2['status'];
    }

    // Menggunakan array_map untuk menyatukan array1 dengan array2
    $joinedArray = array_map(function ($item1) use ($array2Assoc) {
      $id = $item1['id_pesanan'];
      $status = isset($array2Assoc[$id]) ? $array2Assoc[$id] : 'disiapkan';
      return array_merge($item1, ['status' => $status]);
    }, $pesanan);
    // dd($joinedArray, $pengirimanList, $pesanan, $array2Assoc);
    $data = [
      'title' => 'Daftar Produk',
      'orderHistory' => $joinedArray,
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

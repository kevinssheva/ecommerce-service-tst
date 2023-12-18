<?php

namespace App\Controllers;

use App\Models\PesananModel;
use App\Models\ProdukModel;

use function PHPUnit\Framework\isEmpty;

class History extends BaseController
{
  protected $pesananModel;
  protected $produkModel;
  protected $pengirimanList;

  public function __construct()
  {
    $this->pesananModel = new PesananModel();
    $this->produkModel = new ProdukModel();
    $apiUrl = 'http://localhost:8081/api/pengiriman';

    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); // Waktu maksimal 10 detik
    $response = curl_exec($ch);
    curl_close($ch);


    if ($response) {
      $this->pengirimanList = json_decode($response, true)['data'];
    } else {
      $this->pengirimanList = [];
      echo 'Error fetching data!';
    }
  }

  public function index()
  {
    $pesanan = $this->pesananModel->where('user_id', session()->get('user_id'))->orderBy('created_at', 'desc')->findAll();
    // Membuat array asosiatif dari array2 berdasarkan id
    $array2Assoc = [];
    foreach ($this->pengirimanList as $item2) {
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
    $filteredPengiriman = array_filter($this->pengirimanList, function ($pengiriman) use ($id_pesanan) {
      return $pengiriman['id_pesanan'] == $id_pesanan;
    });

    if (empty($filteredPengiriman)) {
      $pesanan['status'] = 'disiapkan';
    } else {
      $pesanan['status'] = reset($filteredPengiriman)['status'];
    }

    $data = [
      'title' => 'detail history pesanan',
      'pesanan' => $pesanan,
      'produk' => $this->produkModel->findAll(),
      'notifikasi' => $this->notifikasiModel->getNotifikasiByUserId(session()->get('user_id'))
    ];
    return view('orderHistory/detail', $data);
  }
}

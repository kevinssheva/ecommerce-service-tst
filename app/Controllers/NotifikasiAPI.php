<?php

namespace App\Controllers;

use App\Models\NotifikasiModel;
use CodeIgniter\RESTful\ResourceController;

class NotifikasiAPI extends ResourceController
{
  protected $notifikasiModel;

  public function __construct()
  {
    $this->notifikasiModel = new NotifikasiModel();
  }

  public function create()
  {
    $request = $this->request->getJSON();

    //validasi input
    if (!$this->validate([
      'user_id' => 'required',
      'status_pengiriman' => 'required',
      'id_pesanan' => 'required',
    ])) {
      return $this->failValidationErrors($this->validator->getErrors());
    }

    $notifikasiModel = new NotifikasiModel();
    $result = $notifikasiModel->tambahNotifikasi($request->user_id, $request->status_pengiriman, $request->id_pesanan);
    if ($result) {
      return $this->respondCreated([
        'status' => 201,
        'error' => null,
        'message' => 'Notifikasi berhasil ditambahkan'
      ]);
    } else {
      return $this->failServerError();
    }
  }
}

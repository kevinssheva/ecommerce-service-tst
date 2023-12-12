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
    dd($this->produkModel->findAll());
    return view('home/page');
  }
}

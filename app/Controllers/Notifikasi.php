<?php

namespace App\Controllers;

use App\Models\NotifikasiModel;

class NotifikasiAPI extends BaseController
{
  protected $notifikasiModel;

  public function __construct()
  {
    $this->notifikasiModel = new NotifikasiModel();
  }
}

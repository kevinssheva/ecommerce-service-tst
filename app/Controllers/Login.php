<?php

namespace App\Controllers;

use App\Models\UserModel;
use SebastianBergmann\Type\NullType;

class Login extends BaseController
{
  protected $userModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
  }

  public function index()
  {
    return view('login');
  }

  public function login_action()
  {
  
      $user_username = $this->request->getPost('user_username');
      $password = $this->request->getPost('password');
  
      if ($user_username == '' or $password == '') {
          $err = "Input your username and password";
      }
  
      if (empty($err)) {
          $dataUser = $this->userModel->where("username", $user_username)->first();
          if ($dataUser && $dataUser['password'] == $password) {
              $sessionData = [
                  'user_id' => $dataUser['id'],
                  'username' => $dataUser['username'],
                  'password' => $dataUser['password'],
                  'alamat' => $dataUser['alamat']
              ];
  
              session()->set($sessionData);
              return redirect()->to(base_url('/'));
          } else {
              $err = "Invalid input";
              return redirect()->to(base_url('login'));
          }
      }
  }

  public function logout()
  {
    session()->destroy();
    return redirect()->to(base_url('login'));
  }
  
  
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Login extends Rest_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('LoginApi_model', 'login');

    $this->methods['index_get']['limit'] = 100;
  }

  public function password_verify($password, $hash)
  {
    if (strlen($hash) !== 60 or strlen($password = crypt($password, $hash)) !== 60) {
      return FALSE;
    }

    $compare = 0;
    for ($i = 0; $i < 60; $i++) {
      $compare |= (ord($password[$i]) ^ ord($hash[$i]));
    }

    return ($compare === 0);
  }

  public function index_get()
  {
    $email = $this->get('email');
    $password = $this->get('password');

    $user = $this->login->getUser($email);

    $cek_password = password_verify($password, $user['password']);

    if ($user == true && $cek_password == true) {
      $this->response(
        [
          'status' => true,
          'data' => $user
        ],
        REST_Controller::HTTP_OK
      );
    } else {
      $this->response([
        'status' => false,
        'message' => 'login first'
      ], REST_Controller::HTTP_NOT_FOUND);
    }
  }
}

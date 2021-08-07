<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class User extends Rest_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('UserApi_model', 'user');

    $this->methods['index_get']['limit'] = 100;
  }
  public function index_get()
  {
    $nim = $this->get('nim');
    $user = $this->user->getUser($nim);
    if ($user == true && $nim != null) {
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
  public function index_put()
  {
    $id = $this->put('id');
    $data = [
      'status' => $this->put('status')
    ];
    if ($this->user->updateUser($data, $id) > 0) {
      $this->response(REST_Controller::HTTP_OK);
    } else {
      $this->response(REST_Controller::HTTP_BAD_REQUEST);
    }
  }
}

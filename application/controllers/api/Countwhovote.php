<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Countwhovote extends Rest_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('CountallvoterApi_model', 'cav');

    $this->methods['index_get']['limit'] = 100;
  }
  public function index_get()
  {
    $user = $this->cav->getWhoVote();

    if ($user) {
      $this->response(
        $user,
        REST_Controller::HTTP_OK
      );
    } else {
      $this->response([
        'status' => false,
        'message' => 'no candidate were found'
      ], REST_Controller::HTTP_NOT_FOUND);
    }
  }
}

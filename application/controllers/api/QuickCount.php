<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class QuickCount extends Rest_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('QuickCountApi_model', 'qc');

    $this->methods['index_get']['limit'] = 100;
  }
  public function index_get()
  {
    $qc = $this->qc->getQuickCount();
    if ($qc) {
      $this->response(
        [
          'status' => true,
          'data' => $qc
        ],
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

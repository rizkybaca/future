<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Voting extends Rest_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('VotingApi_model', 'voting');

    $this->methods['index_get']['limit'] = 100;
  }
  public function index_get()
  {
    $id = $this->get('id');

    if ($id === NULL) {
      $candidate = $this->voting->getCandidate();
    } else {
      $candidate = $this->voting->getCandidate($id);
    }
    if ($candidate) {
      $this->response(
        [
          'status' => true,
          'data' => $candidate
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

<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Candidate extends Rest_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('CandidateApi_model', 'candidate');

    $this->methods['index_get']['limit'] = 100;
  }
  public function index_get()
  {
    $id = $this->get('id');
    $community_id = $this->get('community_id');

    if ($id === NULL) {
      $candidate = $this->candidate->getCandidate($id = null, $community_id);
    } else {
      $candidate = $this->candidate->getCandidate($id, $community_id);
    }
    if ($candidate) {
      $this->response(
        $candidate,
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

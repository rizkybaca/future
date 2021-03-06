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
  public function index_post()
  {
    $data = [
      'candidate_id' => $this->post('candidate_id'),
      'user_id' => $this->post('user_id'),
      'date_voted' => time(),
      'community_id' => $this->post('community_id')
    ];

    if ($this->voting->createVote($data) > 0) {
      $this->response(REST_Controller::HTTP_CREATED);
    } else {
      $this->response(REST_Controller::HTTP_BAD_REQUEST);
    }
  }
}

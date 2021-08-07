<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Quickcount extends Rest_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('QuickCountApi_model', 'qc');

    $this->methods['index_get']['limit'] = 100;
  }
  public function index_get()
  {
    $community_id = $this->get('community_id');
    $qc = $this->qc->getQuickCount($community_id);
    if ($qc) {
      $this->response(
        $qc,
        REST_Controller::HTTP_OK
      );
    } else {
      $this->response(REST_Controller::HTTP_NOT_FOUND);
    }
  }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Admin_model extends CI_Model
{
  public function getUserBySession()
  {
    return $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
  }
}

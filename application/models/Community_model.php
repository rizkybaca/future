<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Community_model extends CI_Model
{
  public function getUserBySession()
  {
    return $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
  }
  public function getCommunityByIdSession($id)
  {
    return $this->db->get_where('user_community', ['id' => $id])->row_array();
  }
  public function editDatacommunity($id)
  {
    $data = [
      "community" => htmlspecialchars($this->input->post('community', true))
    ];
    $this->db->where('id', $id);
    $this->db->update('user_community', $data);
  }
  public function getCommunityByUserId($id)
  {
    return $this->db->get_where('user_community', ['user_id' => $id])->row_array();
  }
}

<?php
class UserApi_model extends CI_Model
{
  public function getUser($nim = null)
  {
    return $this->db->get_where('user', ['nim' => $nim])->row_array();
  }
}

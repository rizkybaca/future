<?php
class UserApi_model extends CI_Model
{
  public function getUser($nim = null)
  {
    return $this->db->get_where('user', ['nim' => $nim])->row_array();
  }
  public function updateUser($data, $id)
  {
    $this->db->update('user', $data, ['id' => $id]);
    return $this->db->affected_rows();
  }
}

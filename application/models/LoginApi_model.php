<?php
class LoginApi_model extends CI_Model
{
  public function getUser($email = null)
  {
    return $this->db->get_where('user', ['email' => $email])->row_array();
  }
}

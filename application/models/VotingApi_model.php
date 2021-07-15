<?php
class VotingApi_model extends CI_Model
{
  public function createVote($data = null)
  {
    $this->db->insert('vote', $data);
    return $this->db->affected_rows();
  }
}

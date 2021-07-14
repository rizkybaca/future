<?php
class VotingApi_model extends CI_Model
{
  public function getCandidate($id = null)
  {
    if ($id === null) {
      return $this->db->get('candidate')->result_array();
    } else {
      return $this->db->get_where('candidate', ['id' => $id])->result_array();
    }
  }
}

<?php
class CandidateApi_model extends CI_Model
{
  public function getCandidate($id = null, $community_id)
  {
    if ($id === null) {
      return $this->db->get_where('candidate', [
        'community_id' => $community_id
      ])->result_array();
    } else {
      return $this->db->get_where('candidate', [
        'id' => $id,
        'community_id' => $community_id
      ])->result_array();
    }
  }
}

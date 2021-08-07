<?php
class CountallvoterApi_model extends CI_Model
{
  public function getAllVoter($community_id)
  {
    $q = "SELECT
					COUNT(`id`) AS `voter`
					FROM `user`
          WHERE `community_id`=$community_id
				";
    return $this->db->query($q)->result_array();
  }
  public function getWhoVote($community_id)
  {
    $q = "SELECT
					COUNT(`id`) AS `voter`
					FROM `user`
          WHERE `status`= 1 AND `community_id`=$community_id
				";
    return $this->db->query($q)->result_array();
  }
  public function getWhoHaventVote($community_id)
  {
    $q = "SELECT
					COUNT(`id`) AS `voter`
					FROM `user`
          WHERE `status`= 0 AND `community_id`=$community_id
				";
    return $this->db->query($q)->result_array();
  }
}

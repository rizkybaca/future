<?php
class CountallvoterApi_model extends CI_Model
{
  public function getAllVoter()
  {
    $q = "SELECT
					COUNT(`id`) AS `voter`
					FROM `user`
				";
    return $this->db->query($q)->result_array();
  }
  public function getWhoVote()
  {
    $q = "SELECT
					COUNT(`id`) AS `voter`
					FROM `user`
          WHERE `status`=1
				";
    return $this->db->query($q)->result_array();
  }
  public function getWhoHaventVote()
  {
    $q = "SELECT
					COUNT(`id`) AS `voter`
					FROM `user`
          WHERE `status`=0
				";
    return $this->db->query($q)->result_array();
  }
}

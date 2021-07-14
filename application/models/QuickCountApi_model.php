<?php
class QuickCountApi_model extends CI_Model
{
  public function getQuickCount()
  {
    $q = "SELECT
					COUNT(`vote`.`id`) AS `voting`, `vote`.`candidate_id` AS `id`, `candidate`.`name` AS `name`
					FROM `vote`
					JOIN `candidate`
					ON `vote`.`candidate_id`=`candidate`.`id`
					GROUP BY `vote`.`candidate_id` 					
				";
    return $this->db->query($q)->result_array();
  }
}

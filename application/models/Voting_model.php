<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Voting_model extends CI_Model
{
	public function getUserBySession()
	{
		return $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	}

	public function getAllCandidate()
	{
		return $this->db->get('candidate')->result_array();
	}

	public function getAllCandidateByCommunityId()
	{
		return $this->db->get_where('candidate', ['community_id' => $this->session->userdata('community_id')])->result_array();
	}

	public function getCandidateStat()
	{
		$q = "SELECT `name`
				FROM `candidate`
				ORDER BY `id` ASC
		";
		return $this->db->query($q)->result_array();
	}

	public function getCandidateStatByCommunityId()
	{
		$community_id = $this->session->userdata('community_id');
		$q = "SELECT `name`
				FROM `candidate`
				WHERE `community_id`=$community_id
				ORDER BY `id` ASC
		";
		return $this->db->query($q)->result_array();
	}

	public function getVoteStat()
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

	public function getVoteStatByCommunityId()
	{
		$community_id = $this->session->userdata('community_id');
		$q = "SELECT
					COUNT(`vote`.`id`) AS `voting`, `vote`.`candidate_id` AS `id`, `candidate`.`name` AS `name`
					FROM `vote`
					JOIN `candidate`
					ON `vote`.`candidate_id`=`candidate`.`id`
					WHERE `vote`.`community_id`=$community_id 					
					GROUP BY `vote`.`candidate_id`
				";
		return $this->db->query($q)->result_array();
	}

	public function getAllVoteStat()
	{
		$q = "SELECT
					COUNT(`vote`.`id`) AS `voting`, `candidate`.`name` AS `name`
					FROM `vote` JOIN `candidate`
					ON `vote`.`candidate_id` = `candidate`.`id`
					GROUP BY `candidate_id` 					
				";
		return $this->db->query($q)->result_array();
	}

	public function getAllVoteStatByCommunityId()
	{
		$community_id = $this->session->userdata('community_id');
		$q = "SELECT
					COUNT(`vote`.`id`) AS `voting`, `candidate`.`name` AS `name`
					FROM `vote` JOIN `candidate`
					ON `vote`.`candidate_id` = `candidate`.`id`
					WHERE `vote`.`community_id`= $community_id				
					GROUP BY `candidate_id`
				";
		return $this->db->query($q)->result_array();
	}

	public function getCandidateById($id)
	{
		return $this->db->get_where('candidate', ['id' => $id])->row_array();
	}

	public function getAllVote()
	{
		return $this->db->get('vote')->result_array();
	}
}

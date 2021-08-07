<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Votes_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getUserBySession()
	{
		return $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	}

	public function getAllVoter()
	{
		return $this->db->get_where('user', ['role_id' => '5'])->result_array();
	}

	public function getAllVoterByCommunityId()
	{
		return $this->db->get_where('user', [
			'role_id' => '5',
			'community_id' => $this->session->userdata('community_id')
		])->result_array();
	}

	public function getAllWhoVote()
	{
		$q = "SELECT
					`vote`.`date_voted`, `user`.`name`, `user`.`email`
					FROM `vote` JOIN `user`
					ON `vote`.`user_id` = `user`.`id`				
				";
		return $this->db->query($q)->result_array();
	}

	public function getAllWhoVoteByCommunityId()
	{
		$community_id = $this->session->userdata('community_id');
		$q = "SELECT `vote`.`date_voted`, `user`.`name`, `user`.`email`
					FROM `vote` JOIN `user`
					ON `vote`.`user_id` = `user`.`id`
					WHERE `vote`.`community_id`= $community_id			
				";
		return $this->db->query($q)->result_array();
	}

	public function getAllVoterCommittees()
	{
		return $this->db->get_where('user', ['role_id' => '2', 'role_id' => '4'])->result_array();
	}

	public function getVoterById($id)
	{
		return $this->db->get_where('user', ['role_id' => '5', 'id' => $id])->row_array();
	}

	public function save($data)
	{
		return $this->db->insert('user', $data);
	}

	public function getAllCandidate()
	{
		return $this->db->get('candidate')->result_array();
	}

	public function getAllCandidateByCommunityId()
	{
		return $this->db->get_where('candidate', ['community_id' => $this->session->userdata('community_id')])->result_array();
	}

	public function getCandidateById($id)
	{
		return $this->db->get_where('candidate', ['id' => $id])->row_array();
	}

	public function deleteDataCandidate($id)
	{
		$this->db->delete('candidate', [
			'id' => $id,
			'community_id' => $this->session->userdata('community_id')
		]);
	}

	public function importDataVoter($data)
	{
		$count = count($data);
		if ($count > 0) {
			$this->db->replace('user', $data);
		}
	}

	public function editDataVoter()
	{
		$data = [
			'email' => htmlspecialchars($this->input->post('email', true)),
			'name' => htmlspecialchars($this->input->post('name', true)),
			'date_modified' => time()
		];
		$this->db->where('id', $this->input->post('id'));
		$this->db->where('community_id', $this->session->userdata('community_id'));
		$this->db->update('user', $data);
	}

	public function deleteDataVoter($id)
	{
		$this->db->delete('user', [
			'id' => $id,
			'community_id' => $this->session->userdata('community_id')
		]);
	}

	public function getAllDataVoting()
	{
		$q = "SELECT
					COUNT(`vote`.`id`) AS `voting`, `candidate`.`name` AS `name`
					FROM `vote` JOIN `candidate`
					ON `vote`.`candidate_id` = `candidate`.`id`
					GROUP BY `candidate_id` 					
				";
		return $this->db->query($q)->result_array();
	}

	public function getAllDataVotingByCommunityId()
	{
		$community_id = $this->session->userdata('community_id');
		$q = "SELECT
					COUNT(`vote`.`id`) AS `voting`, `candidate`.`name` AS `name`
					FROM `vote` JOIN `candidate`
					ON `vote`.`candidate_id` = `candidate`.`id`
					WHERE `vote`.`community_id`=$community_id
					GROUP BY `candidate_id` 					
				";
		return $this->db->query($q)->result_array();
	}

	public function getVoteStat()
	{
		$q = "SELECT
					COUNT(`id`) AS `total`
					FROM `vote` 					
				";
		return $this->db->query($q)->row_array();
	}

	public function getVoteStatByCommunityId()
	{
		$community_id = $this->session->userdata('community_id');
		$q = "SELECT
					COUNT(`id`) AS `total`
					FROM `vote`
					WHERE `community_id`= $community_id				
				";
		return $this->db->query($q)->row_array();
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Votes_model extends CI_Model
{
	public function __construct() {
    parent::__construct();
  }

	public function getUserBySession()
	{
		return $data['user']=$this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
	}

	public function getAllVoter()
	{
		return $this->db->get_where('user', ['role_id'=>'2'])->result_array();
	}
	public function getAllWhoVote()
	{
		$q="SELECT
					`vote`.`date_voted`, `user`.`name`, `user`.`nim`
					FROM `vote` JOIN `user`
					ON `vote`.`user_id` = `user`.`id`				
				";
		return $this->db->query($q)->result_array();
	}
	
	public function getAllVoterCommittees()
	{
		return $this->db->get_where('user', ['role_id'=>'2', 'role_id'=>'4'])->result_array();
	}

	public function getVoterById($id)
	{
		return $this->db->get_where('user', ['role_id'=>'2', 'id'=>$id])->row_array();
	}

	public function save($data)
  {
      return $this->db->insert('user', $data);
  }

  public function getAllCandidate()
	{
		return $this->db->get('candidate')->result_array();
	}

	public function getCandidateById($id)
	{
		return $this->db->get_where('candidate', ['id'=>$id])->row_array();
	}

	public function deleteDataCandidate($id)
	{ 
    $this->db->delete('candidate', ['id'=>$id]);
	}

	public function importDataVoter($data)
	{
		$count=count($data);
		if ($count>0) {
			$this->db->replace('user', $data);
		}
	}

	public function editDataVoter($id)
	{
		$data=[
			'nim'=>$this->input->post('nim', true),
			'name'=>$this->input->post('name', true)
		];
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('user', $data);
	}

	public function deleteDataVoter($id)
	{
		$this->db->delete('user', ['id'=>$id]);
	}

	public function getAllDataVoting()
	{
		$q="SELECT
					COUNT(`vote`.`id`) AS `voting`, `candidate`.`name` AS `name`
					FROM `vote` JOIN `candidate`
					ON `vote`.`candidate_id` = `candidate`.`id`
					GROUP BY `candidate_id` 					
				";
		return $this->db->query($q)->result_array();
	}

	public function getVoteStat()
	{
		$q="SELECT
					COUNT(`id`) AS `total`
					FROM `vote` 					
				";
		return $this->db->query($q)->row_array();
	}
	
}
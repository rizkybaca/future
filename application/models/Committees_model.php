<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Committees_model extends CI_Model
{
	public function getUserBySession()
	{
		return $data['user']=$this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
	}
	public function getAllCommittee()
	{
		return $this->db->get_where('user', ['role_id'=>'4'])->result_array();
	}

	public function importDataVoter($data)
	{
		$count=count($data);
		if ($count>0) {
			$this->db->replace('user', $data);
		}
	}

	public function getCommitteesById($id)
	{
		return $this->db->get_where('user', ['role_id'=>'4', 'id'=>$id])->row_array();
	}

	public function editDataCommittees($id)
	{
		$data=[
			'nim'=>$this->input->post('nim', true),
			'name'=>$this->input->post('name', true)
		];
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('user', $data);
	}

	public function deleteDataCommittee($id)
	{
		$this->db->delete('user', ['id'=>$id]);
	}

}

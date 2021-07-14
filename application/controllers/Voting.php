<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Voting extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Voting_model', 'voting');
	}

	public function index()
	{
		$data['title']='Voting';
		$data['user']=$this->voting->getUserBySession();
		$data['candidate']=$this->voting->getAllCandidate();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('voting/index', $data);
		$this->load->view('templates/footer');
	}

	public function detailCandidate($id)
	{
		$data['title']='Detail Voting';
		$data['user']=$this->voting->getUserBySession();
		$data['candidate']=$this->voting->getCandidateById($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('voting/detail', $data);
		$this->load->view('templates/footer');
	}

	public function voting($id)
	{
		$data['candidate']=$this->voting->getCandidateById($id);
		$data['user']=$this->voting->getUserBySession();

		$vote=[
			'candidate_id'=>$data['candidate']['id'],
			'user_id'=>$data['user']['id'],
			'date_voted'=>time()
		];

		if ($data['user']['role_id']==="2" || $data['user']['role_id']==="1" || $data['user']['role_id']==="4") {
			if ($data['user']['is_active']==="1") {
				$this->db->insert('vote', $vote);

				$this->db->set('status', 1);
				$this->db->where('id', $data['user']['id']);
				$this->db->update('user');
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Voting Success, Check the quick count!</div>');
				redirect('voting');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Belum waktunya akses!</div>');
				redirect('voting');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">You are not a voter!</div>');
			redirect('voting');
		}	
	}

	public function quickCount()
		{
			$data['title']='Quick Count';
			$data['user']=$this->voting->getUserBySession();
			$data['voting']=$this->voting->getAllVoteStat();

			$data['candidate']=$this->voting->getCandidateStat();
			$data['vote']=$this->voting->getVoteStat();

			$this->load->view('templates/chart_header', $data);
			$this->load->view('templates/chart_sidebar', $data);
			$this->load->view('templates/chart_topbar', $data);
			$this->load->view('voting/quick-count', $data);
			$this->load->view('templates/chart_footer', $data);
		}	

}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Admin_model', 'admin');
	}

	public function index()
	{

		$data['title'] = 'Dashboard';
		$data['user'] = $this->admin->getUserBySession();
		$data['voter'] = $this->admin->getVoterStatBy();
		$data['voting'] = $this->admin->getAllCountVote();

		$data['candidate'] = $this->admin->getCandidateStat();
		$data['vote'] = $this->admin->getVoteStat();

		$this->load->view('templates/chart_header', $data);
		$this->load->view('templates/chart_sidebar', $data);
		$this->load->view('templates/chart_topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/chart_footer');
	}

	public function role()
	{
		$data['title'] = 'Role';
		$data['user'] = $this->admin->getUserBySession();
		$data['role'] = $this->db->get('user_role')->result_array();

		$this->form_validation->set_rules('role', 'Role', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/role', $data);
			$this->load->view('templates/footer');
		} else {
			$this->db->insert('user_role', ['role' => $this->input->post('role')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New role added.</div>');
			redirect('admin/role');
		}
	}

	public function roleEdit($id)
	{
		$data['title'] = 'Form Edit Role';
		$data['user'] = $this->admin->getUserBySession();
		$data['role'] = $this->admin->getRoleById($id);

		$this->form_validation->set_rules('role', 'Role', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/role-edit', $data);
			$this->load->view('templates/footer');
		} else {
			$this->admin->editDataRole($id);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role updated!</div>');
			redirect('admin/role');
		}
	}

	public function roleDelete($id)
	{
		$this->admin->deleteRole($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role deleted!</div>');
		redirect('admin/role');
	}

	public function roleaccess($role_id)
	{
		$data['title'] = 'Role Access';
		$data['user'] = $this->admin->getUserBySession();
		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');
	}

	public function changeaccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access changed!</div>');
	}

	
	// public function activate()
	// {

	// 	$data['title'] = 'Activate User';
	// 	$data['user'] = $this->admin->getUserBySession();
	// 	$data['committees'] = $this->admin->getAllCommittees();
	// 	$data['voterpti'] = $this->admin->getAllVoterPti();
	// 	$data['voterpbi'] = $this->admin->getAllVoterPbi();
	// 	$data['voterbk'] = $this->admin->getAllVoterBk();

	// 	$this->load->view('templates/header', $data);
	// 	$this->load->view('templates/sidebar', $data);
	// 	$this->load->view('templates/topbar', $data);
	// 	$this->load->view('admin/activate-user', $data);
	// 	$this->load->view('templates/footer');
	// }

	// public function activateCommittees()
	// {
	// 	$data = ['is_active' => 1];

	// 	$this->db->where('role_id', "4");
	// 	$this->db->update('user', $data);

	// 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Committees now is active!</div>');
	// 	redirect('admin/activate');
	// }

	// public function nonActivateCommittees()
	// {
	// 	$data = ['is_active' => 0];

	// 	$this->db->where('role_id', "4");
	// 	$this->db->update('user', $data);

	// 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Committees now is nonactive!</div>');
	// 	redirect('admin/activate');
	// }

	

	// public function activateVoterPti()
	// {
	// 	$data = ['is_active' => 1];

	// 	$this->db->where('role_id', "2");
	// 	$this->db->where('prodi', "PTI");
	// 	$this->db->update('user', $data);

	// 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Voter now is active!</div>');
	// 	redirect('admin/activate');
	// }

	// public function activateVoterPbi()
	// {
	// 	$data = ['is_active' => 1];

	// 	$this->db->where('role_id', "2");
	// 	$this->db->where('prodi', "PBI");
	// 	$this->db->update('user', $data);

	// 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Voter now is active!</div>');
	// 	redirect('admin/activate');
	// }

	// public function activateVoterBk()
	// {
	// 	$data = ['is_active' => 1];

	// 	$this->db->where('role_id', "2");
	// 	$this->db->where('prodi', "BK");
	// 	$this->db->update('user', $data);

	// 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Voter now is active!</div>');
	// 	redirect('admin/activate');
	// }

	

	// public function nonActivateVoterPti()
	// {
	// 	$data = ['is_active' => 0];

	// 	$this->db->where('role_id', "2");
	// 	$this->db->where('prodi', "PTI");
	// 	$this->db->update('user', $data);

	// 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Voter now is nonactive!</div>');
	// 	redirect('admin/activate');
	// }
	// public function nonActivateVoterPbi()
	// {
	// 	$data = ['is_active' => 0];

	// 	$this->db->where('role_id', "2");
	// 	$this->db->where('prodi', "PBI");
	// 	$this->db->update('user', $data);

	// 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Voter now is nonactive!</div>');
	// 	redirect('admin/activate');
	// }
	// public function nonActivateVoterBk()
	// {
	// 	$data = ['is_active' => 0];

	// 	$this->db->where('role_id', "2");
	// 	$this->db->where('prodi', "BK");
	// 	$this->db->update('user', $data);

	// 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Voter now is nonactive!</div>');
	// 	redirect('admin/activate');
	// }
}

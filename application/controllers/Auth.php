<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('nim')) {
			redirect('user');
		}
		$this->form_validation->set_rules('nim', 'NIM', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run()==FALSE) {
			$data['title']='Login Page';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$nim=$this->input->post('nim');
		$password=$this->input->post('password');

		$user=$this->db->get_where('user', ['nim'=>$nim])->row_array();

		if ($user) {
	
				if (password_verify($password, $user['password'])) {
					$data=[
						'nim'=>$user['nim'],
						'role_id'=>$user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id']==1) {
						redirect('admin/index');
					} else {
						redirect('voting');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
					redirect('auth');
				}

		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIM belum terdaftar! Hubungi pantita untuk lebih lanjut.</div>');
			redirect('auth');
		}
	}

	// public function regist()
	// {
	// 	if ($this->session->userdata('nim')) {
	// 		redirect('user');
	// 	}

	// 	$this->form_validation->set_rules('name', 'Name', 'required|trim');
	// 	$this->form_validation->set_rules('nim', 'NIM', 'required|trim|is_unique[user.nim]', [
	// 		'is_unique' => 'NIM has already registered!'
	// 	]);
	// 	$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
	// 		'matches' => 'Password dont match!',
	// 		'min_length' => 'Password too short!'
	// 	]);
	// 	$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


	// 	if ($this->form_validation->run()==FALSE) {
	// 		$data['title']='Registration Page';
	// 		$this->load->view('templates/auth_header', $data);
	// 		$this->load->view('auth/regist');
	// 		$this->load->view('templates/auth_footer');
	// 	} else {
	// 		$data=[
	// 			'nim'=>htmlspecialchars($this->input->post('nim', true)),
	// 			'password'=>htmlspecialchars(password_hash($this->input->post('password1', true), PASSWORD_DEFAULT)),
	// 			'name'=>htmlspecialchars($this->input->post('name', true)),
	// 			'prodi'=>'PTI',
	// 			'role_id'=>2,
	// 			'is_active'=>0,
	// 			'status'=>0
	// 		];
	// 		$this->db->insert('user', $data);
	// 		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akunmu telah dibuat. Silakan login!</div>');
	// 		redirect('auth');
	// 	}
	// }

	public function logout()
	{
		$this->session->unset_userdata('nim');
		$this->session->unset_userdata('role_id');


		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah berhasil logout!</div>');
		redirect('auth');
	}

	public function blocked()
	{
		$data['title']='Blocked';
		$this->load->view('auth/blocked',$data);

	}


}
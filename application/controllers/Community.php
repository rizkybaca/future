<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Community extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('Community_model', 'community');
  }

  public function index()
  {
    $data['title'] = 'Community';
    $data['user'] = $this->community->getUserBySession();
    $id = $this->session->userdata('community_id');
    $data['community'] = $this->community->getCommunityByIdSession($id);

    $this->form_validation->set_rules('community', 'Community', 'required');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('community/index', $data);
      $this->load->view('templates/footer');
    } else {
      $id = $data['user']['id'];
      $data = [
        'community' => htmlspecialchars($this->input->post('community', true)),
        'user_id' => $id
      ];
      $this->db->insert('user_community', $data);

      $this->session->unset_userdata('community_id');
      $community = $this->community->getCommunityByUserId($id);
      $this->db->set('community_id', $community['id']);
      $this->db->where('id', $id);
      $this->db->update('user');

      $data['user'] = $this->community->getUserBySession();
      $this->session->set_userdata(['community_id' => $data['user']['community_id']]);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New community added.</div>');
      redirect('user');
    }
  }
  public function edit()
  {
    $data['title'] = 'Community';
    $data['user'] = $this->community->getUserBySession();
    $id = $this->session->userdata('community_id');
    $data['community'] = $this->community->getCommunityByIdSession($id);
    $this->form_validation->set_rules('community', 'Community', 'required|trim');
    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Get the right community name!</div>');
      redirect('community');
    } else {
      $this->community->editDatacommunity($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Community has been updated.</div>');
      redirect('user');
    }
  }
}

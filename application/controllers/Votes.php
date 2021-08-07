<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Votes extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('Votes_model', 'votes');
  }

  public function candidate()
  {
    $data['title'] = 'Candidates';
    $data['user'] = $this->votes->getUserBySession();
    $data['candidate'] = $this->votes->getAllCandidateByCommunityId();

    $this->form_validation->set_rules('name', 'Full name', 'required|trim');
    $this->form_validation->set_rules('vision', 'Vision', 'required|trim');
    $this->form_validation->set_rules('mission', 'Mission', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('votes/candidate', $data);
      $this->load->view('templates/footer');
    } else {
      $upload_image = $_FILES['image']['name'];
      $new_image = '';

      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '2048';
        $config['upload_path'] = './assets/img/candidate/';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
          $old_image = $data['candidate']['image'];

          if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/candidate/' . $old_image);
          }

          $new_image = $this->upload->data('file_name');
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
          redirect('votes/candidate');
        }
      }

      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)),
        'image' => $new_image,
        'vision' => htmlspecialchars($this->input->post('vision', true)),
        'mission' => htmlspecialchars($this->input->post('mission', true)),
        'community_id' => $this->session->userdata('community_id')
      ];
      $this->db->insert('candidate', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Candidate added!</div>');
      redirect('votes/candidate');
    }
  }

  public function editCandidate($id)
  {
    $data['title'] = 'Edit Candidate';
    $data['user'] = $this->votes->getUserBySession();
    $data['candidate'] = $this->votes->getCandidateById($id);

    $this->form_validation->set_rules('name', 'Full name', 'required|trim');
    $this->form_validation->set_rules('vision', 'Vision', 'required|trim');
    $this->form_validation->set_rules('mission', 'Mission', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('votes/candidate-edit', $data);
      $this->load->view('templates/footer');
    } else {
      $name     = htmlspecialchars($this->input->post('name', true));
      $vision   = htmlspecialchars($this->input->post('vision', true));
      $mission  = htmlspecialchars($this->input->post('mission', true));

      $upload_image = $_FILES['image']['name'];

      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '2048';
        $config['upload_path'] = './assets/img/candidate/';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
          $old_image = $data['candidate']['image'];

          if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/candidate/' . $old_image);
          }

          $new_image = $this->upload->data('file_name');
          $this->db->set('image', $new_image);
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
          redirect('votes/candidate');
        }
      }
      $this->db->set('name', $name);
      $this->db->set('vision', $vision);
      $this->db->set('mission', $mission);
      $this->db->where('id', $this->input->post('id'));
      $this->db->where('community_id', $this->session->userdata('community_id'));
      $this->db->update('candidate');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Candidate updated!</div>');
      redirect('votes/candidate');
    }
  }

  public function deleteCandidate($id)
  {
    $data['candidate'] = $this->votes->getCandidateById($id);
    $old_image = $data['candidate']['image'];
    if ($old_image != 'default.jpg') {
      unlink(FCPATH . 'assets/img/candidate/' . $old_image);
    }
    $this->votes->deleteDataCandidate($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Candidate deleted!</div>');
    redirect('votes/candidate');
  }

  public function voter()
  {
    $data['title'] = 'Voter';
    $data['user'] = $this->votes->getUserBySession();
    $data['voter'] = $this->votes->getAllVoterByCommunityId();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('votes/voter', $data);
    $this->load->view('templates/footer');
  }

  public function import()
  {
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'xlsx|xls';
    $config['file_name'] = 'doc' . time();
    $this->load->library('upload', $config);

    if ($this->upload->do_upload('file')) {
      $file = $this->upload->data();
      $reader = ReaderEntityFactory::createXLSXReader();

      $reader->open('uploads/' . $file['file_name']);

      foreach ($reader->getSheetIterator() as $sheet) {
        $numRow = 1;
        foreach ($sheet->getRowIterator() as $row) {
          if ($numRow > 1) {
            $data = [
              'email' => htmlspecialchars($row->getCellAtIndex(1)),
              'password' => htmlspecialchars(password_hash($row->getCellAtIndex(2), PASSWORD_DEFAULT)),
              'name' => htmlspecialchars($row->getCellAtIndex(3)),
              'role_id' => 5,
              'is_active' => 0,
              'status' => 0,
              'date_created' => time(),
              'date_modified' => time(),
              'community_id' => $this->session->userdata('community_id')
            ];
            $this->votes->importDataVoter($data);
          }
          $numRow++;
        }
        $reader->close();
        unlink('uploads/' . $file['file_name']);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Import Success!</div>');
        redirect('votes/voter');
      }
    } else {
      echo $this->upload->display_errors();
    }
  }

  public function voterEdit($id)
  {
    $data['title'] = 'Edit Voter';
    $data['user'] = $this->votes->getUserBySession();
    $data['voter'] = $this->votes->getVoterById($id);

    $this->form_validation->set_rules('email', 'Email', 'required|trim');
    $this->form_validation->set_rules('name', 'Full name', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('votes/voter-edit', $data);
      $this->load->view('templates/footer');
    } else {
      $this->votes->editDataVoter($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Voter updated!</div>');
      redirect('votes/voter');
    }
  }

  public function voterDelete($id)
  {
    $this->votes->deleteDataVoter($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Voter deleted!</div>');
    redirect('votes/voter');
  }

  public function report()
  {
    $data['title'] = 'Report';
    $data['user'] = $this->votes->getUserBySession();
    $data['voting'] = $this->votes->getAllDataVotingByCommunityId();
    $data['voter'] = $this->votes->getAllWhoVoteByCommunityId();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('votes/report', $data);
    $this->load->view('templates/footer');
  }

  public function exportVoting()
  {
    $mpdf = new \Mpdf\Mpdf();
    $datauser = $this->votes->getUserBySession();
    $datavoting = $this->votes->getAllDataVotingByCommunityId();
    $datatotal = $this->votes->getVoteStatByCommunityId();
    $data = $this->load->view('pdf/voting', ['voting' => $datavoting, 'user' => $datauser, 'count' => $datatotal], true);
    $mpdf->WriteHTML($data);
    $mpdf->Output();
  }

  public function exportVoter()
  {
    $mpdf = new \Mpdf\Mpdf();
    $datauser = $this->votes->getUserBySession();
    $datavoter = $this->votes->getAllWhoVoteByCommunityId();
    $datatotal = $this->votes->getVoteStatByCommunityId();
    $data = $this->load->view('pdf/voter', ['voter' => $datavoter, 'user' => $datauser, 'count' => $datatotal], true);
    $mpdf->WriteHTML($data);
    $mpdf->Output();
  }
}

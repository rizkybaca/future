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
    is_had_community();
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

    // load lib pagination
    $this->load->library('pagination');

    // get keyword
    if ($this->input->post('submit')) {
      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');
    }

    // config
    $config['total_rows'] = $this->votes->countSearchVoterCommunityId($data['keyword']);
    $data['rows'] = $config['total_rows'];
    $config['per_page'] = 10;

    // init
    $this->pagination->initialize($config);

    $data['start'] = $this->uri->segment(3);
    $data['voter'] = $this->votes->getVotersByCommunityId($config['per_page'], $data['start'], $data['keyword']);

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
      $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
      $password = substr(str_shuffle($chars), 0, 8);

      $reader->open('uploads/' . $file['file_name']);

      foreach ($reader->getSheetIterator() as $sheet) {
        $numRow = 1;
        foreach ($sheet->getRowIterator() as $row) {
          if ($numRow > 1) {
            $email = $row->getCellAtIndex(1);
            $data = [
              'email' => htmlspecialchars($email),
              'password' => htmlspecialchars(password_hash($password, PASSWORD_DEFAULT)),
              'name' => htmlspecialchars($row->getCellAtIndex(2)),
              'role_id' => 5,
              'is_active' => 0,
              'status' => 0,
              'date_created' => time(),
              'date_modified' => time(),
              'community_id' => $this->session->userdata('community_id')
            ];
            $this->votes->importDataVoter($data);
            $this->_sendEmail($password, $email, 'forward');
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

  private function _sendEmail($password, $email, $type)
  {
    //change setting "access app less security" at gmail acc first
    $config = [
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_user' => 'kotaksuara.kangkoding@gmail.com',
      'smtp_pass' => 'drinkAndYolo1',
      'smtp_port' => 465,
      'mailtype' => 'html',
      'charset' => 'utf-8',
      'newline' => "\r\n"
    ];
    $this->load->library('email', $config);
    $this->email->initialize($config);

    $this->email->from('kotaksuara.kangkoding@gmail.com', 'Kotak Suara | by : Kangkoding');
    $this->email->to($email);
    if ($type == 'forward') {
      $message =  'This is your account for election at Kotak Suara. <br/>' .
        'Website : <a href="' . base_url() . '">www.voteapi.kangkoding.com</a> <br/>' .
        'Email : ' . $email . '<br/>' .
        'Password : ' . $password . ' <br/>' .
        'Now you can login with this email and password (when your community admin has already activate this account)';
      $this->email->subject('Your Kotak Suara Account');
      $this->email->message($message);
    }
    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
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

  public function activate()
  {

    $data['title'] = 'Activate Voter';
    $data['user'] = $this->votes->getUserBySession();
    $data['voter'] = $this->votes->getAllVoterByCommunityId();
    $data['new_voter'] = $this->votes->getAllNewVoterByCommunityId();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('votes/activate-voter', $data);
    $this->load->view('templates/footer');
  }

  public function activateVoter()
  {
    $data = ['is_active' => 1];

    $this->db->where('role_id', "5");
    $this->db->where('community_id', $this->session->userdata('community_id'));
    $this->db->update('user', $data);

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Voter now is active!</div>');
    redirect('votes/activate');
  }

  public function nonActivateVoter()
  {
    $data = ['is_active' => 0];

    $this->db->where('role_id', "5");
    $this->db->where('community_id', $this->session->userdata('community_id'));
    $this->db->update('user', $data);

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Voter now is nonactive!</div>');
    redirect('votes/activate');
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

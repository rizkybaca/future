<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Committees extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Committees_model', 'committees');
	}

	public function index($value='')
	{
		$data['title']='Committees';
		$data['user']=$this->committees->getUserBySession();
		$data['committee']=$this->committees->getAllCommittee();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('committees/index', $data);
		$this->load->view('templates/footer');
	}

	public function import()
  {
    $config['upload_path']='./uploads/';
    $config['allowed_types']='xlsx|xls';
    $config['file_name']='doc'.time();
    $this->load->library('upload', $config);

    if ($this->upload->do_upload('file')) {
      $file=$this->upload->data();
      $reader=ReaderEntityFactory::createXLSXReader();

      $reader->open('uploads/'.$file['file_name']);

      foreach ($reader->getSheetIterator() as $sheet) {
        $numRow=1;
          foreach ($sheet->getRowIterator() as $row) {
            if ($numRow>1) {
              $data=[
                'nim'=>htmlspecialchars($row->getCellAtIndex(1)),
                'password'=>htmlspecialchars(password_hash($row->getCellAtIndex(2), PASSWORD_DEFAULT)),
                'name'=>htmlspecialchars($row->getCellAtIndex(3)),
                'prodi'=>htmlspecialchars($row->getCellAtIndex(4)),
                'role_id'=>4,
                'is_active'=>0,
                'status'=>0

              ];
              $this->committees->importDataVoter($data);
            }
            $numRow++;
          }
          $reader->close();
          unlink('uploads/'.$file['file_name']);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Import Success!</div>');
          redirect('committees');   
      }
    } else {
      echo $this->upload->display_errors();
    }
  }

  public function edit($id)
  {
    $data['title']='Edit Committee';
    $data['user']=$this->committees->getUserBySession();
    $data['committee']=$this->committees->getCommitteesById($id);
    
    $this->form_validation->set_rules('nim', 'NIM', 'required|trim|numeric');
    $this->form_validation->set_rules('name', 'Full name', 'required|trim');

    if ($this->form_validation->run()==FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('committees/edit', $data);
      $this->load->view('templates/footer');
    } else {
      $this->committees->editDataCommittees($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Committee updated!</div>');
      redirect('committees');
    }  
  }

  public function delete($id)
  {
    $this->committees->deleteDataCommittee($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Committee deleted!</div>');
    redirect('committees');
  }

}
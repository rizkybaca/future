<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Menu_model extends CI_Model
{

	public function getSubMenu()
	{
		$q="SELECT `user_sub_menu`.*, `user_menu`.`menu`
					FROM `user_sub_menu` JOIN `user_menu`
					ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
					ORDER BY `user_sub_menu`.`menu_id` ASC 					
				";
		return $this->db->query($q)->result_array();
	}

	public function getAllMenu()
	{
		return $this->db->get('user_menu')->result_array();
	}

	public function editDataMenu($id)
	{
		$data=[
			"menu"=>$this->input->post('menu', true)
		];
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('user_menu', $data);
	}

	public function deleteMenu($id)
	{
		$this->db->delete('user_menu', ['id'=>$id]);
	}

	public function getMenuById($id)
	{
		return $this->db->get_where('user_menu', ['id'=>$id])->row_array();
	}

	public function getUserBySession()
	{
		return $data['user']=$this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	}

	public function getSubmenuById($id)
	{
		return $this->db->get_where('user_sub_menu', ['id'=>$id])->row_array();
	}

	public function editDataSubmenu($id)
	{
		$data=[
			"title"=>$this->input->post('title', true),
			"menu_id"=>$this->input->post('menu_id', true),
			"url"=>$this->input->post('url', true),
			"icon"=>$this->input->post('icon', true)
		];
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('user_sub_menu', $data);
	}

	public function deleteDataSubmenu($id)
	{
		$this->db->delete('user_sub_menu', ['id'=>$id]);
	}

}
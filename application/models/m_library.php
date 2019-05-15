<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_library extends CI_Model {

	public function get_security()
	{
		$username = $this->session->userdata('id');
		if(empty($username))
		{
			$this->session->sess_destroy();
			$this->session->set_flashdata('info', 'Maaf Anda belum Login !!');
			redirect('login');
		}
	}
	function cek_login($table,$where)
	{		
		return $this->db->get_where($table,$where);
	}
	public function get_data($table)
	{
		return $this->db->get($table);
	}
	public function insert_data($data,$table)
	{
		return $this->db->insert($table, $data);
	}
	public function edit_data($table,$where)
	{
		return $this->db->get_where($table,$where);
	}
	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	public function delete_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
		
	

}

/* End of file m_library.php */
/* Location: ./application/models/m_library.php */
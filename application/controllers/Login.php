<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_library');
	}
	public function index()
	{	$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			
			$data['judul'] = 'My E-Library Application';

			$this->load->view('v_login', $data);
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$where = array(
				'admin_username' => $username, 
				'admin_password' => md5($password)
			);

			$data = $this->m_library->edit_data('admin',$where);
			$d = $this->m_library->edit_data('admin',$where)->row();
			$cek = $data->num_rows();

			if ($cek > 0) {
				
				$session = array(
					'id'=> $d->admin_id,
					'nama'=> $d->admin_nama,
					'status' => 'login'
				);
				
				$this->session->set_userdata($session);
				
				redirect('admin/dashboard');

			}else{
				$this->session->set_flashdata('info', 'Username & Password Salah');
				redirect('login');
				
			}
		}
		
	}
	public function ubah_password()
	{
		$this->m_library->get_security();
		$data['judul']	= 'Ubah Password - My Library';
		$data['tab1']	= 'Admin';
		$data['tab2']	= 'Ubah Password';
		
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('v_login_ubah', $data);
		$this->load->view('template/footer');
	}
	public function ubah_password_act()
	{
		$pass_lama = $this->input->post('pass_lama');
		$pass_baru = $this->input->post('pass_baru');
		$conf_baru = $this->input->post('conf_baru');

		$where = array(
				'admin_password' => md5($pass_lama)
			);

			$data = $this->m_library->edit_data('admin',$where);
			$cek = $data->num_rows();

			if ($cek > 0) {

				if ($pass_baru == $conf_baru) {
					$where2 = array('admin_id' => $this->session->userdata('id') );
					$data2 = array('admin_password' => md5($pass_baru) );

					$this->m_library->update_data($where2,$data2,'admin');

					$this->session->set_flashdata('info', 'Password Berhasil di ubah');
					redirect('login');
				} else {
					$this->session->set_flashdata('info', 'Password tidak sama');
					redirect('login/ubah_password');
				}


			}else{
					$this->session->set_flashdata('info', 'Password Lama Salah');

				redirect('login/ubah_password');;
			}


		

	}
	public function logout()
	{
		$this->session->set_flashdata('info', 'Anda Telah Logout !!');
		$this->session->sess_destroy();
		
		redirect('login');
	}

		
}


<?php 

class Coba extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_library');
	}
	public function index()
	{
		$data['admin'] = $this->m_library->get_data('admin')->result();
		$this->load->view('coba',$data);
	}
	public function admin_ubah()
	{
		$id = $_POST['id'];

		$data = $this->db->query("SELECT * FROM admin WHERE admin_id='$id' ")->row();
		echo json_encode($data);

	}		
}


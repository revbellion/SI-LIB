<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_library');
	}
	public function index()
	{
		$this->m_library->get_security();
		$data['judul']	= 'Dashboard - My Library';
		$data['tab1']	= 'Home';
		$data['tab2']	= 'Dashboard';
		$data['anggota'] = $this->db->query("select * from anggota order by anggota_id desc limit 10")->result();
		$data['buku'] = $this->db->query("select * from buku order by buku_id desc limit 10")->result();
		$id = $this->session->userdata('id');
		$data['transaksi'] = $this->db->query("SELECT * from transaksi WHERE transaksi_karyawan='$id'  order by transaksi_id desc limit 10")->result();

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('dashboard', $data);
		$this->load->view('template/footer');
	}
	public function dashboard()
	{
		$this->m_library->get_security();
		$data['judul']	= 'Dashboard - My Library';
		$data['tab1']	= 'Home';
		$data['tab2']	= 'Dashboard';
		$data['anggota'] = $this->db->query("select * from anggota order by anggota_id desc limit 10")->result();
		$data['buku'] = $this->db->query("select * from buku order by buku_id desc limit 10")->result();
		$id = $this->session->userdata('id');
		
		$data['transaksi'] = $this->db->query("SELECT * from transaksi WHERE transaksi_karyawan='$id'  order by transaksi_id desc limit 10")->result();
		

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('dashboard', $data);
		$this->load->view('template/footer');
	}

	// CRUD BUKU
	public function buku()
	{
		$this->m_library->get_security();
		$data['judul']	= 'Data Buku - My Library';
		$data['tab1']	= 'Master Data';
		$data['tab2']	= 'Data Buku';
		$data['buku']	= $this->m_library->get_data('buku')->result();

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);

		$this->load->view('buku/buku', $data);
		$this->load->view('template/footer');
	}
	public function buku_add()
	{
		$this->m_library->get_security();

		$data['judul']	= 'Data Buku - My Library';
		$data['tab1']	= 'Master Data';
		$data['tab2']	= 'Tambah Buku';

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);

		$this->load->view('buku/buku_add', $data);
		$this->load->view('template/footer');
	}
	public function buku_add_act()
	{
		$this->m_library->get_security();

		$judul 		= $this->input->post('buku_judul');
		$penulis 	= $this->input->post('buku_penulis');
		$tahun 		= $this->input->post('buku_tahun');
		$status 	= $this->input->post('buku_status');

		$data = array(
						'buku_judul' 	=> $judul, 
						'buku_penulis' 	=> $penulis, 
						'buku_tahun' 	=> $tahun, 
						'buku_status' 	=> $status
		);
			$this->m_library->insert_data($data,'buku');
			$this->session->set_flashdata('info', 'Buku Berhasil Di Tambahkan !!');
			redirect('admin/buku');
		

	}
	// public function buku_edit($id)
	// {
	// 	$this->m_library->get_security();

	// 	$where = array('buku_id' => $id );
		
	// 	$data['judul']	= 'Ubah Buku - My Library';
	// 	$data['tab1']	= 'Master Data';
	// 	$data['tab2']	= 'Ubah Buku';
	// 	$data['buku']   = $this->m_library->edit_data('buku',$where)->result();
	// 	$this->load->view('template/header',$data);
	// 	$this->load->view('template/navbar',$data);

	// 	$this->load->view('buku/buku_ubah', $data);
	// 	$this->load->view('template/footer');
	// }
	public function buku_edit()
	{
		$id = $this->input->post('id');

		$data = $this->db->query("SELECT * FROM buku where buku_id='$id' ")->row();

		echo json_encode($data);
	}
	public function buku_edit_act()
	{
		$this->m_library->get_security();

		$where = array( 'buku_id' => $this->input->post('buku_id') );

		$judul 		= $this->input->post('buku_judul');
		$penulis 	= $this->input->post('buku_penulis');
		$tahun 		= $this->input->post('buku_tahun');
		$status 	= $this->input->post('buku_status');

		$data = array(
						'buku_judul' 	=> $judul, 
						'buku_penulis' 	=> $penulis, 
						'buku_tahun' 	=> $tahun, 
						'buku_status' 	=> $status
		);
		$this->m_library->update_data($where,$data,'buku');
		$this->session->set_flashdata('info', 'Buku Berhasil Di Ubah !!!');
		redirect('admin/buku');

	}
	public function buku_hapus($id)
	{
		$this->m_library->get_security();
		
		$where = array(
						'buku_id' => $id 
					);
		$this->m_library->delete_data($where,'buku');
		$this->session->set_flashdata('info', 'Buku Berhasil Di Hapus !!!');
		redirect('admin/buku');

	}
	public function anggota()
	{
		$this->m_library->get_security();
		$data['judul']	= 'Data Anggota - My Library';
		$data['tab1']	= 'Master Data';
		$data['tab2']	= 'Data Anggota';
		$data['anggota']	= $this->m_library->get_data('anggota')->result();

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);

		$this->load->view('anggota/anggota', $data);
		$this->load->view('template/footer');


	}
	public function anggota_add()
	{
		$this->m_library->get_security();

		$data['judul']	= 'Data Anggota - My Library';
		$data['tab1']	= 'Master Data';
		$data['tab2']	= 'Tambah Anggota';

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);

		$this->load->view('anggota/anggota_add', $data);
		$this->load->view('template/footer');
	}
	public function anggota_add_act()
	{
		$this->m_library->get_security();

		$nama 		= $this->input->post('anggota_nama');
		$alamat 	= $this->input->post('anggota_alamat');
		$jk 		= $this->input->post('anggota_jk');
		$hp 		= $this->input->post('anggota_hp');
		$ktp 		= $this->input->post('anggota_ktp');

		$data = array(
						'anggota_nama' 		=> $nama, 
						'anggota_alamat' 	=> $alamat, 
						'anggota_jk' 		=> $jk, 
						'anggota_hp' 		=> $hp,
						'anggota_ktp'		=> $ktp
		);
			$this->m_library->insert_data($data,'anggota');
			$this->session->set_flashdata('info', 'Anggota Berhasil Di Tambahkan !!');
			redirect('admin/anggota');
	}
	// public function anggota_edit($id)
	// {
	// 	$this->m_library->get_security();

	// 	$where = array('anggota_id' => $id );
		
	// 	$data['judul']	= 'Ubah Anggota - My Library';
	// 	$data['tab1']	= 'Master Data';
	// 	$data['tab2']	= 'Ubah Anggota';
	// 	$data['anggota']   = $this->m_library->edit_data('anggota',$where)->result();
	// 	$this->load->view('template/header',$data);
	// 	$this->load->view('template/navbar',$data);

	// 	$this->load->view('anggota/anggota_ubah', $data);
	// 	$this->load->view('template/footer');
	// }
	public function anggota_ubah()
	{
		$id = $_POST['id'];

		$data = $this->db->query("SELECT * FROM anggota WHERE anggota_id='$id' ")->row();
		echo json_encode($data);
	}
	public function anggota_edit_act()
	{
		$this->m_library->get_security();

		$where = array( 'anggota_id' => $this->input->post('anggota_id') );

		$nama 		= $this->input->post('anggota_nama');
		$alamat 	= $this->input->post('anggota_alamat');
		$jk 		= $this->input->post('anggota_jk');
		$hp 		= $this->input->post('anggota_hp');
		$ktp 		= $this->input->post('anggota_ktp');

		$data = array(
						'anggota_nama' 	=> $nama, 
						'anggota_alamat' 	=> $alamat, 
						'anggota_jk' 	=> $jk, 
						'anggota_hp' 	=> $hp,
						'anggota_ktp' 	=> $ktp
		);
		$this->m_library->update_data($where,$data,'anggota');
		$this->session->set_flashdata('info', 'Anggota Berhasil Di Ubah !!!');
		redirect('admin/anggota');
	}
	public function anggota_hapus($id)
	{
		$this->m_library->get_security();
		
		$where = array(
						'anggota_id' => $id 
					);
		$this->m_library->delete_data($where,'anggota');
		$this->session->set_flashdata('info', 'Anggota Berhasil Di Hapus !!!');
		redirect('admin/anggota');

	}
	public function transaksi()
	{
		$this->m_library->get_security();
		$data['judul']	= 'Transaksi Peminjaman - My Library';
		$data['tab1']	= 'Admin';
		$data['tab2']	= 'Transaksi Peminjaman';
		$id = $this->session->userdata('id');
		$data['transaksi']	= $this->db->query("SELECT
*
FROM
transaksi ,
anggota ,
buku
WHERE
transaksi.transaksi_karyawan = '$id' AND
transaksi.transaksi_anggota = anggota.anggota_id AND
transaksi.transaksi_buku = buku.buku_id
")->result();

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);

		$this->load->view('transaksi/index', $data);
		$this->load->view('template/footer');
	}
	public function transaksi_add()
	{
		$this->m_library->get_security();

		$data['judul']	= 'Transaksi Baru - My Library';
		$data['tab1']	= 'Transaksi Peminjaman';
		$data['tab2']	= 'Transaksi Baru';
		$data['anggota'] = $this->m_library->get_data('anggota')->result();

		$where = array('buku_status' => '1' );
		$data['buku'] = $this->m_library->edit_data('buku',$where)->result();

		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);

		$this->load->view('transaksi/transaksi_add', $data);
		$this->load->view('template/footer');
	}
	public function transaksi_add_act()
	{
		$anggota 		 = $this->input->post('anggota');
		$buku 			 = $this->input->post('buku');
		$tgl_pinjam 	 = $this->input->post('transaksi_tgl_pinjam');
		$tgl_kembali	 = $this->input->post('transaksi_tgl_kembali');
		$transaksi_harga = $this->input->post('transaksi_harga');
		$transaksi_denda = $this->input->post('transaksi_denda');

		$data = array(
			'transaksi_karyawan' 	=> $this->session->userdata('id') , 
			'transaksi_anggota' 	=> $anggota, 
			'transaksi_buku' 		=> $buku , 
			'transaksi_tgl_pinjam' 	=> $tgl_pinjam , 
			'transaksi_tgl_kembali' => $tgl_kembali , 
			'transaksi_harga' 		=> $transaksi_harga , 
			'transaksi_denda' 		=> $transaksi_denda,
			'transaksi_tgl' 		=> date('Y-m-d')

		);
		$this->m_library->insert_data($data,'transaksi');

		$b = array('buku_status' => "2" );
		$w = array('buku_id' => $buku );

		$this->m_library->update_data($w,$b,'buku');

		$this->session->set_flashdata('info', 'Transaksi Berhasil !!');
		redirect('admin/transaksi');
	}
	public function transaksi_selesai($id)
	{
		$this->m_library->get_security();

		$data['judul']		= 'Transaksi Selesai - My Library';
		$data['tab1']		= 'Transaksi Peminjaman';
		$data['tab2']		= 'Transaksi Selesai';
		$data['anggota']	= $this->m_library->get_data('anggota')->result();
		$data['buku'] 		= $this->m_library->get_data('buku')->result();
		$data['transaksi'] 	= $this->db->query("SELECT * FROM transaksi,buku,anggota WHERE transaksi_buku=buku_id AND transaksi_anggota=anggota_id AND transaksi_id='$id' ")->result();


		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);

		$this->load->view('transaksi/transaksi_selesai', $data);
		$this->load->view('template/footer');
	}
	public function transaksi_selesai_act()
	{
		$id 				= $this->input->post('id');
		$tgl_dikembalikan 	= $this->input->post('dikembalikan');
		$tgl_kembali 		= $this->input->post('tgl_kembali');
		$buku 				= $this->input->post('buku');
		$denda 				= $this->input->post('denda');

		$batas_kembali		= strtotime($tgl_kembali);
		$dikembalikan 		= strtotime($tgl_dikembalikan);
		
		$selisih 			= abs(($batas_kembali-$dikembalikan)/(60*60*24));
		$totaldenda 				= $denda*$selisih;

		$data = array(

			'transaksi_dikembalikan' => $tgl_dikembalikan, 
			'transaksi_status' => '1',
			'transaksi_totaldenda' => $totaldenda

		);

		$where = array('transaksi_id' => $id, );
		$this->m_library->update_data($where,$data,'transaksi');

		

		$where2 = array('buku_id' => $buku, );
		$data2 = array('buku_status' => '1' );

		$this->m_library->update_data($where2,$data2,'buku');
		$this->session->set_flashdata('info', 'Transaksi Telah Selesai !!');
		redirect('admin/transaksi');



	}
	public function transaksi_hapus($id)
	{
		


		$where = array('transaksi_id' => $id );
		$data = $this->m_library->edit_data('transaksi',$where)->row();
		
		$where2 = array('buku_id' => $data->transaksi_buku );
		$data2 = array('buku_status' => 1 );
		
		$this->m_library->update_data($where2,$data2,'buku');
		$this->m_library->delete_data($where,'transaksi');

		$this->session->set_flashdata('info', 'Transaksi Dibatalkan !!');
		redirect('admin/transaksi');
	}
	public function laporan()
	{
		$this->m_library->get_security();
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');		
		$this->form_validation->set_rules('dari','Dari Tanggal','required');		
		$this->form_validation->set_rules('sampai','Sampai Tanggal','required');		

		if($this->form_validation->run() != false){					
			$data['laporan'] = $this->db->query("select * from transaksi,buku,anggota where transaksi_buku=buku_id and transaksi_anggota=anggota_id and date(transaksi_tgl) >= '$dari'")->result();								
			$data['judul']	= 'Laporan - My Library';
			$data['tab1']	= 'Admin';
			$data['tab2']	= 'Laporan';

			$this->load->view('template/header',$data);
			$this->load->view('template/navbar',$data);

			$this->load->view('laporan/laporan_filter', $data);
			$this->load->view('template/footer');
		}else{
			$data['judul']	= 'Laporan - My Library';
			$data['tab1']	= 'Admin';
			$data['tab2']	= 'Laporan';

			$this->load->view('template/header',$data);
			$this->load->view('template/navbar',$data);

			$this->load->view('laporan/index', $data);
			$this->load->view('template/footer');		
		}		
	}
	public function laporan_print()
	{
		$dari = $this->input->get('dari');
		$sampai = $this->input->get('sampai');

		if ($dari != "" && $sampai != "") {
			$data['laporan'] = $this->db->query("SELECT * FROM transaksi,buku,anggota where transaksi_buku=buku_id and transaksi_anggota=anggota_id and date(transaksi_tgl) >= '$dari' ")->result();

			$this->load->view('laporan/laporan_print', $data);
		}else{
			$this->session->set_flashdata('info', 'Tidak Ada Data Yang Di Cetak !!!');
			redirect('admin/laporan');
		}

	}
	function laporan_pdf(){
		$this->load->library('dompdf_gen');	
		$dari = $this->input->get('dari');
		$sampai = $this->input->get('sampai');		
			
		$data['laporan'] = $this->db->query("select * from transaksi,buku,anggota where transaksi_buku=buku_id and transaksi_anggota=anggota_id and date(transaksi_tgl) >= '$dari'")->result();											
		$this->load->view('laporan/laporan_pdf', $data);

        $paper_size  = 'A4'; // ukuran kertas
		$orientation = 'landscape'; //tipe format kertas potrait atau landscape
		$html = $this->output->get_output();

		$this->dompdf->set_paper($paper_size, $orientation);
		//Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan.pdf", array('Attachment'=>0)); // nama file pdf yang di hasilkan

	}


}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
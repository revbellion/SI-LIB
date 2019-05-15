<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>	
	<style type="text/css">
		.table-data{
			width: 100%;			
			border-collapse: collapse;			
		}

		.table-data tr th,
		.table-data tr td{
			border:1px solid black;
			font-size: 10pt;
		}		
	</style>
	
	<center><h3>Laporan Transaksi Peminjaman Buku</h3>
		<p>
		<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun

	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

echo tgl_indo(date('Y-m-d')); // 21 Oktober 2017
 ?></p>
	</center>	

	

	<table>
		<tr>
			<td>Kasir</td>
			<td>:</td>
			<td><?php echo $this->session->userdata('nama'); ?></td>
		</tr>
		<tr>
			<td>Dari Tgl</td>
			<td>:</td>
			<td><?php echo date('d/m/Y',strtotime($_GET['dari'])); ?></td>
		</tr>
		<tr>
			<td>Sampai Tgl</td>
			<td>:</td>
			<td><?php echo date('d/m/Y',strtotime($_GET['sampai'])); ?></td>			
		</tr>
	</table>
	
	<br/>
	<table class="table-data">
		<thead>
			<tr>
				<th>No</th>
				<th>Tanggal</th>
				<th>Anggota</th>
				<th>Buku</th>
				<th>Tgl. Pinjam</th>			
				<th>Tgl. Kembali</th>
				<th>Harga</th>
				<th>Denda / Hari</th>
				<th>Tgl. Dikembalikan</th>
				<th>Status</th>
				<th>Total Denda</th>		
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			foreach($laporan as $l){ 
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo date('d/m/Y',strtotime($l->transaksi_tgl)); ?></td>
				<td><?php echo $l->anggota_nama; ?></td>
				<td><?php echo $l->buku_judul; ?></td>
				<td><?php echo date('d/m/Y',strtotime($l->transaksi_tgl_pinjam)); ?></td>
				<td><?php echo date('d/m/Y',strtotime($l->transaksi_tgl_kembali)); ?></td>				
				<td><?php echo "Rp. ".number_format($l->transaksi_harga); ?></td>
				<td><?php echo "Rp. ".number_format($l->transaksi_denda); ?></td>
				<td>
					<?php 
					if($l->transaksi_dikembalikan =="0000-00-00"){
						echo "-";
					}else{
						echo date('d/m/Y',strtotime($l->transaksi_dikembalikan)); 						
					}
					?>
				</td><td>
					<?php 	
					if($l->transaksi_status == "1"){
						echo "Selesai";
					}else{
						echo "-";
					}				
					?>					
				</td>				
				<td><?php echo "Rp. ". number_format($l->transaksi_totaldenda)." ,-"; ?></td>
								
			</tr>
			
			<?php 
		}
		?><tr>
			<td colspan="10" class="text-right"><b>Total Uang</b></td>
			<?php $this->db->select('SUM(transaksi_totaldenda) as total');
			$this->db->from('transaksi');
			?>
			<td><?php echo "Rp. ". number_format($this->db->get()->row()->total). ",-" ?></td>
		</tr>
	</tbody>
</table>

<script type="text/javascript">
	window.print();
</script>

</body>
</html>

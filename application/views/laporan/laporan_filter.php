<div class="row">
	<div class="col-lg-12">
		<?php if ($this->session->flashdata('info')): ?>
			<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<?php echo $this->session->flashdata('info'); ?>
			</div>
		<?php endif ?>
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3><b><i class="fa fa-list-alt"></i> Laporan</b></h3>

			</div>

			<!-- /.panel-heading -->
			<div class="panel-body">
				<form method="post" action="<?php echo base_url().'admin/laporan' ?>">
					<div class="form-group">
						<label>Dari Tanggal</label>	
						<input type="date" name="dari" class="form-control">
						<?php echo form_error('dari'); ?>
					</div>
					<div class="form-group">
						<label>Sampai Tanggal</label>	
						<input type="date" name="sampai" class="form-control">
						<?php echo form_error('sampai'); ?>
					</div>	
					<div class="form-group">
						<button class="btn btn-primary" type="submit"><i class="fa fa-search  "></i> Cari</button>
					</div>
				</form>

				<div class="btn-group">
	<a class="btn btn-warning btn-sm" href="<?php echo base_url().'admin/laporan_pdf/?dari='.set_value('dari').'&sampai='.set_value('sampai') ?>"><span class="glyphicon glyphicon-print"></span> Cetak PDF</a>	
	<a class="btn btn-default btn-sm" href="<?php echo base_url().'admin/laporan_print/?dari='.set_value('dari').'&sampai='.set_value('sampai') ?>"><span class="glyphicon glyphicon-print"></span> Print</a>	
</div>
<br/>
<br/>
<div class="table-responsive">
<table border="1" class="table table-striped table-hover table-bordered" id="table-datatable">
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>anggota</th>
			<th>Buku</th>
			<th>Tgl. Pinjam</th>			
			<th>Tgl. Kembali</th>
			<th>Harga</th>
			<th>Denda / Hari</th>
			<th>Tgl. Dikembalikan</th>
			<th>Total Denda</th>
			<th>Status</th>			
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
				</td>				
				<td><?php echo "Rp. ". number_format($l->transaksi_totaldenda)." ,-"; ?></td>
				<td>
					<?php 	
					if($l->transaksi_status == "1"){
						echo "Selesai";
					}else{
						echo "-";
					}				
					?>					
				</td>				
			</tr>
			<?php 
		}
		?>
			<tr>
				<td colspan="11"><?php if ($laporan == false) {
				echo "<b class='text-danger text-center'>Data Laporan Tidak Ada !!!</b>";
		} ?></td>
			</tr>
	</tbody>
</table>
</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>

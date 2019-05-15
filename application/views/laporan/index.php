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
						<input type="submit" value="CARI" name="cari" class="btn btn-sm btn-primary">
					</div>
				</form>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>

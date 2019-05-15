<div class="col-lg-5">
	<?php if ($this->session->flashdata('info')): ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $this->session->flashdata('info'); ?>
            </div>
        <?php endif ?>
	<div class="row">
		
		<div class="panel panel-primary">
			<div class="panel-heading"><h3><i class="fa fa-book fa-fw"></i> <b>Ubah Password</b></h3>
			</div>
			<div class="panel-body">
				<form action="<?php echo base_url('login/ubah_password_act') ?>" method="POST">
					<div class="form-group">
						<label for="pass_lama">Password Lama </label>
						<input type="password" class="form-control" id="pass_lama" name="pass_lama" autofocus placeholder="" required>
					</div>
					<div class="form-group">
						<label for="pass_baru">Password Baru</label>
						<input type="password" class="form-control" id="pass_baru" name="pass_baru" placeholder="" required>
					</div>
					<div class="form-group">
						<label for="conf_baru">Ulangi password Baru</label>
						<input type="password" class="form-control" id="conf_baru" name="conf_baru" placeholder="" required>
					</div>
					</div>
					<button type="submit" class="btn btn-primary btn-block"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
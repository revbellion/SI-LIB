<div class="col-lg-5">
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading"><h3><i class="fa fa-book fa-fw"></i> <b>Ubah Anggota</b></h3>
			</div>
			<div class="panel-body">
				<?php foreach ($anggota as $a ): ?>
					<form action="<?php echo base_url('admin/anggota_edit_act') ?>" method="POST">
						<input hidden="" type="text" name="anggota_id" value="<?php echo $a->anggota_id ?>">
						<div class="form-group">
							<label for="anggota_nama">Nama Lengkap </label>
							<input type="text" class="form-control" id="anggota_nama" name="anggota_nama" value="<?php echo $a->anggota_nama ?>" autofocus required>
						</div>
						<div class="form-group">
							<label for="anggota_alamat">Alamat</label>
							<textarea class="form-control" id="anggota_alamat" name="anggota_alamat"  required><?php echo $a->anggota_alamat ?></textarea>
						</div>
						<div class="form-group">
							<label for="anggota_jk">Jenis Kelamin</label>
							<select class="form-control" name="anggota_jk" id="anggota_jk">
								<option value="1">Laki-Laki</option>
								<option value="2">Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label for="anggota_hp">No. HP</label>
							<input type="text" maxlength="14" class="form-control" id="anggota_hp" name="anggota_hp" value="<?php echo $a->anggota_hp ?>" required>
						</div>
						<div class="form-group">
							<label for="anggota_ktp">No. KTP</label>
							<input type="text" maxlength="16" class="form-control" id="anggota_ktp" name="anggota_ktp" value="<?php echo $a->anggota_ktp ?>" required>
						</div>
						<button type="submit" class="btn btn-primary btn-block"> <i class="glyphicon glyphicon-floppy-disk"></i> Ubah</button>
					</form>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</div>
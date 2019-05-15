<div class="col-lg-5">
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading"><h3><i class="fa fa-book fa-fw"></i> <b>Tambah Anggota</b></h3>
			</div>
			<div class="panel-body">
				<form action="<?php echo base_url('admin/anggota_add_act') ?>" method="POST">
					<div class="form-group">
						<label for="anggota_nama">Nama Lengkap </label>
						<input type="text" class="form-control" id="anggota_nama" name="anggota_nama" autofocus required>
					</div>
					<div class="form-group">
						<label for="anggota_alamat">Alamat</label>
						<textarea class="form-control" id="anggota_alamat" name="anggota_alamat" required></textarea>
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
						<input type="text" value="+628" maxlength="14" class="form-control" id="anggota_hp" name="anggota_hp" required>
					</div>
					<div class="form-group">
						<label for="anggota_ktp">No. KTP</label>
						<input type="text" maxlength="16" class="form-control" id="anggota_ktp" name="anggota_ktp" required>
					</div>
					<button type="submit" class="btn btn-primary btn-block"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
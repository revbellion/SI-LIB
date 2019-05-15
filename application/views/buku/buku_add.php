<div class="col-lg-5">
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading"><h3><i class="fa fa-book fa-fw"></i> <b>Tambah Buku</b></h3>
			</div>
			<div class="panel-body">
				<form action="<?php echo base_url('admin/buku_add_act') ?>" method="POST">
					<div class="form-group">
						<label for="buku_judul">Judul Buku </label>
						<input type="text" class="form-control" id="buku_judul" name="buku_judul" autofocus placeholder="Judul Buku" required>
					</div>
					<div class="form-group">
						<label for="buku_penulis">Penulis</label>
						<input type="text" class="form-control" id="buku_penulis" name="buku_penulis" placeholder="Penulis" required>
					</div>
					<div class="form-group">
						<label for="buku_tahun">Tahun Terbit</label>
						<input type="text" class="form-control" id="buku_tahun" name="buku_tahun" placeholder="Penulis" required>
					</div>
					<div class="form-group">
						<label for="buku_status">Status Buku</label>
						<select class="form-control" name="buku_status" id="buku_status">
							<option value="1">Tersedia</option>
							<option value="2">Dipinjam</option>
						</select>
					</div>
					<button type="submit" class="btn btn-primary btn-block"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
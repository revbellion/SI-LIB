<div class="col-lg-12">
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading"><h3><i class="fa fa-book fa-fw"></i> <b>Transaksi Baru</b></h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6">
						<form action="<?php echo base_url('admin/transaksi_add_act') ?>" method="POST">
							<div class="form-group">
								<?php echo $this->session->userdata('admin_id'); ?>
								<label for="anggota">Anggota</label>
								<select class="form-control" name="anggota" id="anggota_nama">
									<option value="">--Pilih Anggota--</option>
									<?php foreach ($anggota as $a ): ?>
										<option value="<?php echo $a->anggota_id ?>"><?php echo $a->anggota_nama ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
								<label for="buku">Buku</label>
								<select class="form-control" name="buku" id="buku_judul">
									<option value="">--Pilih Buku--</option>
									<?php foreach ($buku as $b ): ?>
										<option value="<?php echo $b->buku_id ?>"><?php echo $b->buku_judul ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
						<label for="transaksi_denda">Denda / Hari </label>
						<input type="number" class="form-control" id="transaksi_denda" name="transaksi_denda" required>
					</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="transaksi_tgl_pinjam">Tanggal Pinjam</label>
								<input type="date" class="form-control" id="transaksi_tgl_pinjam" name="transaksi_tgl_pinjam" required>
							</div>
							<div class="form-group">
								<label for="transaksi_tgl_kembali">Tanggal Kembali</label>
								<input type="date" class="form-control" id="transaksi_tgl_kembali" name="transaksi_tgl_kembali" required>
							</div>
							<div class="form-group">
								<label for="transaksi_harga">Tarif</label>
								<input type="number" class="form-control" id="transaksi_harga" name="transaksi_harga" required>
							</div>
						</div>
						<button type="submit" class="btn btn-primary btn-block "> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
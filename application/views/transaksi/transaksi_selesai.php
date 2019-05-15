<div class="col-lg-12">
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading"><h3><i class="fa fa-book fa-fw"></i> <b>Transaksi Selesai</b></h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6">
						<?php foreach ($transaksi as $t ): ?>
							<form action="<?php echo base_url('admin/transaksi_selesai_act') ?>" method="POST">
								<input type="hidden" name="id" value="<?php echo $t->transaksi_id ?>">		
								<input type="hidden" name="buku" value="<?php echo $t->transaksi_buku ?>">		
								<input type="hidden" name="tgl_kembali" value="<?php echo $t->transaksi_tgl_kembali ?>">		
								<input type="hidden" name="denda" value="<?php echo $t->transaksi_denda ?>">
								<div class="form-group">
									<label for="anggota">Anggota</label>
									
									<input class="form-control" type="text" name="anggota" id="anggota" disabled value="<?php echo $t->anggota_nama ?>">
									
								</div>
								<div class="form-group">
									<label for="buku">Buku</label>
									<select class="form-control" name="buku" id="buku_judul" disabled>
											<option value="<?php echo $t->buku_id ?>"><?php echo $t->buku_judul ?></option>
									</select>
								</div>
								<div class="form-group">
									<label for="transaksi_denda">Denda / Hari </label>
									<input type="number" class="form-control" id="transaksi_denda" name="transaksi_denda" required disabled value="<?php echo $t->transaksi_denda ?>" >
								</div>
								<div class="form-group">
									<label for="kembali">Tanggal Dikembalikan Oleh Anggota</label>
									<input type="date" class="form-control" id="transaksi_dikembali" name="dikembalikan" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="transaksi_tgl_pinjam">Tanggal Pinjam</label>
									<input type="date" class="form-control" id="transaksi_tgl_pinjam" disabled name="transaksi_tgl_pinjam" value="<?php echo $t->transaksi_tgl_pinjam ?>" required>
								</div>
								<div class="form-group">
									<label for="transaksi_tgl_kembali">Tanggal Kembali</label>
									<input type="date" class="form-control" id="transaksi_tgl_kembali" name="transaksi_tgl_kembali" required value="<?php echo $t->transaksi_tgl_kembali ?>" disabled>
								</div>
								<div class="form-group">
									<label for="transaksi_harga">Tarif</label>
									<input type="number" class="form-control" id="transaksi_harga" name="transaksi_harga" required disabled value="<?php echo $t->transaksi_harga ?>">
								</div>
							</div>

							<button type="submit" class="btn btn-primary btn-block "> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
						</form>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
</div>
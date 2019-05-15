<!-- jQuery -->
<script src="<?php echo base_url(); ?>theme/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>theme/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>theme/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>theme/dist/js/sb-admin-2.js"></script>



<!-- DataTables JavaScript -->
<script src="<?php echo base_url(); ?>theme/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>theme/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="theme/vendor/datatables-responsive/dataTables.responsive.js"></script>
<script src="<?php echo base_url(); ?>theme/js/sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>


<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
	$(document).ready(function() {
		$('#dataTables-example').DataTable({
			responsive: true
		});
	});
</script>
<!-- SWEET ALERT -->

<script >
	const flashdata = $('.flash-data').data('flashdata');
	if (flashdata)
	{
		Swal(
			  'Berhasil',
			  flashdata,
			  'success'
)
	}

</script>
<!-- AJAX -->
<script>

	$(function(){
// AJAX ANGGOTA 
	$('.btntambahAnggota').on('click', function(){
		$('#modalAnggotaLabel').html('Tambah Anggota');
		$('.tombol').html('Simpan');
	});

	$('.tampilmodalUbah').on('click', function(){
		$('#modalAnggotaLabel').html('Ubah Anggota');
		$('.tombol').html('Ubah');
		$('#form').attr('action','<?php echo base_url('admin/anggota_edit_act/') ?>');

		const id = $(this).data('id');

		$.ajax({

				url : 'http://localhost/library/admin/anggota_ubah/',
				data : {id : id},
				method: 'POST',
				dataType: 'json',
				success : function(data){
					$('#anggota_nama').val(data.anggota_nama);
					$('#anggota_alamat').val(data.anggota_alamat);
					$('#anggota_hp').val(data.anggota_hp);
					$('#anggota_ktp').val(data.anggota_ktp);
					$('#anggota_nama').val(data.anggota_nama);
					$('#anggota_id').val(data.anggota_id);
				}
			});
		});

	});
	
	$(function(){
// AJAX BUKU
	$('.btntambahBuku').on('click', function(){
		$('#modalBukuLabel').html('Tambah Buku');
		$('.tombol').html('Simpan');
	});

	$('.btnubahBuku').on('click', function(){
		$('#modalBukuLabel').html('Ubah Buku');
		$('.tombol').html('Ubah');
		$('#form').attr('action','<?php echo base_url('admin/buku_edit_act/') ?>')

		const id = $(this).data('id');

		$.ajax({

				url : 'http://localhost/library/admin/buku_edit/',
				data : {id : id},
				method: 'POST',
				dataType: 'json',
				success : function(data){
					$('#buku_judul').val(data.buku_judul);
					$('#buku_penulis').val(data.buku_penulis);
					$('#buku_tahun').val(data.buku_tahun);
					$('#buku_status').val(data.buku_status);
					$('#buku_id').val(data.buku_id);
				}
			});
		});

	});
</script>

</body>

</html>

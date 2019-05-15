$(function(){

	$('.tampilmodalTambah').on('click', function(){
		$('#exampleModalLabel').html('Tambah Anggota');
		$('.tombol').html('Simpan');
	});

	$('.tampilmodalUbah').on('click', function(){
		$('#exampleModalLabel').html('Ubah Anggota');
		$('.tombol').html('Ubah');

		const id = $(this).data('id');

		$.ajax({

			url : 'http://localhost/library/admin/anggota_ubah/',
			data : {id : id},
			method: 'POST',
			dataType: 'json',
			success : function(data){
				$('#anggota_nama').val(data.anggota_nama);
			}
		});
	});

});
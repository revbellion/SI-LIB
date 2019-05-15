<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Hello, world!</title>
</head>
<body>
	<h1>Hello, world!</h1>


	<table border="1">

		<tr>
		</tr>
		<?php foreach ($admin as $a): ?>
			<tr>

				<td>
					<?php echo $a->admin_nama ?>

				</td>
				<td>
					<a class="btn btn-sm btn-success tombolubah" data-id="<?php echo $a->admin_id ?>" data-toggle="modal" data-target="#exampleModal"  >Ubah</a>
				</td>
			</tr>
		<?php endforeach ?>


	</table>



	<!-- Button trigger modal -->



	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?php echo base_url('admin/buku_add_act') ?>" method="POST">
						<div class="form-group">
							<label for="buku_judul">Nama Admin</label>
							<input type="text" class="form-control" id="nama" name="nama" autofocus placeholder="Judul Buku" required>
						</div>

						<button type="submit" class="btn btn-primary btn-block simpan"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</div>












	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="http://localhost/library/theme/vendor/jquery/jquery.js"></script>
</body>

<script type="text/javascript">
	$(function(){
		$('.tombolubah').on('click', function(){
			$('#exampleModalLabel').html('Ubah Admin');
			$('.simpan').html('Ubah');

			const id = $(this).data('id');

			$.ajax({

				url : 'http://localhost/library/coba/admin_ubah/',
				data : {id : id},
				method: 'POST',
				dataType: 'json',
				success : function(data){
				$('#nama').val(data.admin_nama);
				}
			});
		});	
	});


	</script>
	</html>